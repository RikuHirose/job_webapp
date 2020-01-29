@extends('layouts.app')

@section('content')
<div class="p-job-show">

    
  <div class="p-job-show--content">
    <h1>{{ $job->title }}</h1>

    <!-- image -->
    <div class="w-100 p-job-show--image">
      <img src="{{ $job->bgImage->url }}" class="">
    </div>

    <!-- description -->
    <div class="p-job-show--description">
      <h2>概要</h2>
      <p>
        {{ $job->description }}
      </p>
    </div>

    <!-- show application_qualification -->
    <div class="p-job-show--application-qualification">
      <h2>募集要件</h2>
        <p>
        {{ $job->application_qualification }}
      </p>
    </div>

    <hr>

    <!-- show requirement -->
    <div class="p-job-show--requirement">
      <h2>求人要件</h2>

      <div class="row">
          <div class="col-md-6">
            <div class="p-job-show--requirement__block">
              <h3>オフィス出社頻度</h3>
              <p>{{ config("constants.job.office_time.$job->office_time") }}</p>
            </div>

            <div class="p-job-show--requirement__block">
              <h3>働き方</h3>
              <p>{{ config("constants.job.work_time.$job->work_time") }}</p>
            </div>
            <div class="p-job-show--requirement__block">
              <h3>スキル・職種</h3>
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
              <h3>報酬</h3>
              <p>
                {{ $job->salary_min }} ~ {{ $job->salary_max }}
              </p>
            </div>
          </div>
      </div>
    </div>

    <!-- show actions -->
    <div class="p-job-show--actions">
      <div class="w-50 mx-auto">
        <button class="m-btn">気になる!</button>
        <button class="m-btn">応募する!</button>
      </div>
    </div>

    <hr>

    <!-- show company -->
    <div class="p-job-show--company">
      <div class="row">
        <div class="col-md-3 text-center">
          <img src="{{ $job->company->logo->url }}" class="rounded-circle" style="width: 64px; height: 64px;">
        </div>
        <div class="col-md-9">
          <h2>{{ $job->company->name }}</h2>
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
      <h2>関連する求人一覧</h2>
    </div>

</div>
@endsection