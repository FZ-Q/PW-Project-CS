<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes,HasFactory;

    protected $guarded = ['id'];
    
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
        'c_id'
      ];
    
    public function c(){
      return $this->belongsTo(CategoriesModel::class);
    }
}
