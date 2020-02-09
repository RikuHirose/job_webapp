<?php

namespace App\Repositories\Job;

Use App\Models\Job;
Use App\Models\Favorite;
Use App\Models\Application;
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
        $jobs = $this->buildQueryByRelationModelKey($jobs, $parameters);

        if (isset($parameters['word'])) {
            $word = $parameters['word'];
            $jobs = $jobs->when($word, function ($query) use ($word) {
                  return $query
                  ->orWhere('title', 'like', "%{$word}%")
                  ->orWhere('description', 'like', "%{$word}%")
                  ->orWhere('application_qualification', 'like', "%{$word}%");
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
     * jobにひもづくrelationからqueryをreturn
     *
     * @param array $relationModelKey
     * @return $jobs
     */
    private function buildQueryByRelationModelKey(Job $model, Array $relationModelKey = null)
    {
        if (isset($relationModelKey['skill_id']) && !empty($relationModelKey['skill_id'][0]) ) {

            $skillIds  = $relationModelKey['skill_id'];
            $model     = $model->when($skillIds, function ($query) use ($skillIds) {
                // return $query->whereHas('skills', function ($q) use ($skillId) {
                //     $q->where('skills.id', $skillId);
                // });
                return $query->whereIn('jobs.id', function ($q) use ($skillIds) {
                    $q->from('job_skills')
                        ->select('job_skills.job_id')
                        ->whereIn('job_skills.skill_id', $skillIds);
                });
            });
        }

        if (isset($relationModelKey['occupation_id']) && !empty($relationModelKey['occupation_id'][0]) ) {

            $occupationIds  = $relationModelKey['occupation_id'];
            $model          = $model->when($occupationIds, function ($query) use ($occupationIds) {

              // return $query->whereHas('occupations', function ($q) use ($occupationId) {
              //     $q->where('occupations.id', $occupationId);
              // });
                return $query->whereIn('jobs.id', function ($q) use ($occupationIds) {
                    $q->from('job_occupations')
                        ->select('job_occupations.job_id')
                        ->whereIn('job_occupations.occupation_id', $occupationIds);
                });
            });
        }

        return $model;
    }

    /**
     * jobにひもづくrelationから検索
     *
     * @param array $relationModelKey
     * @return $jobs
     */
    public function getByRelationModelKey(Array $relationModelKey)
    {
        $jobs = $this->getBlankModel();
        $jobs = $this->buildQueryByRelationModelKey($jobs, $relationModelKey);

        return $jobs->get();
    }

    /**
     * お気に入りされたjobsを取得
     *
     * @param int $userId
     * @return $jobs
     */
    public function paginateByFavorited(int $userId)
    {
        $jobs = $this->getBlankModel();
        $jobs = $jobs->whereIn('jobs.id', function ($query) use ($userId) {
            return $query->from('favorites')
                ->select('favorites.job_id')
                ->where('favorites.user_id', $userId);
        });

        return $jobs->paginate();
    }

    /**
     * 応募されたjobsを取得
     *
     * @param int $userId
     * @return $jobs
     */
    public function paginateByApplied(int $userId)
    {
        $jobs = $this->getBlankModel();
        $jobs = $jobs->whereIn('jobs.id', function ($query) use ($userId) {
            return $query->from('applications')
                ->select('applications.job_id')
                ->where('applications.user_id', $userId);
        });

        return $jobs->paginate();
    }
}
