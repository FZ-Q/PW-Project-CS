<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\HomeController;

class UMenuController extends Controller
{
  public function index($filter)
  {
    if ($filter == 'all') {
      $menus = MenuModel::all();
    } else {
      $menus = MenuModel::all()->load('c')->where('c.name', $filter);
    }
    $home = new HomeController();

    $categories = $home->nav();

    foreach ($menus as $m) {
      $m->idHash = Crypt::encrypt($m->id);
    }

    return view('menu', compact('menus', 'categories', 'filter'));
  }

  public function detail($id)
  {
    $id = Crypt::decrypt($id);
    $menus = MenuModel::find($id)->load('c');
    $home = new HomeController();

    $categories = $home->nav();

    return view('menu_detail', compact('menus', 'categories'));
  }
}
