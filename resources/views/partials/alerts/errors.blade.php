@section("js")
    <script>
        Swal.fire({
           position: 'top-end',
           icon: 'error',
           html: '{!! $errors->first() !!}',
           showConfirmButton: false,
           timer: 3000
       })
    </script>
@append
