<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies';

    protected $fillable = [
        'id',
        'file_id',
        'email',
        'password',
        'name',
        'description',
    ];


  // Relations
  public function file()
  {
      return $this->belongsTo(\App\Models\File::class, 'file_id', 'id');
  }

}
