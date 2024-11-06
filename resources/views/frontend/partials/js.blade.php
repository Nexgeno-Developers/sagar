<script type="text/javascript" src="/assets/frontend/js/jquery.js"></script>
<script  defer type="text/javascript" src="/assets/frontend/js/owl-carousel.js"></script>
<script type="text/javascript" src="/assets/frontend/js/bootstrap5.min.js"></script>
<script defer type="text/javascript" src="/assets/frontend/js/script.js"></script>

<!--moment js-->
<script defer src="/assets/frontend/js/moment.min.js"></script>

<!--jQuery Validate-->
<script defer type="text/javascript" src="/assets/frontend/js/jquery.validate.min.js"></script>

<!--select2-->
<script defer type="text/javascript" src="/assets/frontend/js/select2.full.min.js"></script>

<!--Toast Js-->
<script defer type="text/javascript" src="/assets/frontend/js/toastr.min.js"></script>

<script defer type="text/javascript" src="/assets/frontend/js/Init.js"></script>

<!-- <script defer src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->

<script defer src="https://cdn.gtranslate.net/widgets/latest/dwf.js" defer></script>
<!-- <script defer type="text/javascript" src="/assets/frontend/js/gtranslate_dwf.js"></script> -->
<!-- <script defer src="js/google_translate.js" defer></script> -->
<!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->
<script type="text/javascript" src="/assets/frontend/js/google-translate.js"></script>

 <script>
    window.gtranslateSettings = {
        "default_language": "en",
        "detect_browser_language": true,
        "wrapper_selector": ".gtranslate_wrapper",
        "flag_size": 16,
        "switcher_horizontal_position": "inline"
    };

    // Function to handle language selection and navigate to the translated page
    function doGTranslate(select) {
        const language = select.value.split('|')[1];
        window.location.href = "https://translate.google.com/translate?sl=auto&tl=" + language + "&u=" + window.location.href;
    }

    // Set the language to English on every page load
    window.addEventListener('load', function() {
        const languageSelector = document.getElementById('languageSelector');
        
        // Always select English on load
        languageSelector.value = "en|en"; // Set the dropdown to English
        doGTranslate(languageSelector); // Automatically translate to English
    });
</script>