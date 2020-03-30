
<!-- jQuery -->
<script src="{{url('/')}}/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('/')}}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="{{url('/')}}/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{url('/')}}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- jquery-validation -->
<script src="{{url('/')}}/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{url('/')}}/admin/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('/')}}/admin/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="{{url('/')}}/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

@stack('scripts')
</body>
</html>