<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Http\Requests\Web\LoginRequest;
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

        dd($user);
        exit;

        return view('auth.login', [
            '' => '',
        ]);
    }
}
