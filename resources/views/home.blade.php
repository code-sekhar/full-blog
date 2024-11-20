@extends('layout.layout')
@section('title','Home Page')
@section('content')
    <div class="home_page">
        <div class="port_wr">
            @include('sections.post')
        </div>
    </div>
@endsection
