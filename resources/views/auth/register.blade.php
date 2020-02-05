@extends('layouts.app')

@section('content')
<div class="p-auth">
    <div class="container">
      <div class="row">
        <div class="mx-auto w-100">
          <div class="card-signin">
            <h2 class="text-center my-4 black font-weight-bold">ようこそ<span class="light-blue">{{ config('app.name') }}</span>へ</h2>

            <div class="signup card-body">
              <h5
                v-if="callbackMessage"
                class="title title-up text-center mb-3 font-weight-bold gray">
                ss
              </h5>
              <!-- login fb -->
              <div v-if="!isOpenMailSignup">
                <div class="text-center mb-3">
                  <button class="m-btn mx-auto col-md-6" btn-type="facebook" type="submit">
                    facebookアカウントで新規登録
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

              <!-- email signup -->
              <div>
                <form action="{{ route('register') }}" method="POST">
                  @csrf
                  <h5 class="title title-up text-center mb-3 font-weight-bold gray">
                    メールアドレスで新規登録
                  </h5>
                  <div class="form-label-group col-lg-8 my-2 mx-auto black font-weight-bold">
                    <label>
                      名前
                    </label>
                    <input
                      name="name"
                      class="form-control"
                      type="text"
                      placeholder="名前を入力してください"
                      required>
                  </div>
                  <div class="form-label-group col-lg-8 my-2 mx-auto black font-weight-bold">
                    <label>
                      メールアドレス
                    </label>
                    <input
                      name="email"
                      class="form-control"
                      type="email"
                      placeholder="メールアドレスを入力してください"
                      required>
                  </div>
                  <div class="form-label-group col-lg-8 my-2 mx-auto black font-weight-bold">
                     <label>
                        パスワード
                      </label>
                    <input
                      name="password"
                      class="form-control"
                      type="password"
                      placeholder="パスワードを入力してください"
                      required>
                  </div>
                  <div class="form-label-group col-lg-8 my-2 mx-auto black font-weight-bold">
                    <label>
                      パスワードの確認
                    </label>
                    <input
                      name="password_confirmation" type="password" class="form-control" placeholder="パスワードを入力してください" required>
                  </div>
                  <div class="text-center">
                    <button
                      class="m-btn mx-auto col-md-4 my-2" btn-type="primary" type="submit">
                      メールアドレスで新規登録
                    </button>
                  </div>
                </form>
              </div>

              <div class="text-center gray">
                  すでにアカウントを持ってる場合は<a href="">ログイン</a>してください
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
