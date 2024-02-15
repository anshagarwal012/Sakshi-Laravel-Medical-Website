@extends('layout.master')
@section('content')
    @include('section.Page_banner_section', ['page' => 'About'])
    @include('section.About_section')
    @include('section.Counter_section')
    @include('section.our_vision')
    @include('section.physo_section')

    {{-- @include('section.Certificate_section') --}}
    @include('section.About_Service_section')
    @include('section.Service_Section', ['services_button' => true])
    @include('section.Gallery_section', ['gallery_button' => true])
    {{-- @include('section.Consultation_section') --}}
@endsection
