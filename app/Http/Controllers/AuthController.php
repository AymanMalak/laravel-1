<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // home
        public function home(){

            return view('home');
        }
    // -------------------------------------------------------------------
    // register
        function register()
        {
            return view('auth.register');
        }
        function doregister(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:100',
                'password' => 'required|string|min:6',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            // return redirect( route('/'));
            return redirect(route('auth.home'));
        }

    // -------------------------------------------------------------------
    // login
        function login()
        {

            return view('auth.login');
        }
        function dologin(Request $request)
        {
            $request->validate([
                'email' => 'required|email|max:100',
                'password' => 'required|string|min:6',
            ]);
            $x = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if (!$x) {
                return  redirect(route('auth.login'));
            }
            return redirect(  route('auth.home') );

        }
    // -------------------------------------------------------------------
    // logout
        function logout()
        {
            Auth::logout();
            return redirect(route('auth.login'));
        }
    // -------------------------------------------------------------------
    // make admin
        function makeadmin()
        {
            return view('auth.makeadmin');
        }
        function madeadmin(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:100',
                'password' => 'required|string|min:6',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin'
            ]);
            // return redirect( route('/'));
            return redirect(route('auth.home'));
        }

    // -------------------------------------------------------------------
    // not found
        function notfound(){
            return view('auth.notfound');
        }
    // -------------------------------------------------------------------
}
