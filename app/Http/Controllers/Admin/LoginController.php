<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
       $request->validate([
          'email' => 'required',
          'password' => 'required'
       ]);

       if(\Auth::attempt(['email' => $request->email, 'password' => $request->password]))
         return redirect()->route('manage.dashboard');
       else
         return redirect()->back()->with('error','Login details are not valid')->withInput();
    }

    public function destroy()
    {
        \Session::flush();
        \Auth::logout();
        return  redirect()->route('manage.login')->with('success','You are successfully Logout');
    }
}
