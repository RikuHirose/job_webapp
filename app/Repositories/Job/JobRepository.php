<?php

namespace App\Repositories\Job;

Use App\Models\Job;

class JobRepository implements JobRepositoryInterface
{

	public function getBlankModel()
	{
		return new Job();
	}

    public function paginateFilterByParameters($parameters)
    {
        $jobs = $this->getBlankModel();

        if (!is_null($parameters['occupation_id'])) {
            $occupationId = $parameters['occupation_id'];
            $jobs         = $jobs->when($occupationId, function ($query) use ($occupationId) {
                // return $query->whereHas('occupations', function ($q) use ($occupationId) {
                //     $q->where('occupations.id', $occupationId);
                // });
                return $query->whereIn('jobs.id', function ($q) use ($occupationId) {
                    $q->from('job_occupations')
                        ->select('job_occupations.job_id')
                        ->where('job_occupations.occupation_id', $occupationId);
                });
            });
        }

        if (!is_null($parameters['skill_id'])) {
            $skillId = $parameters['skill_id'];
            $jobs    = $jobs->when($skillId, function ($query) use ($skillId) {
                // return $query->whereHas('skills', function ($q) use ($skillId) {
                //     $q->where('skills.id', $skillId);
                // });
                return $query->whereIn('jobs.id', function ($q) use ($skillId) {
                    $q->from('job_skills')
                        ->select('job_skills.job_id')
                        ->where('job_skills.skill_id', $skillId);
                });
            });
        }

        return $jobs->paginate();
    }
}
