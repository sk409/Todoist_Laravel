@extends('layouts.app')

@section("links")
<link rel="stylesheet" href="{{asset("css/register.css")}}">
@endsection


@section('content')
<div class="align-items-center container d-flex flex-column h-100 justify-content-center">
    <div class="border register-form-card">
        <div class="font-large primary px-2 py-3 text-white">
            Todoistに登録
        </div>
        <form class="px-2 py-3" action="{{route("register")}}" method="POST">
            @csrf
            <div>
                <label for="name-input">
                    ユーザ名
                </label>
                <div>
                    <input id="name-input" class="input w-100" name="name" type="text">
                </div>
            </div>
            <div>
                <label for="email-input">
                    メールアドレス
                </label>
                <div>
                    <input id="email-input" class="input w-100" name="email" type="text">
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
            <div class="mt-3">
                <label for="password-input-confirmation">
                    パスワード確認
                </label>
                <div>
                    <input id="password-input-confirmation" class="input w-100" name="password_confirmation"
                        type="password">
                </div>
            </div>
            <div class="mt-3 text-center">
                <input type="submit" class="button primary" value="登録">
            </div>
        </form>
    </div>
    <div class="mt-4">
        <a href="{{route("login")}}">Todoistにログイン</a>
    </div>
</div>
@endsection
