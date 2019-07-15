<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/mapa2.css')?>"/>
    <link rel="shortcut icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Mapa</title>
</head>
<body>
<?php $this->load->view('nav');?>
    <div class="container-fluid b1">
        <div class="b1">
            <br><br>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-11"><h4 class="menu"><strong><i>MAPA</i></strong></h4>
                    <br>
                    <p class="menu"><strong></strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid d-flex align-items-center mt-3 justify-content-center">
    <h4 style="color:black">Filtrar Preconceito:</h4>
    <select class="ml-3 form-control" style="width:30vw" id ="preconceito">
        <option value="1">Racismo</option>
        <option value="2">Homofobia</option>
        <option value="3">Transfobia</option>
        <option value="4">Gordofobia</option>
        <option value="5">Intolerancia religiosa</option>
        <option value="6">Sexismo</option>
        <option value="7">Xenofobia</option>
        <option value="8">Elitismo</option>
        <option value="9">Lgbtfobia</option>
        <option value="10">Preconceito contra deficientes</option>
    </select>
    <button class="ml-2 btn btn-danger" type="button" onclick="trocar()">Filtrar</button>
    </div>
    <div class="container-fluid mt-3" id="map"></div>
    <div class="container-fluid text-center  ">
        <h3 class="den mt-3">ÚLTIMAS DENUNCIAS <i class="fas fa-clock"></i></h3>
        <hr></hr>
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center text-center b2">
        <div class="row  justify-content-center">
        
        <?php  
        if(!$lastreports == false){
            foreach($lastreports as $denuncia){
            echo '<div class="col-lg-3 mt-3 centered">
                    <div class="bloco shadow">
                    <div class="row">
                        <div class="col-lg-4">
                            <h6 class="tituloBloco ml-1 mt-2">'.$denuncia->estado.'</h6>
                        </div>
                        <div class="col-lg-8">
                        <br>
                            <h7 class="text mt-5 ml-1">'.$denuncia->preconceito.'</h7>
                            <br>
                            <h8 class="text ml-2" style="margin-top:-10px;">'.$denuncia->endereco.'</h8>
                        </div>
                    </div>  
                        <p class="textoBloco text ml-2"><i>"'.substr($denuncia->descricao,0,50).'..."</i></p>
                        <br>
                        <p class="mais mb-3 text"><a class=" link text" href="'.base_url('Principal/mdenunciaf/'.$denuncia->id).'">LEIA +</a> </p>
                    </div>
                </div>';
            }
        }else{
            echo '<h2>Sem denuncias disponiveis</h2>';
        }?>
    
        </div>
    </div>
    <div class="container-fluid footer">
        <div class="container-fluid d-flex  justify-content-center align-items-center foot">
            <h5 id="footerH">RADAR DO PRECONCEITO | POR UMA SOCIEDADE MAIS JUSTA</h5>
        </div>
        <div class="container-fluid d-flex justify-content-center align-items-center baixo">
            <h5 id="footerH">Desenvolvido Por:<a href="http://enkisolucoes.com.br/" target="_blank"> Enki Soluções</a></h5>
        </div>
        </div>
    <script src="<?php echo base_url('assets/js/map.js')?>"> </script>
