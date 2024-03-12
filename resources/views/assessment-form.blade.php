@extends('layout.master')
@section('title', 'Patient Physiotherapy Assessment Form')
@section('content')
    @include('section.Page_banner_section', ['page' => 'Patient Physiotherapy Assessment Form'])
    @include('section.assessment-form')
@endsection
