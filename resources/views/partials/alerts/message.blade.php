@push("js")
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            html: '{!! session()->get('message') !!}',
            showConfirmButton: false,
            timer: 3000
        })
    </script>
@endpush
