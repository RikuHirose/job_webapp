<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{

    protected $table = 'user_skills';

    protected $fillable = [
        'id',
        'user_id',
        'skill_id',
    ];


  // Relations
  public function user()
  {
      return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
  }

  public function skill()
  {
      return $this->belongsTo(\App\Models\skill::class, 'skill_id', 'id');
  }

}
