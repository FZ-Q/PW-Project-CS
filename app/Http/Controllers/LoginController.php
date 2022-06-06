<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;


class LoginController extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      return redirect()->route('home');
    }

    $home = new HomeController();

    $categories = $home->nav();

    return view('login', compact('categories'));
  }

  public function auth(Request $request)
  {
    Auth::attempt($request->only('email', 'password'));

    if (Auth::check()) {
      $request->session()->put('status', Auth::user()->status);

      $request->session()->put('email', Auth::user()->email);

      $request->session()->put('nama', Auth::user()->nama);

      return redirect()->route('home');
    } else {
      return redirect()
        ->back()
        ->withErrors(["Email atau password salah!"]);
    }
  }


  public function logout()
  {
    Auth::logout();
    session()->flush();
    return redirect()->route('login');
  }
}
