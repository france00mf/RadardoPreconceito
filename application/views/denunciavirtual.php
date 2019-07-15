<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/denunciavirtual.css')?>"/>
    
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Denuncia Virtual</title>
</head>
<body>
    <?php $this->load->view('nav'); ?>
    <div class="container-fluid b1">
        <div class="b1">
            <br><br>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-11"><h4 class="menu"><strong><i>DENÚNCIA VIRTUAL</i></strong></h4>
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
        <form action="<?php echo base_url('Denuncia_controller/denuncia_virtual')?>" method="POST" enctype="multipart/form-data">
            <br><br>
          <div class="form-group">
            <label for="inputadress">SITE: </label>
            <select name="address" id="inputadress" class="in form-control">
                    <option selected value="Facebook">Facebook</option>
                    <option value="Twitter">Twitter</option>
                    <option value="Whatsapp">Whatsapp</option>
                    <option value="Instagram">Instagram</option>
                    <option value="Outro">Outro</option>

            </select> 
          </div>
          <div class="form-group pt-3">
                <label for="inputdate">DATA: </label>
                <input type="date" name="date" value="<?php echo set_value('date'); ?>"  class="form-control in" id="inputdate">
          </div>
          <div class="form-group pt-3">
                <label for="inputhour">HORA: </label>
                <input type="time" name="hora" value="<?php echo set_value('hora');?>" class="form-control in" id="inputhour">
          </div>
          <div class="form-group pt-3">
            <input type="hidden" id="Lat" name="lat" />
            <input type="hidden" id="Lng" name="lng" />
            <input type="hidden" id="estado" name="state">
          </div>
          <div class="form-group pt-2">
                <label for="inputaidade">SUA IDADE: </label>
                <input type="text" name="age" value="<?php echo set_value('age');?>" class="form-control in" id="inputidade" placeholder="ex: 18">
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
                    <option value="LGBTfobia">Lgbt+ Fobia</option>
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
            <textarea class="form-control in"  value="<?php echo set_value('descricao')?>" name="description" id="inputdescription" rows="10" placeholder="ex: Fui agredida verbalmente por um desconhecido no centro da cidade no início da noite da última sexta-feira, pelo fato de ser negra"></textarea>
          </div>   
         <div class="form-group pt-3">
            <label for="inputarquivo">IMAGEM OU PRINT: </label>
            <input type="file" class="form-control in" name="arquivo" id="inputarquivo">
          </div>
          <div class="form-group pt-3">
          <div style="background-color:black;color:white" class="container d-flex d-flex justify-content-center">
                  <h4>Ao clicar em denunciar você afirma que:</h4>
              </div>
              <div style="background-color:black;color:white" class="container d-flex d-flex justify-content-center">
                    <ol>
                      <li>Riscou nome e imagem do agressor</li>
                      <li>Sua denuncia não é falsa</li>
                      <li>Não citou o nome completo de nenhuma pessoa física</li>
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
          <button type="submit" class="btn btn-dark" style="float: right;">DENUNCIAR</button>
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
        <script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
            <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
            
</body>
</html>
