@extends('layout.master')
@section('content')
    @include('section.Page_banner_section', ['page' => 'About'])
    @include('section.About_section')
    @include('section.Counter_section')
    {{-- @include('section.Certificate_section') --}}
    @include('section.About_Service_section')
    @include('section.Service_Section')
    @include('section.Gallery_section')
    @include('section.Consultation_section')
@endsection
