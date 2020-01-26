<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $table = 'companies';

    protected $fillable = [
      'logo_image_id',
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

    // Relations
    public function logo()
    {
        return $this->belongsTo(\App\Models\File::class, 'logo_image_id', 'id');
    }

}
