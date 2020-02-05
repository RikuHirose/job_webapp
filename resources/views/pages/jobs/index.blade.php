@extends('layouts.app')

@section('content')
<div class="p-index">

  <div>
    <search-form
      :skills="{{ json_encode($skills) }}"
      :occupations="{{ json_encode($occupations) }}"
      :office-time="{{ json_encode(config('constants.job.office_time')) }}"
      :work-time="{{ json_encode(config('constants.job.work_time')) }}"
      :parameters="{{ json_encode($parameters) }}"
      :search-button-title="'検索する'" />
  </div>

  @include('components.jobs.count')
  @each('components.jobs.indexCard', $jobs, 'job')

  {{ $jobs->links('vendor.pagination.default') }}
</div>
@endsection