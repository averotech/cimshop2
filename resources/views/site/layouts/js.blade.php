<script>
    let BASE_URL = '<?php echo e(url('/' . app()->getLocale() . '/' )); ?>';
    let TOKN = '{{ csrf_token() }}';
    let LANG = '<?php echo app()->getLocale() ; ?>';
</script>


<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/js/fontawesome.min.js') }}"></script>
<script src="{{ asset('assets/js/mainScript.js') }}"></script>
<script src="{{ asset('assets/js/sliderRange.js') }}"></script>
<script src="{{ asset('assets/js/jquery.popup.lightbox.js') }}"></script>
@stack('_js')
<script src="{{ asset('js/app.js') }}"></script>
@stack('js')
