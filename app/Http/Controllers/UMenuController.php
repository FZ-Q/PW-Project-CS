<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;

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

    return view('menu', compact('menus', 'categories', 'filter'));
  }
}
