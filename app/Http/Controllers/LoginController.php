<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\View;

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

    /**
     * Login by LINE
     *
     * @param Request $request\
     *
     * @return View
     *
     * @author Lee Phuoc <phuoclx@nal.vn>
     */
    public function loginByLine(Request $request)
    {
        // Get callback API LINE ID
        return view('login/auth_line');
    }


}