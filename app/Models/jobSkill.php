<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{

    protected $table = 'job_skills';

    protected $fillable = [
        'id',
        'job_id',
        'skill_id',
    ];


  // Relations
  public function job()
  {
      return $this->belongsTo(\App\Models\Job::class, 'job_id', 'id');
  }

  public function skill()
  {
      return $this->belongsTo(\App\Models\Skill::class, 'skill_id', 'id');
  }

}
