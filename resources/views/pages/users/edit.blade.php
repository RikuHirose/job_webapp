@extends('layouts.app')

@section('content')
<div class="p-user-edit">

  <div class="p-user-edit__container">
    <form action="{{ route('user.update') }}" method="POST">
      @csrf

      <div class="m-frmbox">
        <image-upload-input
          :default-cover-url="{{ json_encode(!empty($currentUser->cover_url) ? $currentUser->cover_url : '') }}"
        ></image-upload-input>

      </div>

      <div class="m-frmbox">
        <label>お名前</label>
        <input type="text" class="form-control m-frmbox__text" name="name" value="{{ $currentUser->name }}" required>
      </div>

      <div class="m-frmbox">
        <label>メールアドレス</label>
        <input type="email" class="form-control m-frmbox__text" name="email" value="{{ $currentUser->email }}" required>
      </div>

      <div class="m-frmbox">
        <label>生年月日</label>
        <div class="form-row">
          <div class="form-group col-md-4">
            <select class="form-control m-frmbox__text" name="birth_year">
              <option value="">----</option>
                @for ($i = 1910; $i <= 2020; $i++)
                  <option value="{{ $i }}" @if(old('birth_year') == $i || $currentUser->birthday_year == $i) selected @endif>{{ $i }}</option>
                @endfor
              </select>
          </div>
          <div class="form-group col-md-4">
            <select id="birth_month" class="form-control m-frmbox__text" name="birth_month">
              <option value="">--</option>
              @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}" @if(old('birth_month') == $i || $currentUser->birthday_mounth == $i) selected @endif>{{ $i }}</option>
              @endfor
            </select>
          </div>
          <div class="form-group col-md-4">
            <select id="birth_day" class="form-control m-frmbox__text" name="birth_day">
              <option value="">--</option>
              @for ($i = 1; $i <= 31; $i++)
                <option value="{{ $i }}" @if(old('birth_day') == $i || $currentUser->birthday_day == $i) selected @endif>{{ $i }}</option>
              @endfor
            </select>
          </div>
        </div>
      </div>

      <div class="m-frmbox">
        <label>スキル</label>

        @foreach($allSkills as $skill)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="skills[]" value="{{ $skill->id }}"
              @if($skill->id == UserHelper::existUserSkill($skill->id)) checked @endif>

            <span class="form-check-label">{{ $skill->name }}</span>
          </div>
        @endforeach
      </div>

      <div class="m-frmbox">
        <label>希望職種</label>

        @foreach($allOccupations as $occupation)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="occupations[]" value="{{ $occupation->id }}" @if($occupation->id == UserHelper::existUserOccupation($occupation->id)) checked @endif>

            <span class="form-check-label">{{ $occupation->name }}</span>
          </div>
        @endforeach
      </div>

      <div class="m-frmbox">
        <label>オフィス出社頻度</label>

        <select class="form-control m-frmbox__text" name="office_time_request">
          @foreach(config('constants.job.office_time') as $key => $value)
            <option
              value="{{ $key }}"
              @if(old('office_time_request') == $key || $currentUser->office_time_request == $key) selected @endif>
              {{ $value }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="m-frmbox">
        <label>稼働</label>

        <select class="form-control m-frmbox__text" name="work_time_request">
          @foreach(config('constants.job.work_time') as $value)
            <option
              value="{{ $key }}"
              @if(old('work_time_request') == $key || $currentUser->work_time_request == $key) selected @endif>
            {{ $value }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="m-frmbox">
        <label>自己PR</label>

        @if(old('description'))
          <textarea name="description" class="form-control m-frmbox__textarea">{{ old('description') }}</textarea>
        @else
          <textarea name="description" class="form-control m-frmbox__textarea">{{ $currentUser->description }}</textarea>
        @endif
      </div>

      <div class="text-center">
        <button type="submit" class="m-btn" btn-type="primary">保存</button>
      </div>

    </form>
  </div>
</div>
@endsection