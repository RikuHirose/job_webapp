<div class="c-job-small-card">

  <div class="c-job-small-card--img__wrap">
    <a href="{{ route('jobs.show', $job->id) }}">
      <img src="{{ $job->bgImage->url }}" class="c-job-small-card--img__sizing">
    </a>

    <div class="c-job-small-card__ttl--wrap">
        <h2 class="c-job-small-card__ttl">
          <a href="{{ route('jobs.show', $job->id) }}" class="c-job-small-card__ttl--link">{{ $job->title }}</a>
        </h2>

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
</div>
