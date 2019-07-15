function initMap(data) {
map = new google.maps.Map(document.getElementById('mapa'), {
    zoom: 4,
    center: {lat: -22.0622485,lng:-44.0443845},
    mapTypeId: 'satellite'
  });

  heatmap = new google.maps.visualization.HeatmapLayer({
    data: data,
    map: map
  });
}