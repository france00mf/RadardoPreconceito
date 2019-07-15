function initAutocomplete() {
    let input = document.getElementById('inputadress');
    options = {
      types: ['geocode'],
      componentRestrictions:{country:'br'}

    }
   const autocomplete = new google.maps.places.Autocomplete(input,options);
   google.maps.event.addListener(autocomplete,'place_changed', function () {
    // Get geocoder instance
    var geocoder = new google.maps.Geocoder();

    // Geocode the address
    geocoder.geocode({'address': input.value}, function(results, status){
        if (status === google.maps.GeocoderStatus.OK && results.length > 0) {
            // set it to the correct, formatted address if it's valid
            var lugar = autocomplete.getPlace();
            addr.value = results[0].formatted_address;
            document.getElementById('Lat').value = results[0].geometry.location.lat();
            document.getElementById('Lng').value = results[0].geometry.location.lng();
            for(var i = 0;i<lugar.address_components.length; i++){
                let endertipo = lugar.address_components[i];
                let estado = document.getElementById('estado');
                if(endertipo.types[0]== "administrative_area_level_1"){
                    estado.value = endertipo.short_name;
                    break;
                }
              }

    // show an error if it's not
        }else{ Swal({
            title: "Falha !",
            text:  "Preencha corretamente a barra de endereço !",
            type: "error"
});}
    });
});
}