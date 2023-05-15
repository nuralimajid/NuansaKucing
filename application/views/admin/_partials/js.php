<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('js/sb-admin.min.js') ?>"></script>
<!-- Demo scripts for this page-->
<script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
<script src="<?php echo base_url('js/demo/chart-area-demo.js') ?>"></script>
<!-- maps -->
<script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.1/mapbox-gl-geocoder.min.js'></script>s
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>


<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoibWFqaWRpbGtoaXRoYXIiLCJhIjoiY2p6MjM5dmU1MDI1bTNsb2N3Mnd5bTVnNSJ9.3c5mpJMok0q-V25-e9a9bA';
    var coordinate = document.getElementById('latitude');
    var coordinat = document.getElementById('longitude');
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/majidilkhithar/cjz2jzw6f40pj1cpmz4oq1gkk',
        center: [106.83732815057937, -6.194926378793809],
        zoom: 13
    });


    var marker = new mapboxgl.Marker({
            draggable: true
        })
        .setLngLat([106.83732815057937, -6.194926378793809])
        .addTo(map);

    function onDragEnd() {
        var lngLat = marker.getLngLat();
        coordinate.style.display = 'block';
        coordinate.value = lngLat.lat;
        coordinat.value = lngLat.lng;
    }

    marker.on('dragend', onDragEnd);

    map.on('click', function(point) {
        coordinat.value = point.lng()
    });

    map.addControl(new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        zoom: 18,
        placeholder: "Pencarian..",
        mapboxgl: onDragEnd
    }));

    map.addControl(new mapboxgl.NavigationControl());
</script>

<!-- Rekomendasi Username -->
<script>
    $(document).ready(function() {
        $("#nama-lengkap").keyup(function() {
            let namaLengkap = $(this).val();

            let namaUsername = namaLengkap.replace(/\s/g, '').toLowerCase();

            $('#username').val(namaUsername);
        });
    });
</script>

<!-- Show Hidden Password -->
<script>
    $(document).ready(function() {
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });
    });
</script>