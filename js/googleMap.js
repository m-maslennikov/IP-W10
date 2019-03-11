function myMap() {
    var mapProp= {
        center:new google.maps.LatLng(-36.845428, 174.763138),
        zoom:13,
    };
    var map = new google.maps.Map(document.getElementById('id_google-map'),mapProp);
    var markerPos = {lat: -36.845428, lng: 174.763138};
    var marker = new google.maps.Marker({position: markerPos});
    marker.setMap(map);
    var contentString = '<iframe width="426" height="240" src="https://www.youtube.com/embed/nIu0RTYyhiE?controls=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    var infowindow = new google.maps.InfoWindow({
  content: contentString
});

google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
});
}