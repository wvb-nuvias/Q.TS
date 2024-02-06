<div id="location-map" class="form-control block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal" style="height: 290px"></div>
<script>
    var L = window.L;

    var map = L.map('location-map');

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

    reloadmap(map);

    function reloadmap(map) {
        map.setView([{{ $address->lat }},{{ $address->lng }}],18);
    }
</script>
