<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Authenticatable
{
  use HasFactory, Notifiable, SoftDeletes;

  protected $table = 'users';
  protected $primaryKey = 'id';

  protected $guarded = [
    'id'
  ];

  protected $hidden = [
    'password'
  ];

  protected $fillable = [
    'name',
    'email',
    'image'
  ];

  public function getAuthPassword()
  {
    return $this->password;
  }
}
