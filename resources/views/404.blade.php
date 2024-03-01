@extends('layout.master')
@section('title', '404 Not Found')
@section('description', 'Oops! That Page Can’t be Found')
@section('content')
    @include('section.error_section')
@endsection
