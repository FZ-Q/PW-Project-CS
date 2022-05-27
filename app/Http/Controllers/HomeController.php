<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\CategoriesModel;

class HomeController extends Controller
{
  public function index()
  {
    $menus = Menu::all();
    $categories = CategoriesModel::all();

    return view('home', compact('menus', 'categories'));
  }
}
