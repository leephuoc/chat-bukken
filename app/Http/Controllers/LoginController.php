<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{

    /**
     * Login screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @author Lee Phuoc <phuoclx@nal.vn>
     */
    public function index(Request $request)
    {
        // When submit
        if ($request->isMethod('POST'))
        {
            // Get params
            $params = $request->all();

            $params = User::where('login_id', $params['login_id'])->first();

            if (!empty($params['password']) && $params['password'] == 'demo') {
                return redirect('/home');
            }
        }

        // Return view
        return view('login/index');
    }


}