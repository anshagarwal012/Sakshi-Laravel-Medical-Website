@extends('layout.master')
@section('content')
    @include('section.Page_banner_section', ['page' => 'home'])
    @include('section.team')
@endsection
