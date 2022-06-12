<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

  public function index()
  {

    $users = UserModel::orderBy('created_at', 'desc')->paginate(5);

    return view('admin.users.users', compact('users'));
  }


  public function store(Request $request)
  {
    $data = new UserModel;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->status = $request->status;
    $data->password = Hash::make($request->password);

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);
      $data->image = 'images/' . $imageName;
    }

    $data->save();
    $request->session()->flash('successMsg', 'Data berhasil disimpan!');
    return redirect('admin-user');
  }

  public function show($id)
  {
    $user = UserModel::where('id', $id)->first();

    return view('admin.users.users-show', compact('user'));
  }

  public function update(Request $request, $id)
  {
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);
      $dataImage = 'images/' . $imageName;

      $imageRemove = UserModel::find($id);
      unlink($imageRemove->image);

      if ($request->password != null) {
        UserModel::find($id)->update([
          'name' => $request->name,
          'image' => $dataImage,
          'email' => $request->email,
          'status' => $request->status,
          'password' => Hash::make($request->password)
        ]);
      } else {
        UserModel::find($id)->update([
          'name' => $request->name,
          'image' => $dataImage,
          'status' => $request->status,
          'email' => $request->email,
        ]);
      }
    } else {
      if ($request->password != null) {
        UserModel::find($id)->update([
          'name' => $request->name,
          'email' => $request->email,
          'status' => $request->status,
          'password' => Hash::make($request->password)
        ]);
      } else {
        UserModel::find($id)->update([
          'name' => $request->name,
          'status' => $request->status,
          'email' => $request->email,
        ]);
      }
    }

    return redirect('admin-user');
  }

  public function destroy(Request $request, $id)
  {
    UserModel::find($id)->delete($id);
  }
}
