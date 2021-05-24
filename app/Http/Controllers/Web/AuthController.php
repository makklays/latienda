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
        $password = Hash::make($request->get('password'));
        $email = $request->get('email');

        $user = User::query()->where(['email' => $email, 'password' => $password])->first();

        //dd($user);
        //exit;

        return view('auth.login', [
            'user' => $user,
        ]);
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
        $name = $request->get('name');
        $password = Hash::make($request->get('password'));
        $email = $request->get('email');

        $user = User::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        //dd($user);
        //exit;

        return view('auth.register', [
            'user' => $user,
        ]);
    }
}
