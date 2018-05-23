
<!-- Implementa Range Slider -->
<script src="{!! asset('js/plugins/rangeSlider/ion.rangeSlider.js') !!}" type="text/javascript"></script>

<script>
    $(function () {
        $("#{{ $rangeSliderId }}").ionRangeSlider({
            hide_min_max: false,
            keyboard: true,
            values: {!! json_encode($rango) !!},
            from: {!! $inicio!!},
            to: {!! $fin !!},
            type: 'double',
            step: 1,
            grid: true,
            prettify_enabled: false
        });
    });
</script>