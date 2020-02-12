<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Occupation;

class UserComposer
{
    protected $user;
    protected $jobs;
    protected $skills;
    protected $occupations;

    public function __construct()
    {
        $currentUser = \Auth::user();

        if (is_null($currentUser)) {
            $this->user = $currentUser;
        } else {
            $this->user = $currentUser->load('occupations', 'skills');
        }

        $jobs = Job::all();
        $jobs->load('company', 'occupations', 'skills');

        $this->jobs        = $jobs;
        $this->skills      = Skill::all();
        $this->occupations = Occupation::all();
        $this->parameters  = \Request::query();
    }

    /**
    * Bind data to the view.
    * @param View $view
    * @return void
    */
    public function compose(View $view)
    {
        $view->with('currentUser', $this->user);
        $view->with('allJobs', $this->jobs);
        $view->with('allSkills', $this->skills);
        $view->with('allOccupations', $this->occupations);
        $view->with('parameters', $this->parameters);
    }
}