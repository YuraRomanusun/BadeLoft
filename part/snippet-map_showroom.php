<?php $location = get_field('map_room_single');
if (!empty($location)) { ?>
    <div id="map" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
<?php } ?>
<script>
    var map;
    function initMap() {
        $marker = $('#map');
        var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

        var mouseScroll;
        if ($(window).width() > 960) {
            mouseScroll = true;
        } else {
            mouseScroll = false;
        }

        map = new google.maps.Map(document.getElementById('map'), {
            center: latlng,
            zoom: 17,
            scrollwheel: mouseScroll
        });

        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });

    }
</script>
<style>
    #map {
        height: 320px;
    }
</style>