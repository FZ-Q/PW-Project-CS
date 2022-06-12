<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Crypt;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;


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
      $request->session()->put('idHash', Crypt::encrypt(Auth::user()->id));

      $request->session()->put('status', Auth::user()->status);

      $request->session()->put('email', Auth::user()->email);

      $request->session()->put('name', Auth::user()->name);

      if (Auth::user()->status == 'pegawai') {
        return redirect('admin-purchase');
      } else {
        return redirect()->route('home');
      }
    } else {
      return redirect()
        ->back()
        ->withErrors(["Email atau password salah!"]);
    }
  }
  public function formRegister ()
  {
    $home = new HomeController();

    $categories = $home->nav();

    return view('register', compact('categories'));
  }
  public function register(request $request){
    $data = new UserModel;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->password = Hash::make($request->password);

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);
      $data->image = 'images/' . $imageName;
    }

    $data->save();
    return redirect()->route('home');
  }

  public function logout()
  {
    Auth::logout();
    session()->flush();
    return redirect()->route('login');
  }
}
