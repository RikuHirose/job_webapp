@extends('layouts.app')

@section('content')
<div class="home">

  @include('components.jobs.search')

  @each('components.jobs.indexCard', $jobs, 'job')

  {{ $jobs->links('vendor.pagination.default') }}
</div>
@endsection