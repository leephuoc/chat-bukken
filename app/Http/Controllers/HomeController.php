<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
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
        return 'Login successfully !';
    }


}