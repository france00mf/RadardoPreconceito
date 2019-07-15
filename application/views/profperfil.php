<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/profperfil.css')?>"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Perfil</title>
</head>
<body>
    <?php $this->load->view('nav');?>
    <div class="container-fluid b1">
        <div class="b1">
            <br><br>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-7">
                  <h4 class="menu"><strong><i><?php echo $info->Nome?></i></strong></h4>
                  <p class="menu"><?php echo $info->Profissao?></p>
                </div>
                <div class="col-lg-4">
                  <img src="<?php echo base_url($info->Imagem)?>" class="imgUser img-responsive"> 
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid b2">
      <div class="container view">
        <div class="row">  
            <div class="col-lg-12"> 
              <br>
              <h6>Perfil de <?php echo $info->Nome?>: </h6>  
              <hr>
            </div>  
            
        </div>
        <br><br>
        <div class="row">
            <br>  
            <div class="col-lg-1"></div>
            <div class="col-lg-5 divEsq">
                <p><i class="fas fa-envelope"></i> <strong>Email:</strong> <?php echo $info->Email?></p> 
            </div>  
            <div class="col-lg-1"></div>
        </div>
        <div class="row">
            <br>  
            <div class="col-lg-1"></div>
            <div class="col-lg-5 divEsq">
                <p><i class="fas fa-genderless"></i>&nbsp;<strong>Gênero:</strong><?php echo $info->Sexo?></p> 
            </div> 
            <div class="col-lg-6"> 
                <p><i class="fas fa-calendar"></i> <strong>Data de nascimento:</strong><?php echo date('d/m/Y',strtotime($info->Nascimento));?></p> 

            </div>  
            <div class="col-lg-1"></div>
        </div>
        <div class="row">
            <br>  
            <div class="col-lg-1"></div>
            <div class="col-lg-5 divEsq">
                <p><i class="fas fa-phone"></i>&nbsp;<strong>Tefelone:</strong><?php echo preg_replace('/(\d{2})(\d{5})(\d*)/', '($1) $2-$3', $info->Telefone)?></p>  
            </div>
            <div class="col-lg-6">
                <p><i class="fas fa-map-marker-alt"></i>  <strong>Endereço:</strong></p>
                <div class="col-lg-9">
                <iframe src="<?php echo 'http://maps.google.com/maps?q='.$info->Lat.','.$info->Lng.'&z=15&output=embed';?>" frameborder="0" style="border:0"></iframe>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10">
            <br>
            <p><i class="fas fa-font"></i><strong>  Sobre mim:</strong></p>
              <p style="font-size:25px; margin-left:10px;"><?php echo nl2br($info->Sobre)?></p>
          </div>
        </div>
        </div> 
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
              <br><br>
                <button data-toggle="modal" data-target="#modal4" class="btn btn-danger mr-3 mb-3">REPORT <i class="fas fa-exclamation-triangle"></i></button>
                <a href="#"  style="display:none" class="btn btn-dark mb-3">ENVIAR MENSAGEM <i class="fas fa-location-arrow"></i></a>
            </div>
          </div>
      </div>     
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
<!-- Button trigger modal -->
<?php if($this->session->tempdata('sucesso')){
  echo '<script>'.$this->session->tempdata('sucesso').'</script>';
  $this->session->unset_tempdata('sucesso');
}?>
<!-- Modal -->
<div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Report:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url('Profissionais/report/'.$info->Id)?>" method="POST">
                <div class="form-group mt-3">
                    <label for="#email">Digite seu email:</label>
                    <input id="email" type="text" class="form-control in" name="email" placeholder="Ex zezinho@gmail.com">
                </div>
                <div class="form-group mt-5">
                    <label for="#mensagem">Digite sua mensagem:</label>
                    <textarea rows="6" type="text" id="mensagem" class="form-control in" name="mensagem" placeholder="Ex:  Ao chegar no consultório o advogado foi completamente desrespeitoso comigo. Disse que cobraria pelo serviço e quase me bateu"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark">Enviar Denuncia</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
            <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
</body>
</html>            