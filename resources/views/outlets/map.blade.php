@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body" id="mapid"></div>
</div>
@endsection

@push('scripts')
<script>
    var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});
    var baseUrl = "{{url('/') }}";

    L.titleLayer('https://{s}.title.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    axios.get('{{ route('api.outlets.index') }}')
    .then(fuction (response) {
        console.log(response.data);
        L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng){
                return L.marker(latlng);
            }
        })
        .bindPopup(function (layer){
            return layer.feature.properties.map_popup_content;
        }).addto(map);
    })
    .catch(function (error){
        console.log(error);
    });

    @can('create', new App\Outlet)
    var theMarker;

    map.on('click', function(e){
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);

        if(theMarker != underfined){
            map.removeLayer(theMarker);
        };

        var popupContent = "Your location : " + latitude + ", " + longitude + ".";
        popupContent += '<br><a href="{{ route('outlets.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Add new outlet here</a>';

        theMarker = L.marker([latitude, longitude]).addTo(map);
        theMarker.bindPopup(popupContent)
        .openPopup();
    });
    @endcan
</script>
@endpush