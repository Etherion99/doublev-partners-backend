<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
  protected $fillable = [
    'name',
    'lastname',
    'username',
    'email',
    'password'
  ];

  public function tickets(){
    return $this->hasMany(Ticket::class);
  }
}
