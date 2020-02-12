<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class UrlHelper
{
    public function jobsIndexWithParameterBySkillAndOccuoation(Collection $skills, Collection $occupations): string
    {
        $skillsParameter      = '';
        $occupationsParameter = '';

        foreach ($skills as $key => $skill) {
            $skillsParameter .= '&skill_id[]='.$skill->id;
        }

        foreach ($occupations as $key => $occupation) {
            $occupationsParameter .= '&occupation_id[]='.$occupation->id;
        }

        return route('jobs.index').'?'.$skillsParameter.$occupationsParameter;
    }

}
