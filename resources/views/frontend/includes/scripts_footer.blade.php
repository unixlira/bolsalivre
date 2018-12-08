<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/rangeSlider.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.steps.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('front/js/additional-methods.js') }}"></script>
<script src="{{ asset('front/js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>

<script>
    $(function() {
        $('#logout').click(function(e) {
            e.preventDefault();
            $('#logout-form').submit()
        })
    })
</script>