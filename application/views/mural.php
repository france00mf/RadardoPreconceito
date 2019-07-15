<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/mural.css')?>"/>
    
    <link rel="shortcut icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Mural</title>
</head>
<body>
    <?php $this->load->view('nav')?>
    <div class="container-fluid b1">
        <div class="b1">
            <br><br>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-11"><h4 class="menu"><strong><i>MURAL</i></strong></h4>
                    <br>
                    <p class="menu"><strong></strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex align-items-center mt-3 justify-content-center">
    <form action="<?php echo base_url($endereco)?>" method="POST">
    <div class="row">
      <div class="col-sm-2">
        <h5 style="color:black">Filtrar por Preconceito:</h5>
      </div>
    <div class="col-sm-2">
        <select class="ml-3 form-control" name="preconceito">
            <option value=""></option>
            <option value="Racismo">Racismo</option>
            <option value="Homofobia">Homofobia</option>
            <option value="Transfobia">Transfobia</option>
            <option value="Intolerância religiosa">Gordofobia</option>
            <option value="Gordofobia">Intolerancia religiosa</option>
            <option value="Sexismo">Sexismo</option>
            <option value="Xenofobia">Xenofobia</option>
            <option value="Classismo">Elitismo</option>
            <option value="LGBTfobia">Lgbtfobia</option>
            <option value="Preconceito contra deficientes">Preconceito contra deficientes</option>          
        </select>
    </div>
    <div class="col-sm-2">
        <h5 style="color:black">Filtrar por <?php echo $seletor ?>:</h5>
    </div>
    <div class="col-sm-2">
        <select class="ml-3 form-control" name="local">
           <option value=""></option>
           <?php foreach($locais as $key=> $valor){
             echo '<option value="'.$key.'">'.$valor.'</option>';
           }
            ?>

        </select>
    </div>
    <div class="col-sm-2">
    <button class="ml-3 btn btn-danger" type="submit">Filtrar</button>
    </div>
    </div>
  </form>
    </div>
    <div class="container-fluid b2">
    
    <?php 
    if(!$denuncias == false){
      foreach($denuncias as $row){
                 echo   '<div class="container den">
                            <h3><i class="fas fa-clock"></i>&nbsp;&nbsp;&nbsp;há '.$row->subdia.' dias</h3>
                            <p class="quebra">'.substr($row->descricao,0,110).'...</p>
                            
                            <a href="'.base_url($metodo.$row->id).'" class="cont"><i>continuar lendo</i></a>
                    </div>';
      }}
    else {
      echo '<div class="jumbotron text-center" style="background-color:black; color:white"><h2>Impossível Encontrar resultados</h2></div>';
    }
      ?>
    
    <div class="mt-5">
      <?php echo $pagination?>
    </div>
    <div class="container-fluid mt-3 w-100 text-center">
      <?php if(isset($voltar)){
          echo $voltar;
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
        <script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
            <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
            
</body>
</html>
