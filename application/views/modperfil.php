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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estilo.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perfil.css"/>
    <link rel="shortcut icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <link rel="icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body style="background-color:#990000">
    <?php $this->load->view('menu'); ?>
    <div id="conteudo">
        <span onclick="openmenu()" class="menuicon grey">&#9776;</span>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-3">
                <div class="container">
                <div class="circle" style="margin-top: 20px;">
                    <img src="<?php echo $conteudo->Foto?>" class="rounded-circle">
                </div>
                </div>    
            </div>
                <div class="col-lg-1"></div>
            <div class="col-lg-4">
                <div class="container dados" style="background-color: white; margin-top:20px">
                    <br>
                    <p style="float: right;"><i>Visto por último em: <?php echo date('d/m/Y',strtotime($conteudo->Online))?></i></p>
                    <p><strong>Nome:</strong> <?php echo $conteudo->Nome;?></p>
                        
                    <p><strong>Telefone: </strong><span id="telefone"><?php echo preg_replace('/(\d{2})(\d{5})(\d*)/', '($1) $2-$3', $conteudo->Telefone)?></span></p>
                    <p><strong>Data de nascimento: </strong><?php echo date('d/m/Y',strtotime($conteudo->Nascimento));?></p>
                    <p><strong>Gênero:</strong><?php echo $conteudo->Sexo;?></p>
                    <p><strong>Descrição:</strong><?php echo nl2br($conteudo->Descricao); ?></p>
                    </div></div>    
            </div>
            <div class="col-lg-1"></div>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <br>
                    
                </div>
            </div>
        
        <!-- Footer -->
    <!-- Footer -->
    <div class="container-fluid foot">
        <h5 id="footerH" class="pt-4">RADAR DO PRECONCEITO | POR UMA SOCIEDADE MAIS JUSTA</h5>  
    </div>
    <div class="container-fluid bg-dark baixo">
        <h5 id="footerH" class="mt-4" style="color:white;">© 2018 Copyright:<a href="http://enkisolucoes.com.br/" target="_blank"> Enki Soluções</a></h5>  
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
<script src="<?php echo base_url('assets/js/menu.js')?>"></script>
</body>
</html>