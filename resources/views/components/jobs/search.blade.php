<div class="c-job-search">
  <form method="GET" action="{{ route('user.jobs.index') }}" accept-charset="UTF-8">

    <select name="occupation_id" class="">
      <option value="">職種</option>
      @foreach($occupations as $occupation)
        <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
      @endforeach
    </select>

    <select name="skill_id" class="">
      <option value="">スキル</option>

      @foreach($skills as $skill)
        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
      @endforeach
    </select>

    <button type="submit" class="m-btn">検索する</button>
  </form>
</div>