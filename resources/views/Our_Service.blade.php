@extends('layout.master')
@section('title', 'Services')
@section('description', 'Experience tailored physiotherapy treatments for holistic healing, improving mobility, and relieving pain effectively and safely.')
@section('content')
    @include('section.Page_banner_section', ['page' => 'Services'])
    @include('section.Service_Section',['services_button' => false])
    @include('section.Our_service_about_section')
    {{-- @include('section.consultation_process') --}}
    {{-- @include('section.Consultation_section_2') --}}
@endsection
