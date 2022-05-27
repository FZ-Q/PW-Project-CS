<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\CategoriesModel;

class MenuController extends Controller
{

  public function index()
  {
    $menus = MenuModel::all()->sortByDesc('created_at');
    $kat = CategoriesModel::all()->sortByDesc('created_at');

    return view('admin.menus.menus', compact('menus', 'kat'));
  }


  public function store(Request $request)
  {
    $data = new MenuModel;
    $data->name = $request->name;
    $data->price = $request->price;
    $data->c_id = $request->c_id;
    $data->description = $request->description;

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);
      $data->image = 'images/' . $imageName;
    }

    $data->save();
    $request->session()->flash('successMsg', 'Data berhasil disimpan!');
    return redirect('menu');
  }

  public function show($id)
  {
    $menus = MenuModel::where('id', $id)->first();
    $kat = CategoriesModel::all()->sortByDesc('created_at');

    return view('admin.menus.menus-show', compact('menus','kat'));
  }

  public function update(Request $request, $id)
  {
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);
      $dataImage = 'images/' . $imageName;

      $imageRemove = MenuModel::find($id);
      unlink($imageRemove->image);

      MenuModel::find($id)->update([
        'name' => $request->name,
        'image' => $dataImage,
        'price' => $request->price,
        'c_id' => $request->c_id,
        'description' => $request->description
      ]);
    } else {
      MenuModel::find($id)->update([
        'name' => $request->name,
        'price' => $request->price,
        'c_id' => $request->c_id,
        'description' => $request->description
      ]);
    }




    return redirect('menu');
  }

  public function destroy(Request $request, $id)
  {
    MenuModel::find($id)->delete($id);
  }
}
