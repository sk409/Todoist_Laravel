@extends('layouts.app')

@section("links")
<link rel="stylesheet" href="{{asset("css/login.css")}}">
@endsection


@section('content')
<div class="align-items-center container d-flex flex-column h-100 justify-content-center">
    <div class="border login-form-card">
        <div class="font-large primary px-2 py-3 text-white">
            Todoistにログイン
        </div>
        <form class="px-2 py-3">
            <div>
                <label for="name-input">
                    ユーザ名
                </label>
                <div>
                    <input id="name-input" class="input w-100" name="username" type="text">
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
