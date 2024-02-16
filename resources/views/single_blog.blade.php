@extends('layout.master')
@section('content')
    @include('section.Page_banner_section', ['page' => $data['name']])
    @include('section.detail_blog_section')
    @include('section.recent_blogs')
@endsection
