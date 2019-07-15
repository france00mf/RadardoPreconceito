<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/contato.css')?>"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Cadastro de Profissionais</title>
</head>
<body>
   <?php $this->load->view('nav');?>
    <div class="container-fluid b1">
        <div class="b1">
            <br><br>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-11"><h4 class="menu"><strong><i>CADASTRO</i></strong></h4>
                    <br>
                    <p class="menu"><strong>Realize seu cadastro como profissional na nossa plataforma.</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid b2">
    <?php if($this->session->flashdata('validationerror')){
      echo '<div class="alert alert-danger">'.$this->session->flashdata('validationerror').'</div>';

    }?>
    <?php if($this->session->flashdata('error')){
      echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
    }?>
     <div class="row">  
        <div class="col-lg-1"></div> 
        <div class="col-lg-10"> 
        <form action="<?php echo base_url('Profissionais/cadastro')?>" method="POST" enctype="multipart/form-data">
            <br>
            <div class="form-group">
              <label for="inputemail">EMAIL </label>
                <input type="text" value="<?php echo set_value('email') ?>" name="email" class="form-control in" id="inputemail" placeholder="ex:  marcos@gmail.com">
            </div>
          <div class="form-group pt-2">
            <label for="inputsenha">SENHA: </label>
            <input type="password" name="pass" value="<?php echo set_value('pass')?>" class="form-control in" id="inputsenha">
          </div>
          <div class="form-group pt-2">
            <label for="inputsenha">CONFIRMAR SENHA: </label>
            <input type="password" name="confirmpass"  value="<?php echo set_value('confirmpass')?>"class="form-control in">
          </div>
          <div class="form-group pt-2">
            <label for="inputtel">TELEFONE: </label>
            <input type="text" name="telefone" value="<?php echo set_value('telefone')?>" class="form-control in" id="telefone">
          </div>
          <div class="form-group">
            <label for="inputadress">ENDEREÇO: </label>
            <input type="address" onfocusout="validarendereco()" oninput=" document.getElementById('validar').disabled = true" name="address" value="<?php echo set_value('address'); ?>" class="form-control in" id="inputadress" placeholder="ex: Av. Paulista, São Paulo - SP">

        </div>
          <div class="form-group pt-2">
            <label for="inputnome">NOME: </label>
            <input type="text" name="nome" value="<?php echo set_value('nome')?>" class="form-control in" id="inputnome" placeholder="ex: Marcos Silva">
          </div>
          <div class="form-group pt-2">
            <label for="inputdata">DATA DE NASCIMENTO: </label>
            <input type="date" name="nascimento" value="<?php echo set_value('nascimento')?>" class="form-control in" id="inputdata">
          </div>
          <div class="form-group">
            <input type="hidden" id="Lat" name="Lat" />
            <input type="hidden" id="Lng" name="Lng" />
            <input type="hidden" id='estado' name="estado"/>
          </div>
          <div class="form-group pt-2">
            <label for="inputgenero">GÊNERO: </label>
            <select  name="gender" id="inputgenero" class="in form-control">
                    <option selected value="feminino">Feminino</option>
                    <option value="masculino">Masculino</option>
                    <option value="transgenero">Transgênero</option>
                    <option value="queer">Queer</option>
                    <option value="agenero">Agênero</option>
                    <option value="intersexual">Intersexual</option>
                    <option value="outros">Outros</option>
            </select>
          </div>
          <div class="form-group pt-2">
            <label for="inputcpf">CPF: </label>
            <input type="text" name="cpf" value="<?php echo set_value('cpf')?>" class="form-control in" id="inputcpf">
          </div>
          <div class="form-group pt-2">
            <label for="inputprofissao">PROFISSÃO: </label>
            <select name="prof" id="inputprofissao" class="in form-control">
                    <option value="Advogado">Advogado</option>
                    <option value="Psicólogo">Psicólogo</option>
                    <option value="Assistente Social">Assistente social</option>
            </select>
          </div>
          <div class="form-group pt-2">
            <label for="inputdescription">SOBRE MIM: </label>
            <textarea class="form-control in" name="description" value="<?php echo set_value('description')?>" id="inputdescription" rows="8" placeholder="ex: Sou o Marcos, tenho experiência na área de direito há 8 anos e estou na plataforma em busca única exclusivamente de ajudar quem precisa das devidas orientações."></textarea>
          </div>   
          <div class="form-group pt-2">
            <label for="inputarquivo">IMAGEM: </label>
            <input type="file" class="form-control in" name="arquivo" id="inputarquivo">
          </div>  
          <div class="form-group pt-2 captcha">
            <div class="g-recaptcha"  data-sitekey="6Lef3noUAAAAAHWMRrgzg13cAA1BEyuFWoz0oT09"></div>
          <div> 
            <br><br>
          <button type="submit" id="validar" disabled="true" class="btn btn-dark" style="float: right;">ENVIAR</button>
          </form>
          <br>
          <br>
         </div>    
         <div class="col-lg-1"></div>
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
    <script src='https://www.google.com/recaptcha/api.js'></script>
        <script>
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
        
         
         </script>
         <script>
         function validarendereco(){
          let validar = document.getElementById('validar');
          let lat = document.getElementById('Lat');
          let lng = document.getElementById('Lng');
          setTimeout(()=>{
        
            if(lat.value == "" && lng.value == ""){
              Swal({
              type: 'error',
              title: 'Você digitou um local invalido!',
              text: 'Volte e selecione um local valido',
        
            });
            validar.disabled = true;
        
         }
         else{
            validar.disabled = false;
         }},500);
        
        }
        </script>
        <?php if($this->session->tempdata('sucesso')){
          echo '<script>'.$this->session->tempdata('sucesso').'</script>';
          $this->session->unset_tempdata('sucesso');
        }?>
        <?php if($this->session->tempdata('captchaerror')){
          echo '<script>'.$this->session->tempdata('captchaerror').'</script>';
          $this->session->unset_tempdata('captchaerror');
        }?>
        <script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

  <script>
    $(document).ready(function(){
        $('#telefone').mask('(00) 00000-0000');
        $('#inputcpf').mask('000.000.000.00');
    });
</script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO4dGu0GjhQi1FE0MVjJbBS6Eq_TNiimI&libraries=places&callback=initAutocomplete"
                async defer></script>
        <script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
            <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
            
</body>
</html>
