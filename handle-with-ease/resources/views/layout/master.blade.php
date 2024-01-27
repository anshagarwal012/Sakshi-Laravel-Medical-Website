<!doctype html>
<html lang="en">

  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @include('layout.head-css')
</head>
<body>
    <div class="page_wrapper">
        <div class="backtotop">
            <a href="#" class="scroll">
              <i class="fa-solid fa-arrow-up"></i>
            </a>
          </div>

          @include('layout.header')
          <main class="page_content">
            @yield('content')
          </main>
          @include('layout.footer')
    </div>
    @include('layout.scripts')
</body>
</html>