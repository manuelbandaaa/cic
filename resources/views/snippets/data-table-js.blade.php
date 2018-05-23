
<!-- Implementa DataTable -->
<script src="{!! asset('js/plugins/dataTables/datatables.min.js') !!}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#{{ $tablaId }}').DataTable({!! $opciones !!});
    });
</script>
