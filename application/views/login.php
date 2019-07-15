<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login2.css')?>"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">    
    <link rel="icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <?php $this->load->view('nav');?>
    <div class="container-fluid rounded b2">
    <header class="container-fluid text-center rounded header">
            <h6  style="color:white"><strong>LOGIN</strong></h6>
        </header>
        <?php if($this->session->flashdata('fracasso')){
          echo '<div class="alert alert-danger">'.$this->session->flashdata('fracasso').'</div>';
        }
        ?>
        <form action="<?php echo base_url('Profissionais/login')?>" method="POST">
                <br>
                <div class="form-group">
                        <label for="inputemail">EMAIL: </label>
                          <input type="text" value="<?php echo set_value('inputlogin')?>" name="email" class="form-control in" id="inputemail">
                      </div>
                <div class="form-group">
                        <label for="inputsenha">SENHA: </label>
                        <input type="password" value="<?php echo set_value('inputpass')?>" name="senha" class="form-control in" id="inputsenha">
                </div>
                <div class='form-group'>
                  <a data-toggle="modal" data-target="#modelId3" href="#">Esqueci minha senha</a>
                  
                </div>
                <div class="form-group">
                  <a href="<?php echo base_url('Profissionais/cadastro')?>">Desejo me cadastrar</a>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group captcha">
                        <div class="g-recaptcha"  data-sitekey="6Lef3noUAAAAAHWMRrgzg13cAA1BEyuFWoz0oT09"></div>
                        <script src='https://www.google.com/recaptcha/api.js'></script>
                    </div>
                  </div>  
                </div>        
                    <button type="submit" class="btn btn-dark" style="float: right; margin-right: 3%;">ENTRAR</button>
                </div>      
                </form>
    </div>
        </form>      
    </div> 
    <div class="container-fluid footer">  
    <div class="container-fluid d-flex  justify-content-center align-items-center foot">
        <h5 id="footerH">RADAR DO PRECONCEITO | POR UMA SOCIEDADE MAIS JUSTA</h5>  
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center baixo">
        <h5 id="footerH">Desenvolvido Por:<a href="http://enkisolucoes.com.br/" target="_blank"> Enki Soluções</a></h5>  
    </div>
</div>
<div class="modal fade" id="modelId3" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Digite seu login:</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('Profissionais/recuperarsenha')?>" method="POST">
              <div class="form-group">
                  <input type="text" placeholder="Ex: joãozinho@gmail.com" name="email" value="<?php $this->form_validation->set_value('Email')?>" class="form-control in">
              </div>
              <div class="form-group">
                <button class="btn btn-dark">Recuperar Senha</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
<script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"> </script>
<?php if($this->session->tempdata('senhaenviada')){
  echo '<script>'.$this->session->tempdata('senhaenviada').'</script>';
  $this->session->unset_tempdata('senhaenviada');
}?>
<?php if($this->session->tempdata('loginerro')){
  echo '<script>'.$this->session->tempdata('loginerro').'</script>';
  $this->session->unset_tempdata('loginerro');
}?>
<?php if($this->session->tempdata('captchaerror')){
  echo '<script>'.$this->session->tempdata('captchaerror').'</script>';
  $this->session->unset_tempdata('captchaerror');
}?>
<?php if($this->session->tempdata('invalido')){
  echo '<script>'.$this->session->tempdata('invalido').'</script>';
  $this->session->unset_tempdata('invalido');
}?>
<?php if($this->session->tempdata('sucesso')){
  echo '<script>'.$this->session->tempdata('sucesso').'</script>';
  $this->session->unset_tempdata('sucesso');
}?>
<?php if($this->session->tempdata('problema')){
  echo '<script>'.$this->session->tempdata('problema').'</script>';
  $this->session->unset_tempdata('problema');
}?>
<script src='https://www.google.com/recaptcha/api.js'></script>

            
</body>
</html>
