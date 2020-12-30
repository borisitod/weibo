<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);

        $this->middleware('throttle:10,10', [
            'only' => ['store']
        ]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            if(Auth::user()->activated) {
                session()->flash('success', 'Welcome back！');
                $fallback = route('users.show', Auth::user());
                return redirect()->intended($fallback);
            } else {
                Auth::logout();
                session()->flash('warning', 'Your account is not activated, please check the registration email in your mailbox for activation.');
                return redirect('/');
            }
        } else {
            session()->flash('danger', 'Sorry, your email and password do not match.');
            return redirect()->back()->withInput();
        }

        return;
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'You have successfully logged out！');
        return redirect('login');
    }
}
