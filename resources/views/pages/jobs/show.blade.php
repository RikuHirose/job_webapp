@extends('layouts.app')

@section('content')
<div class="p-job-show">

  <div class="p-job-show--content">
    <h1>{{ $job->title }}</h1>

    <!-- image -->
    <div class="w-100 p-job-show--image">
      <img src="{{ $job->cover_url }}" class="">
    </div>

    <!-- description -->
    <div class="p-job-show--description">
      <h2 class="h2-ttl">概要</h2>
      <p>
        {!! $job->description !!}
      </p>
    </div>

    <!-- show application_qualification -->
    <div class="p-job-show--application-qualification">
      <h2 class="h2-ttl">募集要件</h2>
        <p>
        {!! $job->application_qualification !!}
      </p>
    </div>

    <hr>

    <!-- show requirement -->
    <div class="p-job-show--requirement">
      <h2 class="h2-ttl">求人要件</h2>

      <div class="row">
          <div class="col-md-6">
            <div class="p-job-show--requirement__block">
              <h3 class="h3-ttl">オフィス出社頻度</h3>
              <p>{{ config("constants.job.office_time.$job->office_time") }}</p>
            </div>

            <div class="p-job-show--requirement__block">
              <h3 class="h3-ttl">働き方</h3>
              <p>{{ config("constants.job.work_time.$job->work_time") }}</p>
            </div>
            <div class="p-job-show--requirement__block">
              <h3 class="h3-ttl">スキル・職種</h3>
              @foreach($job->skills as $skill)
                <span class="m-tag">
                  {{ $skill->name }}
                </span>
              @endforeach

              @foreach($job->occupations as $occupation)
                <span class="m-tag">
                  {{ $occupation->name }}
                </span>
              @endforeach
            </div>
          </div>

          <div class="col-md-6">
            <div class="p-job-show--requirement__block">
              <h3 class="h3-ttl">報酬</h3>
              <p>
                {{ $job->salary_min }} ~ {{ $job->salary_max }}
              </p>
            </div>
          </div>
      </div>
    </div>

    <!-- show actions -->
    <div class="p-job-show--actions">
      <div class="p-job-show--actions__btns">
        @guest
          <a href="{{ route('login') }}">
            <button class="m-btn" btn-type="favorite">
              <span class="fa-star-yellow"></span>気になる!
            </button>
          </a>

          <a href="{{ route('login') }}">
            <button class="m-btn" btn-type="apply">応募する!</button>
          </a>
        @endGuest

        @auth
          <favorite-button
              :job-id="{{ json_encode($job->id) }}"
              :user-id="{{ json_encode($currentUser->id) }}"
              :default-favorite-count="{{ json_encode($defaultFavoriteCount) }}"
              :default-is-favorited="{{ json_encode($defaultIsFavorited) }}">
          </favorite-button>

          <apply-button
              :job-id="{{ json_encode($job->id) }}"
              :company-id="{{ json_encode($job->company->id) }}"
              :user-id="{{ json_encode($currentUser->id) }}"
              :default-is-applied="{{ json_encode($defaultIsApplied) }}">
          </apply-button>
        @endAuth

      </div>
    </div>

    <hr>

    <!-- show company -->
    <div class="p-job-show--company">
      <div class="row">
        <div class="col-md-3 text-center">
          <img src="{{ $job->company->logo_url }}" class="rounded-circle" style="width: 64px; height: 64px;">
        </div>
        <div class="col-md-9">
          <h2 class="h2-ttl">{{ $job->company->name }}</h2>
          <p>
            {{ $job->company->description }}
          </p>
          <p>
            <a href="{{ $job->company->website_url }}">
              {{ $job->company->website_url }}
            </a>
          </p>
        </div>
      </div>
    </div>

    <hr>

    <!-- show other -->
    <div class="p-job-show--other">
      <h2 class="h2-ttl">関連する求人一覧</h2>
      <div class="row">
        @foreach($relatedJobs as $job)
            <div class="col-md-4">
              @include('components.jobs.smallCard', ['job' => $job])
            </div>
        @endforeach
      </div>

      <div class="p-job-show--other__more">
        <a href="{{ \UrlHelper::jobsIndexWithParameterBySkillAndOccuoation($job->skills, $job->occupations) }}">
          もっと見る
        </a>
      </div>
    </div>

</div>
@endsection