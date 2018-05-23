
<!-- Implementa Select2 -->
<script src="{!! asset('js/plugins/select2/select2.full.min.js') !!}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#{{ $selectId }}').select2({
            placeholder: "{{ $placeholder }}"
        });
    });
</script>
