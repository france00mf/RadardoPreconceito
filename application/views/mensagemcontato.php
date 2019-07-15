<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/perf.css')?>"/>
    <link rel="shortcut icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/denunciafisica.css')?>"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Contato</title>
</head>
<body style="background-color:#990000">
<style>
    .responsive{
        width:65vw;

    }
    @media(max-width:768px){
        .responsive{
            width:100vw;
        }
        .display-5{
            font-size:5vw;
        }
    }
</style>
    <div class="container-fluid" style="background-color:#990000;">
        <span onclick="openmenu()" class="menuicon grey">&#9776;</span>
    </div>
    <div class="wrapper-perfil align-items-center justify-content-center">
            <?php $this->load->view('menu'); ?>
            <div id="conteudo">
                    
                    <div class="header container">
                        <h1 style="text-align: center;"> Mensagem de Contato</h1>
                        <hr>
                    </div>
                        <div class="container shadow rounded responsive cont">
                            <h5 class="display-5">Assunto: <?php echo $conteudo->assunto;?></h5>
                            <h5 class="mt-3 display-5">Nome do Remetente: <?php echo $conteudo->Nome?></h5>
                            <h5 class="mt-3 display-5">Telefone: <?php echo preg_replace('/(\d{2})(\d{5})(\d*)/', '($1) $2-$3', $conteudo->telefone)?></h5>
                            <h5 class="mt-3 display-5">Email do remetente:  <?php echo $conteudo->email_r;?></h5>
                            <h5 class="mt-3 display-5">Data de envio: <?php echo date('d/m/y',strtotime($conteudo->dia));?></h5>
                            <h5 class="mt-4 display-5">Mensagem:<p><h5 class="display-5"><?php echo nl2br($conteudo->mensagem);?></h5></p></h5>
                        </div>
        </div>
    </div>
<script>
const media = window.matchMedia('(min-width:768px)');
if(media.matches){
 window.addEventListener('load',()=>{
    const media = window.matchMedia("(max-width:768px)")
    if(media.matches){
    let menuvalue = document.getElementById('sidebar');
    let topvalue = document.getElementById('conteudo');
    topvalue.style.marginleft='15%';
    menuvalue.style.width = '100%';
    }
    else{
        let button = document.getElementById('close');
        let menuvalue = document.getElementById('sidebar');
        let topvalue = document.getElementById('conteudo');
        topvalue.style.marginleft='15%';
        menuvalue.style.width = '15%';
        button.style.display = 'none';
    }
 });
}
</script>
<script src="<?php echo base_url()?>assets/js/menu.js">
 
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>      
</body>
</html>