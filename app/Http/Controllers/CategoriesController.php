<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;

class CategoriesController extends Controller
{

  public function index()
  {
    $categories = CategoriesModel::all()->sortByDesc('created_at');

    return view('admin.categories', compact('categories'));
  }


  public function store(Request $request)
  {
    $data = $request->only('name');

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);
      $data['image'] = 'images/' . $imageName;
    }

    CategoriesModel::create($data);
    $request->session()->flash('successMsg', 'Data berhasil disimpan!');
    return redirect('kategori');
  }

  public function show($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }
}
