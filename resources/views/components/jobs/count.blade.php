<div class="c-job-count">
  求人一覧 {{ $jobs->count() + ($jobs->perPage() * ($jobs->currentPage() - 1)) }} / {{ $jobs->total() }}
</div>