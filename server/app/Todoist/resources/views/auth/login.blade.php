@extends('layouts.app')

@section("links")
<link rel="stylesheet" href="{{asset("css/login.css")}}">
@endsection


@section('content')
<div class="align-items-center container d-flex flex-column h-100vh justify-content-center w-100vw">
    <div class="border login-form-card">
        <div class="font-large primary px-2 py-3 text-white">
            Todoistにログイン
        </div>
        <form class="px-2 py-3" action="{{route("login")}}" method="POST">
            @csrf
            <div>
                <label for="email-input">
                    メールアドレス
                </label>
                <div>
                    <input id="email-input" class="input w-100" name="email" type="email">
                </div>
            </div>
            <div class="mt-3">
                <label for="password-input">
                    パスワード
                </label>
                <div>
                    <input id="password-input" class="input w-100" name="password" type="password">
                </div>
            </div>
            <div class="mt-3 text-center">
                <input type="submit" class="button primary" value="ログイン">
            </div>
        </form>
    </div>
    <div class="mt-4">
        <a href="{{route("register")}}">Todoistに登録</a>
    </div>
</div>
@endsection
