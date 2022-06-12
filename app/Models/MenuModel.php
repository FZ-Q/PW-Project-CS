<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuModel extends Model
{
  use SoftDeletes, HasFactory;

  protected $guarded = ['id'];

  protected $table = 'menus';
  protected $primaryKey = 'id';

  public function c()
  {
    return $this->belongsTo(CategoriesModel::class);
  }
}
