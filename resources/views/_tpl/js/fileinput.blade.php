<?
	$name = isset($name) ? $name : '';
	$label = isset($label) ? $label : '';
	$path = isset($path) ? $path : '';
	$input = isset($input) ? $input : '';
	$upload_url = isset($upload_url) ? $upload_url : '';
	$remove_url = isset($remove_url) ? $remove_url : '';
	$allowed_file_extensions = isset($allowed_file_extensions) ? $allowed_file_extensions : "['png', 'jpg', 'gif']";
	
	if(is_array($allowed_file_extensions))
	{
		$allowed_file_extensions = "['".implode("', '", $allowed_file_extensions)."']";
	}
	
	if(strpos($allowed_file_extensions, 'pdf') !== FALSE)
	{
		$msgInvalidFileExtension = '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> PDFファイルをアップしてください。</span>';
	}
	else
	{
		$msgInvalidFileExtension = '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> 画像形式({extensions})のファイルをアップしてください。</span>';
	}
?>
$("#{{ $name }}").fileinput({
	language:'ja',
	showPreview: true,
	showUpload: false,
	showRemove: false,
	showCaption: false,
	allowedFileExtensions: {!! $allowed_file_extensions !!},
	browseLabel: '{{ $label }}',
	maxFileSize: 1024 * 30,
	msgInvalidFileExtension: '{!! $msgInvalidFileExtension !!}',
	uploadAsync: false,
	uploadUrl: '{{ $upload_url }}',
	maxFileCount:1,
	uploadExtraData: {
		skey: 'a',
		fkey: '{{ $name }}'
	}
	<? if($input): ?>
		<? $disk = Storage::disk('public'); if($disk->exists($input)): $mimetype = $disk->getMimetype($input); ?>
		,initialPreview: [
			<? if(preg_match('#/pdf$#i', $mimetype)): ?>
				'<div style="width:150px;"><div class="file-preview-other"><a href="/<?= $input ?>" target="_blank"><i class="glyphicon glyphicon-file"></i></a></div></div>'
			<? elseif(preg_match('#/(?:png|jpe?g|gif)$#i', $mimetype)): ?>
				'<img src="<?= url($input) ?>" class="w100px">'
			<? endif ?>
		],
		initialPreviewConfig: [
			{
				caption: '{{ $label }}',
				url:'{{ $remove_url }}',
				key: '{{ $name }}'
			}
		]
		<? endif ?>
	<? endif ?>
}).on("filebatchselected", function(event, files) {
	$("#{{ $name }}").fileinput("upload");
}).on('filebatchuploadsuccess', function(event, data, previewId, index) {
	var $self = $("#{{ $name }}_path");
	$self.val(data.response.path);
	
	if(/\.pdf$/.test(data.response.path))
	{
		var $target = $self.prev().find('i.glyphicon.glyphicon-file');
		$target.wrap('<a href="/' + data.response.path + '" target="_blank"></a>');
	}
	else if(data.response.hasOwnProperty('url'))
	{
		var $img = $("#{{ $name }}").closest('.file-input').find('.file-preview-frame img');
		$img.prop('src', data.response.url);
	}
	
	var $file_name = $("#file_name");
	
	if($file_name.size() > 0)
	{
		var $file_raw_name = $("#file_raw_name");
		var $file_type = $("#file_type");
		var $file_size = $("#file_size");
		
		$file_name.val(data.response.file_name);
		$file_raw_name.val(data.response.file_raw_name);
		$file_type.val(data.response.file_type);
		$file_size.val(data.response.file_size);
	}
	
}).on('filedeleted', function(event, id) {
	$("#{{ $name }}_path").val('');
	
	var $file_name = $("#file_name");
	
	if($file_name.size() > 0)
	{
		var $file_raw_name = $("#file_raw_name");
		var $file_type = $("#file_type");
		var $file_size = $("#file_size");
		
		$file_name.val('');
		$file_raw_name.val('');
		$file_type.val('');
		$file_size.val('');
	}
});

/* $(".file-drop-zone").on(tapEventName, function(e)
{
	console.log(e);
	var $self =  $(this);
	
	console.log(e.target);
	
	if($self.target == 'div.file-drop-zone')
	{
		var $target = $self.closest('.file-input');
		var name = $self.next().attr('name');

		if(name != null && /_path$/.test(name))
		{
			console.log(name, name.replace('_path', ''));
			$("#" + name.replace('_path', '')).click();
		}
	}
}); */