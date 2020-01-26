<?php

namespace App\Models;

use App\Traits\PresenterBuildable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use PresenterBuildable;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'bg_image_id',
        'description',
        'address',
        'gender',
        'birthday',
        'age',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relations
    public function bgImage()
    {
        return $this->belongsTo(\App\Models\File::class, 'bg_image_id', 'id');
    }

    public function occupations()
    {
        return $this->belongsToMany(\App\Models\Occupation::class, 'user_occupations', 'user_id', 'occupation_id');
    }

    public function skills()
    {
        return $this->belongsToMany(\App\Models\Skill::class, 'user_skills', 'user_id', 'skill_id');
    }
}
