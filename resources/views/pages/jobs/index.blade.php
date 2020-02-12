@extends('layouts.app')

@section('content')
<div class="p-job-index">

  <div class="p-job-index__search-form">
    @include('components.jobs.search')
  </div>

  <div>
    @include('components.jobs.count', ['jobs' => $jobs, 'title' => '求人一覧'])
  </div>


  @each('components.jobs.indexCard', $jobs, 'job' ,'pages.jobs.empty')

  {{ $jobs->links('vendor.pagination.default') }}
</div>
@endsection