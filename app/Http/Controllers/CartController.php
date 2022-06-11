<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\MenuModel;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  public function index(Request $request)
  {
    $home = new HomeController();
    $hitungDiskon = new CartController();

    $categories = $home->nav();

    $menus = MenuModel::all()->load('c');

    if (!empty($request->session()->get('cart'))) {
      foreach ($menus as $m) {
        foreach ($request->session()->get('cart') as $key => $value) {
          if ($m->id == $key) {
            $item_carts[$key] = MenuModel::where('id', $key)->first()->toArray();
            $item_carts[$key]['jumlah_pembelian'] = $value['jumlah'];
            $diskon = $hitungDiskon->hitungDiskon($item_carts[$key]['price'], $value['jumlah']);
            $item_carts[$key]['diskon'] = $diskon;
            $item_carts[$key]['harga_total_item'] = $item_carts[$key]['price'] -  $diskon;
          }
        }
      }
      return view('cart', compact('categories', 'item_carts'));
    } else {
      return view('cart', compact('categories'));
    }
  }

  public function addToCart(Request $request)
  {
    $cart = session()->get('cart');

    // $request->session()->forget('cart');


    if (Auth::check()) {
      if (!$cart) {
        $cart = [
          $request->id => [
            'id' => $request->id,
            'jumlah' => $request->jumlah
          ]
        ];
        session()->put('cart', $cart);
        return redirect()->route('cart');
      }

      if (isset($cart[$request->id])) {
        $cart[$request->id]['jumlah'] += $request->jumlah;
        session()->put('cart', $cart);
        return redirect()->route('cart');
      } else {
        $cart[$request->id] = [
          'id' => $request->id,
          'jumlah' => $request->jumlah
        ];

        session()->put('cart', $cart);
        return redirect()->route('cart');
      }
    } else {
      return redirect()->route('login');
    }
  }

  public function removeFormCart($id)
  {
    $cart = session()->get('cart');

    if (Auth::check()) {
      if (!$cart) {
        return redirect()->route('cart');
      }

      if (isset($id)) {
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->route('cart');
      } else {
        return redirect()->route('cart');
      }
    } else {
      return redirect()->route('login');
    }
  }

  public function checkout(Request $request)
  {
    $home = new HomeController();
  }

  public function hitungDiskon($harga, $jumlah)
  {
    $status = auth()->user()->name;

    if ($status == 'pelanggan') {
      $diskon = $harga * $jumlah * 0.1;
    } else {
      $diskon = $harga * $jumlah * 0.2;
    }

    return $diskon;
  }
}
