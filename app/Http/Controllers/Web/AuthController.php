<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Http\Requests\Web\LoginRequest;
use App\Http\Requests\Web\RegisterRequest;
use App\Jobs\SendEmail;
use App\Mail\VerifyEmail;
use App\Models\Api\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

            //dd(Auth::user()->id);

            // Si es Admino
            if (Auth::user()->id == 24) {
                return redirect( route('da_admin', Auth::user()->locale) );
            } else {
                // auth with user's locale (lang)
                return redirect( route('da_home', Auth::user()->locale) );
            }
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
        $code = Hash::make('code');

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->remember_token = $code;
        $user->save();

        // Login y enviar el correo
        if (!empty($user)) {

            // Envia el correo con la tarea - Jobs
            SendEmail::dispatch($user->email, $user, app()->getLocale());

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
        $seo = Seo::metaTags('verify_email');

        // Revisa la referencia del correo de electronico
        $id = $request->get('id');
        $code = $request->get('code');

        $flag_verify = false;

        //
        $user = User::query()->where(['id' => $id, 'remember_token' => $code])->first();

        if (!empty($user->id) && !empty($code)) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();

            $flag_verify = true;
        }

        return view('auth.verify', [
            'seo' => $seo,
            'flag_verify' => $flag_verify,
            'user' => $user,
        ]);
    }
}
