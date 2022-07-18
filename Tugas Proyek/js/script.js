// Map
function initialize() {
    var propertiPeta = {
        center: new google.maps.LatLng(-7.833123, 110.383103),
        zoom: 20,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };

    var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
}
// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);