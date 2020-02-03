<?php

namespace App\Repositories\Job;

Use App\Models\Job;

class JobRepository implements JobRepositoryInterface
{

	public function getBlankModel()
	{
		return new Job();
	}

    public function filterByParameters($parameters)
    {
        $jobs = $this->getBlankModel();

        if (!is_null($parameters['occupation_id'])) {
            $occupationId = $parameters['occupation_id'];
            $jobs         = $jobs->when($occupationId, function ($query) use ($occupationId) {
                return $query->whereHas('occupations', function ($q) use ($occupationId) {
                    $q->where('occupations.id', $occupationId);
                });
            });
        }

        if (!is_null($parameters['skill_id'])) {
            $skillId = $parameters['skill_id'];
            $jobs    = $jobs->when($skillId, function ($query) use ($skillId) {
                return $query->whereHas('skills', function ($q) use ($skillId) {
                    $q->where('skills.id', $skillId);
                });
            });
        }

        return $jobs;
    }
}
