@extends('layouts.app')

@section("links")
<link rel="stylesheet" href="{{asset("css/home.css")}}">
@endsection

@section("navbar")
<navbar-app></navbar-app>
@endsection

@section('content')
<div id="home" class="d-flex mx-auto">
    <menu-app>
    </menu-app>
    <div>
    </div>
</div>
@endsection

@section("scripts")
<script src="{{asset("js/home.js")}}"></script>
@endsection
