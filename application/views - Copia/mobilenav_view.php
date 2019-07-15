<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<nav class="navbar shadow fixed-bottom navbar-expand-lg navbar-dark ade1 back align-middle ">
                    <div class="container-fluid">
                     <div class="row">
                       <div class="col-sm-2">
                         <div class="row text-center">
                           <img src="<?php echo base_url('views/img/home.png');?>" id="home" class="imagens">
                         </div>
                         <div class="row text-center">
                           <label for="help" class="labelcolor">Home</label>
                         </div>
               
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-sm-2">
                         <div class="row">
                           <img src="<?php echo base_url('views/img/ajuda.png');?>" id="help" class="imagens">
                         </div>
                         <div class="row">
                           <label for="help" class="labelcolor">Ajuda</label>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-sm-2">
                         <div class="row">
                           <img src="img/graficos.png" id="graficos" class="imagens">
                         </div>
                         <div class="row">
                           <label for="graficos" class="labelcolor">Estatísticas</label>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-sm-2">
                         <div class="row">
                           <img src="img/denuncia.png" id="denuncia" class="imagens">
                         </div>
                         <div class="row">
                             <label for="denuncia" class="labelcolor">Denuncia</label>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-sm-2">
                         <div class="row">
                           <img src="img/globo.png" id="globo" class="imagens">
                         </div>
                         <div class="row">
                           <label for="globo" id="globolabel" class="labelcolor">Mapa</label>
                         </div>
                       </div>
                     </div>
                   </div>
                   </nav>
               
       
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>