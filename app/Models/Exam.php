<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{

    protected $table = 'exams';

    protected $fillable = [
        'id',
        'user_id',
        'company_id',
        'problemset_id',
        'slug',
        'minutes',
        'started_at'
    ];


  // Relations
  public function user()
  {
      return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
  }

  public function company()
  {
      return $this->belongsTo(\App\Models\Company::class, 'company_id', 'id');
  }

  public function problemset()
  {
      return $this->belongsTo(\App\Models\Problemset::class, 'problemset_id', 'id');
  }

}
