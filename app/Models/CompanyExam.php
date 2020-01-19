<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyExam extends Model
{

    protected $table = 'companyExams';

    protected $fillable = [
        'id',
        'exam_id',
        'company_id',
    ];


  // Relations
  public function exam()
  {
      return $this->belongsTo(\App\Models\Exam::class, 'exam_id', 'id');
  }

  public function company()
  {
      return $this->belongsTo(\App\Models\Company::class, 'company_id', 'id');
  }

}
