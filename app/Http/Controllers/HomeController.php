<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\CategoriesModel;

class HomeController extends Controller
{
  public function index()
  {
    $menus = MenuModel::all();
    $categories = CategoriesModel::all();

    return view('home', compact('menus', 'categories'));
  }

  public function nav()
  {
    $categories = CategoriesModel::all();

    return $categories;
  }
}
