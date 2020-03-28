@extends('layouts.app')

@section("links")
<link rel="stylesheet" href="{{asset("css/register.css")}}">
@endsection


@section('content')
<div class="align-items-center container d-flex flex-column h-100vh justify-content-center w-100vw">
    <div class="border register-form-card">
        <div class="font-large primary px-2 py-3 text-white">
            Todoistに登録
        </div>
        <div class="px-2 py-3">
            <div>
                <label for="name-input">
                    ユーザ名
                </label>
                <div>
                    <input v-model="name" id="name-input" class="input w-100" name="name" type="text">
                </div>
            </div>
            <div>
                <label for="email-input">
                    メールアドレス
                </label>
                <div>
                    <input v-model="email" id="email-input" class="input w-100" name="email" type="text">
                </div>
            </div>
            <div class="mt-3">
                <label for="password-input">
                    パスワード
                </label>
                <div>
                    <input v-model="password" id="password-input" class="input w-100" name="password" type="password">
                </div>
            </div>
            <div class="mt-3">
                <label for="password-input-confirmation">
                    パスワード確認
                </label>
                <div>
                    <input v-model="passwordConfirmation" id="password-input-confirmation" class="input w-100"
                        name="password_confirmation" type="password">
                </div>
            </div>
            <div class="mt-3 text-center">
                <div class="button primary" v-on:click="register">登録</div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{route("login")}}">Todoistにログイン</a>
    </div>
</div>
@endsection

@section("scripts")
<script src="{{asset("js/register.js")}}"></script>
@endsection
