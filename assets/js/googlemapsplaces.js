function initAutocomplete() {
    let input = document.getElementById('inputadress');
    options = {
      types: ['geocode'],
      componentRestrictions:{country:'br'}

    }
   const autocomplete = new google.maps.places.Autocomplete(input,options);
   google.maps.event.addListener(autocomplete,'place_changed', function () {    
    var lugar = autocomplete.getPlace();
    if(lugar.geometry){
      document.getElementById('validar').disabled = false;
      document.getElementById('Lat').value = lugar.geometry.location.lat();
      document.getElementById('Lng').value = lugar.geometry.location.lng();
      for(var i = 0;i<lugar.address_components.length; i++){
        let endertipo = lugar.address_components[i];
        let estado = document.getElementById('estado');
        if(endertipo.types[0]== "administrative_area_level_1"){
            estado.value = endertipo.short_name;
            break;
      }
    }}
   });
  }
