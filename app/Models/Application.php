<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    protected $table = 'applications';

    protected $fillable = [
      'job_id',
      'user_id',
      'company_id',
      'status',
    ];

    protected $dates = ['deleted_at'];

    // Relations
    public function job()
    {
        return $this->belongsTo(\App\Models\Job::class, 'job_id', 'id');
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