<script>
        let Racismo = [];
        let Homofobia = [];
        let Transfobia = [];
        let Gordofobia = [];
        let Religiosa = [];
        let Sexismo = [];
        let Xenofobia = [];
        let Elitismo = [];
        let LgbtFobia = [];
        let deficientes = [];
  
        function initMap() {
        <?php if(isset($Racismo)){
            foreach($Racismo as $valor){
                echo 'Racismo.push(new google.maps.LatLng('.$valor->lat.','.$valor->lng.'));';
            }
        }?>
        <?php if(isset($Homofobia)){
            foreach($Homofobia as $valor){
                echo 'Homofobia.push(new google.maps.LatLng('.$valor->lat.','.$valor->lng.'));';
            }
        }?>
        <?php if(isset($Gordofobia)){
            foreach($Gordofobia as $valor){
                echo 'Gordofobia.push(new google.maps.LatLng('.$valor->lat.','.$valor->lng.'));';
            }
        }?>
        <?php if(isset($Transfobia)){
            foreach($Transfobia as $valor){
                echo 'Transfobia.push(new google.maps.LatLng('.$valor->lat.','.$valor->lng.'));';
            }
        }?>
        <?php if(isset($Religiosa)){
            foreach($Religiosa as $valor){
                echo 'Religiosa.push(new google.maps.LatLng('.$valor->lat.','.$valor->lng.'));';
            }
        }?>
        <?php if(isset($Racismo)){
            foreach($Racismo as $valor){
                echo 'Racismo.push(new google.maps.LatLng('.$valor->lat.','.$valor->lng.'));';
            }
        }?>
        <?php if(isset($Sexismo)){
            foreach($Sexismo as $valor){
                echo 'Sexismo.push(new google.maps.LatLng('.$valor->lat.','.$valor->lng.'));';
            }
        }?>
        <?php if(isset($Xenofobia)){
            foreach($Xenofobia as $valor){
                echo 'Xenofobia.push(new google.maps.LatLng('.$valor->lat.','.$valor->lng.'));';
            }
        }?>
        <?php if(isset($Elitismo)){
            foreach($Elitismo as $valor){
                echo 'Elitismo.push(new google.maps.LatLng('.$valor->lat.','.$valor->lng.'));';
            }
        }?>
        <?php if(isset($Lgbtfobia)){
            foreach($Lgbtfobia as $valor){
                echo 'Lgbtfobia.push(new google.maps.LatLng('.$valor->lat.','.$valor->lng.'));';
            }
        }?>
        <?php if(isset($Deficientes)){
            foreach($Deficientes as $valor){
                echo 'Deficientes.push(new google.maps.LatLng('.$valor->lat.','.$valor->lng.'));';
            }
        }?>
        console.log(Homofobia);
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: -22.0622485,lng:-44.0443845},
          mapTypeId: 'hybrid',
          mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            rotateControl: false,
        });
        array1 = new google.maps.MVCArray(Racismo);
        array2 = new google.maps.MVCArray(Homofobia);
        array3 = new google.maps.MVCArray(Transfobia);
        array4 = new google.maps.MVCArray(Gordofobia);
        array5 = new google.maps.MVCArray(Religiosa);
        array6 = new google.maps.MVCArray(Sexismo);
        array7 = new google.maps.MVCArray(Xenofobia);
        array8 = new google.maps.MVCArray(Elitismo);
        array9 = new google.maps.MVCArray(LgbtFobia);
        array10 = new google.maps.MVCArray(deficientes);

        heatmap = new google.maps.visualization.HeatmapLayer({
          data: array1,
          map: map
        });
      }
     
    function toggleheatmap(valor){
        if(valor == 1){
            heatmap.setData(array1);
        }
        else if(valor == 2){
            heatmap.setData(array2);
        }
        else if(valor == 3){
            heatmap.setData(array3);
        }
        else if(valor == 4){
            heatmap.setData(array4);
        }
        else if(valor == 5){
            heatmap.setData(array5);
        }
        else if(valor == 6){
            heatmap.setData(array6);
        }
        else if(valor == 7){
            heatmap.setData(array7);
        }
        else if(valor == 8){
            heatmap.setData(array8);
        }
        else if(valor == 9){
            heatmap.setData(array9);
        }
        else if(valor == 10){
            heatmap.setData(array10);
        }
    }
    function trocar(){
        let select = document.getElementById('preconceito').value;
        toggleheatmap(select);
        console.log('trocando');
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO4dGu0GjhQi1FE0MVjJbBS6Eq_TNiimI&libraries=visualization&callback=initMap"></script>      
</body>
</html>