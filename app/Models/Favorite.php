<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

    protected $table = 'favorites';

    protected $fillable = [
        'id',
        'user_id',
        'job_id',
    ];


  // Relations
  public function user()
  {
      return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
  }

  public function job()
  {
      return $this->belongsTo(\App\Models\Job::class, 'job_id', 'id');
  }

}
