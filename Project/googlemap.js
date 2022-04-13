
let map;


function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 28.6024274, lng: -81.2000599 },
    zoom: 12,
  });
}