@extends('layouts.app')

@section('content')
<div class="p-user-favorite">
  <div>
    @include('components.jobs.count', ['jobs' => $jobs, 'title' => 'お気に入りした求人一覧'])
  </div>

  <div>
    @each('components.jobs.indexCard', $jobs, 'job')
  </div>

  {{ $jobs->links('vendor.pagination.default') }}
</div>
@endsection