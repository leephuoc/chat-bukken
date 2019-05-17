/*!
 * FileInput <_LANG_> Translations
 *
 * This file must be loaded after 'fileinput.js'. Patterns in braces '{}', or
 * any HTML markup tags in the messages must not be converted or translated.
 *
 * @see http://github.com/kartik-v/bootstrap-fileinput
 *
 * NOTE: this file must be saved in UTF-8 encoding.
 */
(function ($) {
    "use strict";

    $.fn.fileinputLocales['ja'] = {
        fileSingle: 'ファイル',
        filePlural: '複数のファイル',
        browseLabel: '写真を選択 &hellip;',
        removeLabel: '削除',
        removeTitle: '選択した写真を削除',
        cancelLabel: 'キャンセル',
        cancelTitle: 'キャンセル',
        uploadLabel: 'アップロード',
        uploadTitle: 'アップロード',
        msgSizeTooLarge: '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> {name}の容量が大きすぎます。{maxSize} KB以下のファイルをアップロードしてください。',
        msgFilesTooLess: 'You must select at least <b>{n}</b> {files} to upload. Please retry your upload!',
        msgFilesTooMany: '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> 一度に写真をアップロードできるのは<b>{m}</b>枚までです。',
        msgFileNotFound: '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> ファイル「{name}」が見つかりませんでした。',
        msgFileSecured: '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> ファイル「{name}」が読み込めませんでした。',
        msgFileNotReadable: '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> ファイル「{name}」が読み込めませんでした。',
        msgFilePreviewAborted: '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> ファイル「{name}」をプレビューできませんでした。',
        msgFilePreviewError: '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> ファイル「{name}」をプレビューできませんでした。',
        msgInvalidFileType: '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> サポートしているファイルは<b>{types}</b>です。',
        msgInvalidFileExtension: '<span class="text-danger"><i class="glyphicon glyphicon-exclamation-sign"></i> サポートしている拡張子は<b>{extensions}</b>です。',
        msgValidationError: 'File Upload Error',
        msgLoading: 'Loading file {index} of {files} &hellip;',
        msgProgress: 'Loading file {index} of {files} - {name} - {percent}% completed.',
        msgSelected: '{n} {files} selected',
        msgFoldersNotAllowed: 'Drag & drop files only! Skipped {n} dropped folder(s).',
        msgImageWidthSmall: 'Width of image file "{name}" must be at least {size} px.',
        msgImageHeightSmall: 'Height of image file "{name}" must be at least {size} px.',
        msgImageWidthLarge: 'Width of image file "{name}" cannot exceed {size} px.',
        msgImageHeightLarge: 'Height of image file "{name}" cannot exceed {size} px.',
        dropZoneTitle: '<span class="glyphicon glyphicon-plus" style="font-size: 24px; color:#CCCCCC;"></span>'
    };
})(window.jQuery);