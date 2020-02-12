@extends('layouts.app')

@section('content')
<div class="p-auth">
    <div class="container">
      <div class="row">
        <div class="mx-auto w-100">
          <div class="card-signin">
            <div class="signup card-body">
              <!-- email signup -->
              <div>
                <form action="{{ route('register') }}" method="POST">
                  @csrf
                  <h5 class="title title-up text-center mb-3 font-weight-bold gray">
                    メールアドレスで新規登録
                  </h5>

                  <div class="form-label-group col-lg-8 my-2 mx-auto black font-weight-bold">
                    <label>
                      メールアドレス
                    </label>

                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : (Session::get('callback_provider_user') ? Session::get('callback_provider_user')->getEmail() : '') }}" required autocomplete="email" placeholder="メールアドレスを入力してください">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="text-center">
                    <button
                      class="m-btn mx-auto col-md-4 my-2" btn-type="primary" type="submit">
                      送信
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
