<!-- Fraimwork - Jquery Include -->
<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap-dropdown-ml-hack.min.js') }}"></script>

<!-- animation - jquery include -->
<script src="{{ asset('/assets/js/cursor.min.js') }}"></script>

<!-- Carousel - Jquery Include -->
<script src="{{ asset('/assets/js/slick.min.js') }}"></script>

<!-- Video & Image Popup - Jquery Include -->
<script src="{{ asset('/assets/js/magnific-popup.min.js') }}"></script>

<!-- Counter - Jquery Include -->
<script src="{{ asset('/assets/js/appear.min.js') }}"></script>
<script src="{{ asset('/assets/js/odometer.min.js') }}"></script>

<!-- Custom - Jquery Include -->
<script src="{{ asset('/assets/js/main.js') }}"></script>

<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!-- Include Google Translate JavaScript library -->
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'translatedContent');
    }

    function changeLanguage(lang) {
        setTimeout(function() {
            document.querySelector('.goog-te-combo').value = 'hi'; // Set target language to Hindi
            document.querySelector('.goog-te-combo').dispatchEvent(new Event('change'));
            // Update content language
            updateContentLanguage(lang);
        }, 1000);
    }

    function showOriginal() {
        var elementsToTranslate = document.querySelectorAll('[data-lang]');
        elementsToTranslate.forEach(function(element) {
            element.textContent = element.dataset.lang.en;
        });
    }

    function updateContentLanguage(lang) {
        // Implement logic to update content language based on the selected language
        var elementsToTranslate = document.querySelectorAll('[data-lang]');
        elementsToTranslate.forEach(function(element) {
            if (lang === 'hi') {
                element.textContent = element.dataset.lang.hi; // Display Hindi content
            } else {
                element.textContent = element.dataset.lang.en; // Display English content
            }
        });
    }
</script>
@yield('scripts')
