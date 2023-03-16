<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function index()
  {
    return view('login');
  }

  public function authenticate(Request $request)
  {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);


    if (!auth()->attempt($request->only('email', 'password'))) {
        return back()->withErrors(['Invalid credentials']);
    }
    
    return redirect()->route('dashboard');
  }

  public function logout()
  {
    auth()->logout();

    return redirect()->route('login');
  }
}
