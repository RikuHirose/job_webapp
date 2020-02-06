@extends('layouts.app')

@section('content')
<div class="p-user-application">
  <div>
    @include('components.jobs.count', ['jobs' => $jobs, 'title' => '応募した求人一覧'])
  </div>

  <div>
    @each('components.jobs.indexCard', $jobs, 'job')
  </div>

  {{ $jobs->links('vendor.pagination.default') }}
</div>
@endsection