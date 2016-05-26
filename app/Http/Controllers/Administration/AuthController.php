<?php

namespace App\Http\Controllers\Administration;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['index', 'login']]);
        $this->middleware('auth', ['only' => ['logout']]);
    }

    public function index()
    {
        return view('administration.authentication.index');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'    => 'required',
            'password' => 'required',
        ];

        // if this doesn't validate, return()->back()->withInput()->withErrors()
        $this->validate($request, $rules);

        // Attempt to log the user in
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            // if everything is correct
            return redirect()->route('administration.dashboard');
        }

        return redirect()->back()->withInput()->withErrors(['Invalid email and/or password combination']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('administration.authentication');
    }
}
