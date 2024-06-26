@extends('layout.master')
@section('title', 'Home Page')
@section('description',
    'Welcome to handle with ease where healing meets expertise under the guidance of Dr.Sakshi
    Chaurasia As a seasoned physiotherapist')
@section('content')
    {{-- {{dd($data)}} --}}
    @include('section.Hero_Section')
    @include('section.About_section')
    @include('section.Service_Section', ['services_button' => true])
    @include('section.bloger_section')
    @include('section.gallery')
    @include('section.FAQ_section')
    @include('section.Testimonial_section')
    @include('section.video_reviews')
    @include('section.Contact_section')
@endsection
