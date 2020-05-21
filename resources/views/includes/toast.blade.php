@if(session()->has('message'))
    <script>
        $(function(){
            toastr.options.closeButton = true;

            toastr.success("{{ session('message') }}");
        });
    </script>
@endif


