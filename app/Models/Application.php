<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
      'job_id'
      'user_id'
      'comapny_id'
      'status'
    ];


  // Relations
  public function job()
  {
      return $this->belongsTo(\App\Models\File::class, 'job_id', 'id');
  }

  public function user()
  {
      return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
  }

  public function company()
  {
      return $this->belongsTo(\App\Models\Company::class, 'company_id', 'id');
  }
}
