<div class="row mb-3 c-job-index-card">

  <div class="col-md-7 c-job-index-card--img__wrap">
    <a href="{{ route('jobs.show', $job->id) }}">
      <img src="{{ $job->bgImage->url }}" class="c-job-index-card--img__sizing">
    </a>
  </div>

  <div class="col-md-5 mt-2 mb-2 c-job-index-card--right">
    <div class="c-job-index-card__ttl--wrap">
        <h2 class="c-job-index-card__ttl">
          <a href="{{ route('jobs.show', $job->id) }}" class="c-job-index-card__ttl--link">{{ $job->title }}</a>
        </h2>
    </div>

    <div class="row">
      <div class="col-md-12">

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

    <div class="c-job-index-card--desc">
      @if(!empty($job->description))
        <p class="c-job-index-card--desc-p">
          {{ $job->description }}
        </p>
      @endif
    </div>

    <div class="c-job-index-card__btn--wrap">
      <a href="{{ route('jobs.show', $job->id) }}" class="w-100 m-btnM" btn-type="primary">
        詳しく見る
      </a>
    </div>
  </div>

</div>
