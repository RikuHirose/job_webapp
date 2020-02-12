@extends('layouts.app')

@section('content')
<div class="p-job-index">

  <div class="p-job-index__search-form">
    <search-form
      :skills="{{ json_encode($allSkills) }}"
      :occupations="{{ json_encode($allOccupations) }}"
      :office-time="{{ json_encode(config('constants.job.office_time')) }}"
      :work-time="{{ json_encode(config('constants.job.work_time')) }}"
      :parameters="{{ json_encode($parameters) }}"
      :search-button-title="'検索する'" />
  </div>

  <div>
    @include('components.jobs.count', ['jobs' => $jobs, 'title' => '求人一覧'])
  </div>


  @each('components.jobs.indexCard', $jobs, 'job' ,'pages.jobs.empty')

  {{ $jobs->links('vendor.pagination.default') }}
</div>
@endsection