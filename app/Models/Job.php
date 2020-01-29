<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

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

    protected $dates = ['deleted_at'];

    // Relations
    public function bgImage()
    {
        return $this->belongsTo(\App\Models\File::class, 'bg_image_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id', 'id');
    }

    public function occupations()
    {
        return $this->belongsToMany(\App\Models\Occupation::class, 'job_occupations', 'job_id', 'occupation_id');
    }

    public function skills()
    {
        return $this->belongsToMany(\App\Models\Skill::class, 'job_skills', 'job_id', 'skill_id');
    }

}
