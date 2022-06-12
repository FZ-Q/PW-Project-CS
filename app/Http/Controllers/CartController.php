<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuModel;
use App\Models\PurchasesModel;

class CartController extends Controller
{
  public function index(Request $request)
  {
    $home = new HomeController();

    $categories = $home->nav();

    $menus = MenuModel::all();

    if (!empty($request->session()->get('cart'))) {
      foreach ($menus as $m) {
        foreach ($request->session()->get('cart') as $key => $value) {
          if ($m->id == $key) {
            $item_carts[$key] = MenuModel::where('id', $key)->first()->toArray();
            $item_carts[$key]['jumlah_pembelian'] = $value['jumlah'];
            $diskon = $this->hitungDiskon($item_carts[$key]['price'], $value['jumlah']);
            $item_carts[$key]['diskon'] = $diskon;
            $item_carts[$key]['harga_total_item'] = ($item_carts[$key]['price'] * $value['jumlah']) -  $diskon;
          }
        }
      }
      return view('cart', compact('categories', 'item_carts'));
    } else {
      $item_carts = null;
      return view('cart', compact('categories', 'item_carts'));
    }
  }

  public function addToCart(Request $request)
  {
    $cart = session()->get('cart');

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
    $menus = MenuModel::all();

    foreach ($menus as $m) {
      foreach ($request->session()->get('cart') as $key => $value) {
        if ($m->id == $key) {
          PurchasesModel::create([
            'u_id' => Auth::user()->id,
            'm_id' => 1,
            'qty' => $value['jumlah'],
            'price' => $m->price * $value['jumlah'] - $this->hitungDiskon($m->price, $value['jumlah']),
          ]);
        }
      }
    }

    session()->forget('cart');

    return redirect('menu/all');
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
