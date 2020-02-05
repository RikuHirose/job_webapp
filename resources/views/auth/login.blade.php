@extends('layouts.app')

@section('content')
<div class="p-auth">
    <div class="container">
      <div class="row">
        <div class="mx-auto w-100">
          <div class="card-signin">
            <h2 class="text-center my-4 black font-weight-bold">
              ようこそ<span class="light-blue">{{ config('app.name') }}</span>へ
            </h2>

            <div class="signup card-body">
              <!-- login fb -->
              <div>
                <div class="text-center mb-3">
                  <button class="m-btn mx-auto col-md-6" btn-type="facebook" type="submit">
                    facebookアカウントでログイン
                  </button>
                </div>

                <div class="mt-2 mb-3 gray text-center">
                  * SNSに利用状況等が投稿されることはありません
                </div>

                <div class="or">
                  <div class="or__block or__block--left"></div>
                  <div class="or__block or__block--center">
                    <span>または</span>
                  </div>
                  <div class="or__block or__block--right"></div>
                </div>
              </div>

              <div>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <h5 class="title title-up text-center mb-3 font-weight-bold gray">
                    メールアドレスでログイン
                  </h5>

                  <div class="form-label-group col-lg-8 my-2 mx-auto black font-weight-bold">
                    <label>
                      メールアドレス
                    </label>
                    <input name="email" class="form-control" type="email" placeholder="メールアドレスを入力してください" required>
                  </div>

                  <div class="form-label-group col-lg-8 my-2 mx-auto black font-weight-bold">
                     <label>
                        パスワード
                      </label>
                    <input name="password" class="form-control" type="password" placeholder="パスワードを入力してください" required>
                  </div>

                  <div class="text-center">
                    <button
                      class="m-btn mx-auto col-md-4 my-2" btn-type="primary" type="submit">
                      メールアドレスでログイン
                    </button>
                  </div>
                </form>
              </div>

              <div class="text-center gray">
                  アカウントをお持ちでない方は<a href="{{ route('register') }}">会員登録</a>
              </div>
            </div>
            <div class="footer text-center">
              <div class="gray">
                {{ config('app.name') }}の登録は、<a href="/terms" target="_blank">利用規約 </a>および<a href="/privacy" target="_blank">プライバシーポリシー </a>に同意したものとみなします。
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
