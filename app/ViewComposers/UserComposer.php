<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Skill;
use App\Models\Occupation;

class UserComposer
{
    protected $user;
    protected $skills;
    protected $occupations;

    public function __construct()
    {
        $currentUser = \Auth::user();

        if (is_null($currentUser)) {
            $this->user = $currentUser;
        } else {
            $this->user = $currentUser->load('bgImage', 'occupations', 'skills');
        }

        $this->skills      = Skill::all();
        $this->occupations = Occupation::all();
    }

    /**
    * Bind data to the view.
    * @param View $view
    * @return void
    */
    public function compose(View $view)
    {
        $view->with('currentUser', $this->user);
        $view->with('skills', $this->skills);
        $view->with('occupations', $this->occupations);
    }
}