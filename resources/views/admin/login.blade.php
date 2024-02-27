@extends('admin.layouts.master-without-nav')
@section('title')
    Login
@endsection
@section('page-title')
    Login
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        @if (session('message'))
            <script>
                alert('{{ session('message') }}')
            </script>
        @endif
        <div class="authentication-bg min-vh-100">
            <div class="bg-overlay bg-light"></div>
            <div class="container">
                <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                    <div class="row justify-content-center my-auto">
                        <div class="mb-4 pb-2">
                            <a href="/admin/login" class="d-block auth-logo">
                                <img src="{{ URL::asset('assets/images/site_logo/company.png') }}" alt=""
                                    class="auth-logo-dark me-start" width="200">
                            </a>
                        </div>
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="text-center mt-2 mx-2 d-flex justify-content-between align-items-center">
                                        <h5>LOGIN</h5>
                                        <a href="/" class="btn btn-warning"><i class="fa fa-home"></i></a>
                                        {{-- <p class="text-muted">Sign in to continue to webadmin.</p> --}}
                                    </div>
                                    <div class="p-2 mt-4">
                                        <form method="POST" class="auth-input" id="login"
                                            action="{{ URL('admin/validate_login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="username">UserName <span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                    <span class="bx bx-mail-send"></span>
                                                    <input type="text"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        placeholder="Enter Username" id="username" name="username" required
                                                        value="">
                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                    <span class="bx bx-lock-alt"></span>
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        placeholder="Enter password" id="password-input" name="password"
                                                        required autocomplete="current-password" value="">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn btn-primary w-100 login_form" type="submit">Sign
                                                    In</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div><!-- end col -->
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center p-4">
                                <p>©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> | Developed By by Webly Technolab
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- end container -->
        </div>
        <!-- end authentication section -->
    @endsection
