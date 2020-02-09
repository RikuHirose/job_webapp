<html>
<p>{{ $user->name }}様</p>

<p>この度は{{ config('app.name') }}運営事務局より、{{ $job->title }}</p>
<p>へご応募いただきまして誠にありがとうございます。</p>

<p>下記内容で応募を承りました。</p>

<p>応募企業名: {{ $company->name }}</p>
<p>求人名: {{ $job->title }}</p>

<p style="font-weight: bold;">■応募後の流れ・注意点</p>

<p>ご登録のプロフィール情報とエントリー時に入力いただく追加情報を元に、選考を実施いたします。
*後日、ご登録のメールアドレスに{{ config('app.name') }}運営事務局より参加可否のご案内をお送りします。そちらをもって参加可否確定となります。</p>

<p>※本メールアドレスは送信専用のため、返信できません。<br>
    お問い合わせは以下へ、お願い致します。</p>

  <p>---------------------------------------------</p>

   <p>{{ config('app.name') }}運営事務局</p>

   <a href="{{ route('home') }}" target="_blank">{{ route('home') }}</a>

  <p>----------------------------------------------</p>
</html>
