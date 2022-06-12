<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\PurchasesModel;

class PurchaseController extends Controller
{

  public function index()
  {
    $home = new HomeController();
    $categories = $home->nav();


    $purchases = PurchasesModel::orderBy('created_at', 'desc')->with('menu', 'user')->paginate(10);
    $total_pembelian = PurchasesModel::sum('price');

    return view('admin/purchases/purchases', compact('categories', 'total_pembelian', 'purchases'));
  }
}
