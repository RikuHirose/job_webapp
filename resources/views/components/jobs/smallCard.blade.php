<div class="c-job-small-card">

  <div class="c-job-small-card--img__wrap">
    <a href="{{ route('jobs.show', $job->id) }}">
      <img src="{{ $job->bgImage->url }}" class="c-job-small-card--img__sizing">
    </a>

    <div class="c-job-small-card__ttl--wrap">
        <h3 class="c-job-small-card__ttl">
          <a href="{{ route('jobs.show', $job->id) }}" class="c-job-small-card__ttl--link">{{ $job->short_title }}</a>
        </h3>
        <div class="c-job-small-card__job-item">
          <span class="c-job-small-card__job-item--ttl">働き方</span>
          <span class="c-job-small-card__job-item--content">
            {{ config("constants.job.work_time.$job->work_time") }}
          </span>
        </div>
        <div class="c-job-small-card__job-item">
          <span class="c-job-small-card__job-item--ttl">オフィス出社頻度</span>
          <span class="c-job-small-card__job-item--content">
            {{ config("constants.job.office_time.$job->office_time") }}
          </span>
        </div>
        <div class="c-job-small-card__job-item">
          <span class="c-job-small-card__job-item--ttl">報酬</span>
          <span class="c-job-small-card__job-item--content">
            {{ $job->salary_min }} ~ {{ $job->salary_max }}
          </span>
        </div>
    </div>
  </div>
</div>
