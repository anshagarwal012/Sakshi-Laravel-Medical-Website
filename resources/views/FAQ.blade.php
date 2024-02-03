@extends('layout.master')
@section('content')
    @include('section.Page_banner_section', ['page' => 'home'])
    @include('section.faq_2_section')
    @include('section.Contact_component_1')
@endsection
