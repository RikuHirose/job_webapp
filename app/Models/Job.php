<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $table = 'jobs';

    protected $fillable = [
      'id',
      'cover_url',
      'company_id',
      'title',
      'description',
      'application_qualification',
      'salary_min',
      'salary_max',
      'work_place'
    ];

    protected $dates = ['deleted_at'];

    // カスタムの情報を返す
    protected $appends = [
        'short_title',
    ];

    // Relations
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id', 'id');
    }

    public function favorites()
    {
        return $this->hasMany(\App\Models\Favorite::class, 'job_id', 'id');
    }

    public function applications()
    {
        return $this->hasMany(\App\Models\Application::class, 'job_id', 'id');
    }

    public function occupations()
    {
        return $this->belongsToMany(\App\Models\Occupation::class, 'job_occupations', 'job_id', 'occupation_id');
    }

    public function skills()
    {
        return $this->belongsToMany(\App\Models\Skill::class, 'job_skills', 'job_id', 'skill_id');
    }

    // adminでrelationする際にsetAdminSkillsAttributeの処理を挟むため、user側とadmin側が必要
    public function adminSkills()
    {
        return $this->belongsToMany(\App\Models\Skill::class, 'job_skills', 'job_id', 'skill_id');
    }

    public function adminOccupations()
    {
        return $this->belongsToMany(\App\Models\Occupation::class, 'job_occupations', 'job_id', 'occupation_id');
    }

    // Attributes
    public function getShortTitleAttribute()
    {
        return mb_strimwidth($this->title, 0, 55, '...');
    }

    public function getAdminSkillsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setAdminSkillsAttribute($value)
    {
        $this->attributes['adminSkills'] = implode(',', $value);
    }

    public function getAdminOccupationsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setAdminOccupationsAttribute($value)
    {
        $this->attributes['adminOccupations'] = implode(',', $value);
    }
}
