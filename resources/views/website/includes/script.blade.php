<script src="{{ asset('/') }}website/assets/js/jquery.js"></script>
<script src="{{ asset('/') }}website/assets/js/popper.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/owl.js"></script>
<script src="{{ asset('/') }}website/assets/js/wow.js"></script>
<script src="{{ asset('/') }}website/assets/js/validation.js"></script>
<script src="{{ asset('/') }}website/assets/js/jquery.fancybox.js"></script>
<script src="{{ asset('/') }}website/assets/js/appear.js"></script>
<script src="{{ asset('/') }}website/assets/js/scrollbar.js"></script>
<script src="{{ asset('/') }}website/assets/js/isotope.js"></script>
<script src="{{ asset('/') }}website/assets/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/jQuery.style.switcher.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/jquery-ui.js"></script>
<script src="{{ asset('/') }}website/assets/js/nav-tool.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- main-js -->
<script src="{{ asset('/') }}website/assets/js/script.js"></script>

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>
