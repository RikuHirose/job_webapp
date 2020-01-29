@extends('layouts.app')

@section('content')
<div class="home">
  @each('components.jobs.indexCard', $jobs, 'job')
</div>
@endsection