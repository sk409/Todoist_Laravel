@extends('layouts.app')

@section("links")
<link rel="stylesheet" href="{{asset("css/home.css")}}">
@endsection

@section("navbar")
<navbar-app></navbar-app>
@endsection

@section('content')
<div ref="defaultProjectJSON" hidden v-text="{{json_encode($defaultProject)}}"></div>
<div id="home" class="d-flex mx-auto h-100">
    <menu-app :default-color="{{json_encode($defaultColor)}}" :default-project="{{json_encode($defaultProject)}}"
        :user="{{json_encode(Auth::user())}}" v-on:selected:project="selectedProject">
    </menu-app>
    <todo-project :project="project" class="w-100 h-100" v-on:created:section="createdSection"
        v-on:created:todo="createdTodo" v-on:update:section="updateSection"></todo-project>
</div>
@endsection

@section("scripts")
<script src="{{asset("js/home.js")}}"></script>
@endsection
