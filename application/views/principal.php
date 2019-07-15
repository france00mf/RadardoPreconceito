<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estiloprincipal.css')?>"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>
    <?php $this->load->view('nav');?>
    <header>
            <div class="overlay"></div>
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="<?php echo base_url('assets/img/people.mp4')?>" type="video/mp4">
            </video>
            <div class="container h-100">
                    <div class="d-flex h-100 text-center align-items-center">
                      <div class="w-100 text-white">
                            <img src="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" class="icone">
                      </div>
                    </div>
                  </div>
          </header>
    <div class="container-fluid b2">
        <br><br>
        <div class="row pt-4">
            <div class="col-lg-1"></div>
            
            <div class="col-lg-10">
                
                <p><strong><h2 style="font-family: 'Teko', sans-serif;">O que é o radar do preconceito ?</h2> </strong><br>
                <h6 style="font-size:25px;font-family: 'Abel', sans-serif;">O Radar do preconceito é uma plataforma web que busca expor as constantes ocorrências de preconceito e intolerância na sociedade brasileira, que por muitos são tidas como casos isolados e não frequentes, como realmente acontece. Apesar de não ter como objetivo a resolução geral do problema, a meta é amenizar tais acontecimentos absurdos, informando às pessoas e aos governos a realidade vivenciada pelas minorias no Brasil.</h6>  
            </p>
            <p><strong><h2 style="font-family: 'Teko', sans-serif;">Como posso ajudar ?</h2></strong><br>
            <h6 style="font-size:25px;font-family: 'Abel', sans-serif;">Aos poucos estamos desenvolvendo o sistema, no momento as formas são:<br><br>
                <ul class="ml-3">
                <li>Divulgando o projeto.</li>
                <li>Caso seja um profissional do ramo de direito ou psicologia cadastrando-se como voluntário.</li>
                <li>Em breve abriremos um crowdfounding para financiar o projeto financeiramente</li></h6>
                
            </ul>
            </p>
            </div>
        </div>
    </div>
    <div class="container-fluid b3">
        <br><br><br>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-11">
                <h4 class="pt-5">
                    <i>
                    <span id="typewriter"></span>
                    </i>    
                </h4>
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex align-items-center justify-content-center text-center h-100 b4">
        <div class="row mt-5">
            <div class="col-lg-3 pl-lg-5 mt-5">
                <img class="img-4" src="<?php echo base_url('assets/img/racismo.jpg')?>">
                <h5 class="mt-2">RACISMO</h5>

            </div>

            <div class="col-lg-3 pl-lg-5 mt-5">
                <img class="img-4" src="<?php echo base_url('assets/img/lgbt.jpg')?>">
                <h5 class="mt-2">LGBTFOBIA</h5>
            </div>
            <div class="col-lg-3 pl-lg-5 mt-5">
                <img class="img-4" src="<?php echo base_url('assets/img/xenofobia.jpg')?>">
                <h5 class="mt-2">XENOFOBIA</h5>
            </div>
            <div class="col-lg-3 pl-lg-5 mt-5">
                <img class="img-4" src="<?php echo base_url('assets/img/girls.jpg')?>">
                <h5 class="mt-2">SEXISMO</h5>
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
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
<script>
     const options = {
        strings: ['Sua cooperação é importante','Ela pode ajudar a combater o preconceito no Brasil','DENUNCIE'],
        typeSpeed: 30,
        startDelay: 1000,
        loop: true
    }
    let escrito = new Typed('#typewriter',options);
    
</script>
 </body>
</html>