<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\CategoriesModel;
use App\Models\UserModel;
use App\Models\PurchasesModel;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
  public function index()
  {
    $menus = MenuModel::all()->take(4);
    $categories = $this->nav();

    return view('home', compact('menus', 'categories'));
  }

  public function profile(Request $request)
  {
    $id = Crypt::decrypt($request->session()->get('idHash'));

    $user = UserModel::where('id', $id)->first();

    $categories = $this->nav();

    $purchases = PurchasesModel::where('u_id', $id)->with('menu', 'user')->get();


    return view('profile', compact('user', 'categories', 'purchases'));
  }

  public function registerMember()
  {
    $id = Crypt::decrypt($request->session()->get('idHash'));

    UserModel::find($id)->update([
      'name' => $request->name,
      'email' => $request->email,
    ]);

    return redirect()->route('profile');
  }

  public function nav()
  {
    $categories = CategoriesModel::all();

    return $categories;
  }
}
