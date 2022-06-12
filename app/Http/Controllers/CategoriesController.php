<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriesModel;

class CategoriesController extends Controller
{

  public function index()
  {
    $categories = CategoriesModel::orderBy('created_at', 'desc')->paginate(5);

    return view('admin.categories.categories', compact('categories'));
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
    $category = CategoriesModel::where('id', $id)->first();

    return view('admin.categories.categories-show', compact('category'));
  }

  public function update(Request $request, $id)
  {
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);
      $dataImage = 'images/' . $imageName;

      $imageRemove = CategoriesModel::find($id);
      unlink($imageRemove->image);

      CategoriesModel::find($id)->update([
        'name' => $request->name,
        'image' => $dataImage
      ]);
    } else {
      CategoriesModel::find($id)->update([
        'name' => $request->name,
      ]);
    }
    return redirect('kategori');
  }

  public function destroy(Request $request, $id)
  {
    CategoriesModel::find($id)->delete($id);
  }
}
