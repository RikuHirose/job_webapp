<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
      'bg_image_id',
      'company_id',
      'title',
      'description',
      'application_qualification',
      'salary_min',
      'salary_max',
      'work_place'
    ];


  // Relations
  public function bgImage()
  {
      return $this->belongsTo(\App\Models\File::class, '_id', 'id');
  }

  public function company()
  {
      return $this->belongsTo(\App\Models\Comapny::class, 'company_id', 'id');
  }

}
