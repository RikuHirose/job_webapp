<div class="c-job-search">
  <search-sp-form
        :skills="{{ json_encode($allSkills) }}"
        :occupations="{{ json_encode($allOccupations) }}"
        :office-time="{{ json_encode(config('constants.job.office_time')) }}"
        :work-time="{{ json_encode(config('constants.job.work_time')) }}"
        :parameters="{{ json_encode($parameters) }}"
        :search-button-title="'検索する'" />
</div>