<div class="c-job-count">
  <span class="c-job-count__bold">求人一覧</span>
   {{ $jobs->count() + ($jobs->perPage() * ($jobs->currentPage() - 1)) }} / {{ $jobs->total() }}
</div>