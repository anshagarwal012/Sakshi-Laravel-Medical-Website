@extends('layout.master')
@section('title', 'Contact Us')
@section('content')
    @include('section.Page_banner_section', ['page' => 'Contact'])
    @include('section.Contact_section')
@endsection
