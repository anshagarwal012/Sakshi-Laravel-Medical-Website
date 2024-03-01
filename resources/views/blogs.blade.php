@extends('layout.master')
@section('title', 'All Blogs')
@section('content')
    @include('section.Page_banner_section', ['page' => 'Blog'])
    @include('section.bloggrid_section')
@endsection
