<!doctype html>
<html lang="en">

<head>
    <title>@yield('title') - Handle With Ease</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="description" content="@yield('description', 'Welcome to handle with ease where healing meets expertise under the guidance of Dr.Sakshi Chaurasia (PT)As a seasoned physiotherapist')">
    <meta name=”robots” content="index, follow">
    <meta name="keywords" content="@yield('keywords', 'physiotherapist,what is a physiotherapist,physiotherapist vs physical therapist,physiotherapist definition,physiotherapist salary,physiotherapist near me,pelvic floor physiotherapist,physiotherapist clinic,physiotherapist clinics,back pain physiotherapist')">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">
    <link rel="canonical" href="https://handlewithease.com/">

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
