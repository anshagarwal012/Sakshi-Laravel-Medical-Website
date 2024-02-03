@extends('layout.master')
@section('content')
    @include('section.Page_banner_section', ['page' => 'gallery'])
    @include('section.gallery')
@endsection
