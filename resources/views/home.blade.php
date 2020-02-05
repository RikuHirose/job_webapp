@extends('layouts.app')

@section('content')
<div class="home">

  <!-- @include('components.jobs.search') -->
  <div>
    <search-form
      :skills="{{ json_encode($skills) }}"
      :occupations="{{ json_encode($occupations) }}"
      :office-time="{{ json_encode(config('constants.job.office_time')) }}"
      :work-time="{{ json_encode(config('constants.job.work_time')) }}"
      :parameters="{{ json_encode($parameters) }}"
      :search-button-title="'検索する'" />
  </div>

  <div>
  @each('components.jobs.indexCard', $jobs, 'job')
  </div>

  {{ $jobs->links('vendor.pagination.default') }}
</div>
@endsection