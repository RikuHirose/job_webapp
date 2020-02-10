<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cover_url',
        'birthday',
        'office_time_request',
        'work_time_request',
        'description',
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

    protected $dates = ['deleted_at'];

    // UIにカスタム情報を返すため
    protected $appends = [
        'birthday_year',
        'birthday_mounth',
        'birthday_day',
        'cover_url_full',
    ];

    // Relations
    public function occupations()
    {
        return $this->belongsToMany(\App\Models\Occupation::class, 'user_occupations', 'user_id', 'occupation_id');
    }

    public function skills()
    {
        return $this->belongsToMany(\App\Models\Skill::class, 'user_skills', 'user_id', 'skill_id');
    }

    public function userOccupations()
    {
        return $this->hasMany(\App\Models\UserOccupation::class, 'user_id', 'id');
    }

    public function userSkills()
    {
        return $this->hasMany(\App\Models\UserSkill::class, 'user_id', 'id');
    }

    public function getBirthdayYearAttribute()
    {
        return \UserHelper::getBirthYear($this->birthday);
    }

    public function getBirthdayMounthAttribute()
    {
        return \UserHelper::getBirthMonth($this->birthday);
    }

    public function getBirthdayDayAttribute()
    {
        return \UserHelper::getBirthDay($this->birthday);
    }

    public function getCoverUrlFullAttribute()
    {
        if (is_null($this->cover_url)) {
            return '/images/user-default.svg';
        }

        return $this->cover_url;
    }
}
