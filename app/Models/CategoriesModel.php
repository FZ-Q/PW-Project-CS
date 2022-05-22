<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesModel extends Model
{
  use SoftDeletes, HasFactory;

  protected $guarded = [
    'id'
  ];

  protected $table = 'categories';
  protected $primaryKey = 'id';
  protected $fillable = [
    'name',
    'image'
  ];
}
