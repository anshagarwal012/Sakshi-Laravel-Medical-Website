@extends('layout.master')
@section('title', 'Our Reviews')
{{-- @section('description', '')
@section('keywords', '') --}}
@section('content')
    @include('section.Page_banner_section', ['page' => 'Review'])
    @include('section.Testimonial_section')
    @include('section.video_reviews')
@endsection
