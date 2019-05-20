<?php


namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ApiLineController extends Controller
{
    /**
     * Login by LINE
     *
     * @return View
     *
     * @author Lee Phuoc <phuoclx@nal.vn>
     */
    public function auth()
    {
        $link = "https://access.line.me/oauth2/v2.1/authorize?response_type=%s&client_id=%s&redirect_uri=%s&state=%s&scope=%s";

        $config = [
            'response_type' => 'code',
            'client_id' => env('LINE_CLIENT_ID'),
            'redirect_uri' => 'http://localhost:8003/callback',
            'state' => str_random(8),
            'scope' => 'profile&open_id'
        ];

        $link = sprintf($link, $config['response_type'], $config['client_id'], $config['redirect_uri'], $config['state'], $config['scope']);

        return view('login/auth_line', [
            'link' => $link
        ]);
    }

    /**
     * Callback
     *
     * @param Request $request
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @author Lee Phuoc <phuoclx@nal.vn>
     */
    public function callback(Request $request)
    {
        $client = new Client();
        $response = $client->post('https://api.line.me/oauth2/v2.1/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $request->input('code'),
                'redirect_uri' => 'http://localhost:8003/callback',
                'client_id' => env('LINE_CLIENT_ID'),
                'client_secret' => env('LINE_CLIENT_SECRET'),
            ]
        ]);

        $content = $response->getBody()->getContents();

        $arr_content = json_decode($content, TRUE);

        $response = $client->get('https://api.line.me/v2/profile', [
            'headers' => [
                'Authorization' => 'Bearer ' . $arr_content['access_token'],
            ]
        ]);

        dd($response->getBody()->getContents());
    }
}