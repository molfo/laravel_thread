<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//createTokenのため（ログオン時の$requestがemail,passwordのみのため）
// use Illuminate\Support\Facades\DB;
// use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();

        // $token = $request->user();
        // $token = $request->user()->createToken();

        // return ['token' => $token->plainTextToken];

        //regenerateされたトークンを取得し、各種APIに渡す
        //コメントアウトしないとページ遷移する
        $request->session()->regenerate();

        $user = Auth::user();
        $token = $user->createToken('Laravel Password Grant Client');
        //return ['token' => $token->plainTextToken];
        $userToken = $user->tokens()->latest()->first();

        return view('APIToken', [
            'user' => $user,
            'token' => $token->plainTextToken
        ]);


        // return view('/APIToken', [
        //     'user' => $user,
        //     'token' => $token
        // ]);

        //$password = $request->input('password');
        //$user = DB::table('users')->where('password', $password)->first();

        //公式より
        //$token = $request->user()->createToken($request->token_name);

        //$response = ['test' => $request->User()];
        //$response = ['token' => $token->plainTextToken];

        //return redirect()->intended(RouteServiceProvider::HOME);
        // return response($response, 200);

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
