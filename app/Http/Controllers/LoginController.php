<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @return RedirectResponse
     */
    protected function redirectTo(): RedirectResponse
    {
        switch (auth()->user()->type) {
            case 'admin':
                return redirect()->route('posts.index');
            case 'operator':
                return redirect()->route('posts2.index');
            case 'gudang':
                return redirect()->route('warehouse.index');
            case 'ekspedisi':
                return redirect()->route('ekspedisi.index');
            default:
                return redirect()->route('posts.index');
        }
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   /**
     * Handle a login request to the application.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $request->email, 'password' => $request->password))) {
            return $this->sendLoginResponse($request);
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }
    
}
