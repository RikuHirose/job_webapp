<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOccupation extends Model
{

    protected $table = 'job_occupations';

    protected $fillable = [
        'id',
        'job_id',
        'occupation_id',
    ];


  // Relations
  public function job()
  {
      return $this->belongsTo(\App\Models\Job::class, 'job_id', 'id');
  }

  public function occupation()
  {
      return $this->belongsTo(\App\Models\Occupation::class, 'occupation_id', 'id');
  }

}
