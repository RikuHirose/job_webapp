<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $table = 'companyExams';

    protected $fillable = [
      'id',
      'exam_id',
      'body',
      'write_score',
      'choice_score',
      'algorithm_score',
      'total_score',
    ];


  // Relations
  public function exam()
  {
      return $this->belongsTo(\App\Models\Exam::class, 'exam_id', 'id');
  }
}
