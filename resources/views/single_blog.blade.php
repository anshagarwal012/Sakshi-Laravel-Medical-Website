@extends('layout.master')
@section('title', $data['desc'])
@section('description', '')
@section('keywords', '')
@section('content')
    @include('section.Page_banner_section', ['page' => 'Single Blog'])
    @include('section.detail_blog_section')
    @include('section.recent_blogs')
@endsection
