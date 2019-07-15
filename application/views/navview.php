<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" />
    <link rel="manifest" href="<?php echo base_url()?>assets/manifest/manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="theme-color" content="#3F51B5">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/icon1.png');?>" />
</head>
<body>
        <nav class="navbar navbar-expand-lg fixed-top  shadow mb-1" style="background-color:#3F51B5; color:white;">
                <a class="navbar-brand" href="#"><img width="60" height="60" src="<?php echo base_url('assets/img/icon1.png');?>"></a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?php echo base_url(''); ?>">Home<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Mapa</a>
                                </li>
                                <li class="nav-item"><a class="nav-link">Dados</a></li>
                                <li class="nav-item"><a class="nav-link">Estatisticas</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('denunciafisica') ?>">Denunciar</a></li>
                            </ul>
                </div>
              </nav>
</body>
</html>
