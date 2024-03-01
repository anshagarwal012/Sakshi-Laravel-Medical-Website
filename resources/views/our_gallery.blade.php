@extends('layout.master')
@section('title', 'Our Gallery')
{{-- @section('description', '') --}}
@section('content')
    @include('section.Page_banner_section', ['page' => 'Gallery'])
    @include('section.Gallery_section', ['gallery_button' => false])
@endsection
