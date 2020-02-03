<?php
namespace App\Repositories;

use App\Models\Occupation;

class OccupationRepository
{
    protected $occupation;

    /**
    * @param object $occupation
    */
    public function __construct(Occupation $occupation)
    {
        $this->occupation = $occupation;
    }

    public function getBlankModel()
    {
        return new Occupation();
    }
}