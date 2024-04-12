<!-- Fraimwork - Jquery Include -->
<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap-dropdown-ml-hack.min.js') }}"></script>

<!-- animation - jquery include -->
{{-- <script src="{{ asset('/assets/js/cursor.min.js') }}"></script> --}}

<!-- Carousel - Jquery Include -->
<script src="{{ asset('/assets/js/slick.min.js') }}"></script>

<!-- Video & Image Popup - Jquery Include -->
<script src="{{ asset('/assets/js/magnific-popup.min.js') }}"></script>

<!-- Counter - Jquery Include -->
<script src="{{ asset('/assets/js/appear.min.js') }}"></script>
<script src="{{ asset('/assets/js/odometer.min.js') }}"></script>

<!-- Custom - Jquery Include -->
<script src="{{ asset('/assets/js/main.js') }}"></script>


<!-- Include Google Translate JavaScript library -->
<script>
    const sleep = m => new Promise(r => setTimeout(r, m))

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            autoDisplay: false
        }, 'translatedContent');
    }

    function changeLanguage(lang) {
        document.querySelector('.goog-te-combo').value = lang;
        document.querySelector('.goog-te-combo').dispatchEvent(new Event('change'));
    }
    $(document).on('click', '.language_switcher', function() {
        vall = $(this).data('lan');
        var l = "";
        if (vall == 'hi') {
            l =
                '<a class="nav-link language_switcher" data-lan="en" href="#!" onclick="changeLanguage(\'en\')">English</a>';
        } else {
            l =
                '<a class="nav-link language_switcher" data-lan="hi" href="#!" onclick="changeLanguage(\'hi\')">Hindi</a>';
        }
        $('.main_language_switcher').html(l)
    })
    $('.main_language_switcher').html(
        '<a class="nav-link language_switcher" data-lan="en" href="#!" onclick="changeLanguage(\'hi\')">Hindi</a>');
    $(function() {
        setTimeout(() => {
            changeLanguage('en');
        }, 4000);
    })
    setInterval(() => {
        if ($('.main_language_switcher a').html().includes('Nope')) {
            $('.main_language_switcher a').html('Hindi')
        }
    }, 2000);
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
@yield('scripts')
