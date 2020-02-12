@extends('layouts.app', ['noContainer' => true])

@section('content')
<div class="p-home">

  <!-- p-home--image -->
  <div class="p-home__image">
    <p class="p-home--copy">あなたのエンジニアキャリアの一歩目のために</p>
    <div class="p-home__search-form">
        <search-form
        :skills="{{ json_encode($allSkills) }}"
        :occupations="{{ json_encode($allOccupations) }}"
        :office-time="{{ json_encode(config('constants.job.office_time')) }}"
        :work-time="{{ json_encode(config('constants.job.work_time')) }}"
        :parameters="{}"
        :search-button-title="'検索する'" />
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