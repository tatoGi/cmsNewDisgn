
<!-- Vendor js -->
<script src="{{ asset('admin/assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/admin/js/vendor.min.js')}}"></script>
<!--Morris Chart-->
<script src="{{ asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>

<script src="{{ asset('/admin/libs/morris-js/morris.min.js')}}"></script>
<script src="{{ asset('/admin/libs/raphael/raphael.min.js')}}"></script>
<!-- knob plugin -->
<script src="{{ asset('/admin/libs/jquery-knob/jquery.knob.min.js')}}"></script>
@filemanagerScript
<!-- ckeditor script -->
<script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
<script>
    var allEditors = document.querySelectorAll('.ckeditor');
    for (var i = 0; i < allEditors.length; ++i) {
      ClassicEditor.create(allEditors[i]);
    }
</script>

<script src="{{ asset('/admin/js/app.min.js')}}"></script>
<script src="{{ asset('/admin/js/script.js')}}"></script>

@stack('scripts')



<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<!-- Dashboard init js-->
{{-- <script src="{{ asset('/admin/js/pages/dashboard.init.js')}}"></script> --}}

<!-- App js --
