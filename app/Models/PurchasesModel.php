<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserModel;
use App\Models\MenuModel;

class PurchasesModel extends Model
{
  use SoftDeletes, HasFactory;

  protected $guarded = [
    'id'
  ];

  protected $table = 'purchases';
  protected $primaryKey = 'id';

  protected $fillable = [
    'u_id',
    'm_id',
    'qty',
    'price'
  ];

  public function user()
  {
    return $this->belongsTo(UserModel::class, 'u_id')->withTrashed();
  }

  public function menu()
  {
    return $this->belongsTo(MenuModel::class, 'm_id')->withTrashed();
  }
}
