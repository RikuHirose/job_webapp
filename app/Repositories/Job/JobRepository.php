<?php

namespace App\Repositories\Job;

Use App\Models\Job;
use App\Repositories\Base\BaseRepository;

class JobRepository extends BaseRepository implements JobRepositoryInterface
{

	public function getBlankModel()
	{
		return new Job();
	}

    /**
     * parameterからjobsを検索
     *
     * @param array $parameters
     * @return $jobs
     */
    public function paginateFilterByParameters(Array $parameters = null)
    {
        $jobs = $this->getBlankModel();

        if (isset($parameters['word'])) {
            $word = $parameters['word'];
            $jobs = $jobs->when($word, function ($query) use ($word) {
                  return $query
                  ->orWhere('title', 'like', "%{$word}%")
                  ->orWhere('description', 'like', "%{$word}%")
                  ->orWhere('application_qualification', 'like', "%{$word}%");
            });
        }

        if (isset($parameters['occupation_id'])) {
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

        if (isset($parameters['skill_id'])) {
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

        if (isset($parameters['work_time'])) {
            $workTime = $parameters['work_time'];
            $jobs     = $jobs->when($workTime, function ($query) use ($workTime) {
                return $query->where('work_time', $workTime);
            });
        }

        if (isset($parameters['office_time'])) {
            $officeTime = $parameters['office_time'];
            $jobs       = $jobs->when($officeTime, function ($query) use ($officeTime) {
                return $query->where('office_time', $officeTime);
            });
        }

        return $jobs->paginate();
    }

    /**
     * お気に入りされたjobsを取得
     *
     * @param array $parameters
     * @return $jobs
     */
    public function getByFavorited(int $userId)
    {
        $jobs = $this->getBlankModel();

        $jobs->whereIn('jobs.id', function ($query) use ($userId) {
            $query->from('favorites')
                ->select('favorites.job_id')
                ->where('favorites.user_id', $userId);
        });

        return $jobs->paginate();
    }

    /**
     * 応募されたjobsを取得
     *
     * @param array $parameters
     * @return $jobs
     */
    public function getByApplied(int $userId)
    {
        $jobs = $this->getBlankModel();

        $jobs->whereIn('jobs.id', function ($query) use ($userId) {
            $query->from('applications')
                ->select('applications.job_id')
                ->where('applications.user_id', $userId);
        });

        return $jobs->paginate();
    }
}
