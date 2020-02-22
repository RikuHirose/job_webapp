@extends('layouts.app', ['noContainer' => true])

@section('content')
<div class="p-index">

  <!-- p-index--image -->
  <div class="p-index__image">
    <p class="p-index--copy">エンジニアキャリアの一歩目を支える</p>
    <div class="p-index__search-form">
        @include('components.jobs.search')
    </div>
  </div>

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div>
                @include('components.jobs.count', ['jobs' => $jobs, 'title' => '求人一覧'])
              </div>

              <div>
                @each('components.jobs.indexCard', $jobs, 'job')
              </div>

              {{ $jobs->links('vendor.pagination.default') }}
          </div>
      </div>
  </div>
</div>
@endsection