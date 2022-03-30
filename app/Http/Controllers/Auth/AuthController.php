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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthController extends Controller
{
    use ApiResponse;

    public function viewAuth(): View
    {
        return view('auth.login');
    }

    public function postLogin(AuthRequest $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return $this->unauthorized();
        }

        return $this->success();
    }


    public function postLogout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->to(route('landing'));
    }

}
