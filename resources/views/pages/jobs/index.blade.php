@extends('layouts.app')

@section('content')
<div class="p-index">

  @include('components.jobs.search')

  @include('components.jobs.count')
  @each('components.jobs.indexCard', $jobs, 'job')

  {{ $jobs->links('vendor.pagination.default') }}
</div>
@endsection