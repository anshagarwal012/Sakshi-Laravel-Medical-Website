@extends('layout.master')
@section('content')
    {{-- {{dd($data)}} --}}
    @include('section.Hero_Section')
    @include('section.bloger_section')
    @include('section.Service_Section', ['services_button' => true])
    @include('section.About_section')
    @include('section.FAQ_section')
    @include('section.Testimonial_section')
    @include('section.Consultation_section')
    {{-- @include('section.Contact_section') --}}
@endsection
