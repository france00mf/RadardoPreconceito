<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/denuncia.css')?>"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Denuncia Física</title>
</head>
<body>
    <?php $this->load->view('nav')?>
    <div class="container-fluid b1">
        <div class="b1">
            <br><br>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-11"><h4 class="menu"><strong><i>DENÚNCIA</i></strong></h4>
                    <br>
                    <p class="menu"><strong></strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid b2">
    <?php if($this->session->flashdata('error')){
      echo '<div class="alert alert-danger">'.$this->session->flashdata('error')."</div>" ;
    } ?>
    <?php if($this->session->tempdata('sucesso')){
      echo '<script>'.$this->session->tempdata('sucesso').'</script>';
      $this->session->unset_tempdata('sucesso');
    }?>
    <?php if($this->session->flashdata('validationerror')){
      echo '<div class="alert alert-danger">'.$this->session->flashdata('validationerror').'</div>';
    }?>
    <?php if($this->session->tempdata('captchaerror')){
      echo '<script>'.$this->session->tempdata('captchaerror').'</script>';
      $this->session->unset_tempdata('captchaerror');
    }?>
     <div class="row">  
        <div class="col-lg-1"></div> 
        <div class="col-lg-10"> 
        <form action="<?php echo base_url('Denuncia_controller/denuncia_fisica')?>" method="POST">
            <br><br>
          <div class="form-group">
            <label for="inputadress">ENDEREÇO: </label>
            <input type="address" onfocusout="validarendereco()" oninput=" document.getElementById('validar').disabled = true" name="address" value="<?php echo set_value('address'); ?>" class="form-control in" id="inputadress" placeholder="ex: Av. Paulista, São Paulo - SP">
          </div>
          <div class="form-group pt-3">
                <label for="inputdate">DATA: </label>
                <input type="date" name="date"  value="<?php echo set_value('date') ?>" class="form-control in" id="inputdate">
          </div>
          <div class="form-group pt-3">
                <label for="inputhour">HORA: </label>
                <input type="time" name="hour" value="<?php echo set_value('hour')?>" class="form-control in" id="inputhour">
          </div>
          <div class="form-group pt-3">
            <input type="hidden" id="Lat" name="lat" />
            <input type="hidden" id="Lng" name="lng" />
            <input type="hidden" id="estado" name="state">
          </div>
          <div class="form-group pt-3">
                <label for="inputaidade">SUA IDADE: </label>
                <input type="text" name="age" class="form-control in" value="<?php echo set_value('age')?>" id="inputidade" placeholder="ex: 18">
          </div>
          <div class="form-group pt-3">
              
                <label for="inputagression">AGRESSÃO: </label>
                <select  name="agression" id="inputagression" class="in form-control">
                        <option selected value="Física">Física</option>
                        <option value="Verbal">Verbal</option>
                        <option value="Moral">Moral</option>
                        <option value="Institucional">Institucional</option>
                </select> 
              </div>
          <div class="form-group pt-3">
              
                <label for="inputprejudice">PRECONCEITO: </label>
                <select  name="prejudice" id="inputprejudice" class="in form-control">
                    <option selected value="Racismo">Racismo</option>
                    <option value="Homofobia">Homofobia</option>
                    <option value="Transfobia">Transfobia</option>
                    <option value="Gordofobia">Gordofobia</option>
                    <option value="Intolerância religiosa">Intolerância religiosa</option>
                    <option value="Sexismo">Sexismo</option>
                    <option value="Xenofobia">Xenofobia</option>
                    <option value="Classismo">Elitismo</option>
                    <option value="LGBTfobia">Lgbtfobia</option>
                    <option value="Preconceito contra deficientes">Preconceito contra Deficientes</option>
                </select> 
              </div>
          <div class="form-group pt-3">
              
            <label for="inputgenero">GÊNERO: </label>
            <select  name="gender" id="inputgenero" class="in form-control">
                    <option selected value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Transgênero">Transgênero</option>
                    <option value="Queer">Queer</option>
                    <option value="Agênero">Agênero</option>
                    <option value="Intersexual">Intersexual</option>
                    <option value="Outros">Outros</option>
            </select>
          </div> 
          <div class="form-group pt-3">
            <label for="inputdescription">DESCRIÇÃO: </label>
            <textarea class="form-control in" name="description" value="<?php echo set_value('descricao')?>" id="inputdescription" rows="12" placeholder="ex: Fui agredida verbalmente por um desconhecido no centro da cidade no início da noite da última sexta-feira, pelo fato de ser negra"></textarea>
          </div>
          <div class="form-group pt-3">
                <label>SUA DENUNCIA PODE SER EXPOSTA NA PLATAFORMA ?</label>
                <select name="permissao" class="form-control in">
                <option selected value='0'>Sim</option>
                <option value="1">Não</option>
                </select>
          </div>
          <div class="form-group pt-3">
              <div style="background-color:black;color:white" class="container d-flex d-flex justify-content-center">
                  <h4>Ao clicar em denunciar você afirma que:</h4>
              </div>
              <div style="background-color:black;color:white" class="container d-flex d-flex justify-content-center">
                    <ol>
                    <li>Não citou nenhum local comercial em específico</li>
                    <li>Sua denuncia não é falsa</li>
                    <li>Não citou o nome completo de nenhuma pessoa física</li>
                    <li>Sua denuncia não é falsa</li>
                    </ol>
                   
              </div>
              <div style="background-color:black;color:white" class="container d-flex d-flex justify-content-center">
              <h6>Caso aconteça o descumprimento de qualquer uma dessas regras sua informação será imediatamente apagada</h6>
              </div>
          </div>   
          <div class="form-group pt-3 captcha">
                <div class="g-recaptcha"  data-sitekey="6Lef3noUAAAAAHWMRrgzg13cAA1BEyuFWoz0oT09"></div>
          <div>
            <br><br>
          <button type="submit" disabled="true"  id="validar" class="btn btn-dark" style="float: right;">DENUNCIAR</button>
        </form>
         </div>    
         <div class="col-lg-1"></div>
    </div> 
    </div>    
    <div class="container-fluid mt-5 footer">
        <div class="container-fluid d-flex  justify-content-center align-items-center foot">
            <h5 id="footerH">RADAR DO PRECONCEITO | POR UMA SOCIEDADE MAIS JUSTA</h5>
        </div>
        <div class="container-fluid d-flex justify-content-center align-items-center baixo">
            <h5 id="footerH">Desenvolvida Por:<a href="http://enkisolucoes.com.br/" target="_blank"> Enki Soluções</a></h5>
        </div>
        </div>
    <script src='https://www.google.com/recaptcha/api.js'></script>
        <script>
         function initAutocomplete() {
          let validar = document.getElementById('validar');
            let input = document.getElementById('inputadress');
            options = {
              types: ['geocode'],
              componentRestrictions:{country:'br'}
        
            }
           const autocomplete = new google.maps.places.Autocomplete(input,options);
           google.maps.event.addListener(autocomplete,'place_changed', function () {
            
            var lugar = autocomplete.getPlace();
            if(lugar.geometry){
              validar.disabled = false;
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
          
</script>
         <script>
         function validarendereco(){
         
          let lat = document.getElementById('Lat');
          let lng = document.getElementById('Lng');
          setTimeout(()=>{
             if(lat.value == "" && lng.value == ""){
              Swal({
              type: 'error',
              title: 'Você digitou um local invalido!',
              text: 'Volte e selecione um local valido',
        
            });
        
         }
         },500);
        
        }
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO4dGu0GjhQi1FE0MVjJbBS6Eq_TNiimI&libraries=places&callback=initAutocomplete"
                async defer></script>
        <script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
            <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
            
</body>
</html>