<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOccupation extends Model
{

    protected $table = 'user_occupations';

    protected $fillable = [
        'id',
        'user_id',
        'occupation_id',
    ];


  // Relations
  public function user()
  {
      return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
  }

  public function occupation()
  {
      return $this->belongsTo(\App\Models\Occupation::class, 'occupation_id', 'id');
  }

}
