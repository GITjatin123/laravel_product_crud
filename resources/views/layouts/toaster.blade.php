<script>

    let toastrConfiguration = {
        // timeOut: 100000,
        positionClass: 'toast-top-center',
    };

    @if($errors->any())
    toastr.error("Please check Errors", 'Oops!', toastrConfiguration)
    @endif

    @if (\Session::has('success'))
    toastr.success("{{\Session::get('success')}}", 'Greet!', toastrConfiguration)
    @endif

    @if (\Session::has('status'))
    toastr.success("{{\Session::get('status')}}", 'Greet!', toastrConfiguration)
    @endif

    @if (\Session::has('error'))
    toastr.error("{{\Session::get('error')}}", 'Oops!', toastrConfiguration)
    @endif

    @if (\Session::has('warning'))
    toastr.warning("{{\Session::get('warning')}}", 'Warning!', toastrConfiguration)
    @endif

    @if (\Session::has('info'))
    toastr.info("{{\Session::get('info')}}", 'Info!', toastrConfiguration)
    @endif

</script>
