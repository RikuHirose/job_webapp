<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $table = 'companies';

    protected $fillable = [
      'logo_url',
      'name',
      'email',
      'description',
      'address',
      'founded_at',
      'ceo_name',
      'staff_number_type',
      'website_url'
    ];

    protected $dates = ['deleted_at'];

    // カスタムの情報を返す
    protected $appends = [
    ];
}
