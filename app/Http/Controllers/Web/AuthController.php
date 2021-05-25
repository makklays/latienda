<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Http\Requests\Web\LoginRequest;
use App\Http\Requests\Web\RegisterRequest;
use App\Models\Api\Category;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $seo = Seo::metaTags('login');

        return view('auth.login', [
            'seo' => $seo,
        ]);
    }

    public function loginProcess(LoginRequest $request)
    {
        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($user_data)) {
            return redirect( route('da_home', app()->getLocale()) );
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    public function register(Request $request)
    {
        $seo = Seo::metaTags('register');

        return view('auth.register', [
            'seo' => $seo,
        ]);
    }

    public function registerProcess(RegisterRequest $request)
    {
        // add User
        $user = User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        // Login y enviar el correo
        if (!empty($user)) {
            // Envia el correo con Jobs-queue
            // todo

            $user_data = array(
                'email'  => $request->get('email'),
                'password' => $request->get('password')
            );

            if (Auth::attempt($user_data)) {
                return redirect( route('da_home', app()->getLocale()) );
            } else {
                return back()->with('error', 'Wrong Login Details');
            }
        }

        return view('auth.register', [
            'user' => $user,
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect( route('/', app()->getLocale() ) );
    }

    public function verify(Request $request)
    {
        // Enviar el correo
        // todo
        dd($request);

        return redirect( route('/', app()->getLocale() ) );
    }
}
