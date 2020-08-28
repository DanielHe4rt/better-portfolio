<?php
/**
 * Created by PhpStorm.
 * User: Daniel Reis
 * Date: 29-Oct-19
 * Time: 22:59
 */

namespace App\Http\Controllers\Auth;


use App\Entities\Auth\User;

use App\Http\Controllers\Controller;

use App\Http\Requests\Auth\AuthRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    use ApiResponse;

    public function postLogin(AuthRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        return $this->authenticate($credentials);
    }


    public function authenticate(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return $this->success();
        }
        return $this->unauthorized();
    }

    public function postLogout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

}
