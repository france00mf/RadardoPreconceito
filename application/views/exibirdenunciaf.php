<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/denunciaf.css')?>"/>
    <link rel="shortcut icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <link rel="icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Perfil</title>
</head>
<body>
    <?php $this->load->view('nav');?>
    <div class="container b1">
        <div class="b1">
            <br><br>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-9"><strong><p>
                    "<?php echo nl2br($conteudo->descricao)?>"
                </p>
                </strong>
                </div>
                <div class="col-lg-2">
                  <h3 class="den"><i class="fas fa-clock"></i> &nbsp;&nbsp;há <?php echo $conteudo->subdia?> dias</h3>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <p><strong>Endereço: <?php echo $conteudo->endereco?></strong></p>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <p><strong>Data:</strong> <?php echo date('d/m/y',strtotime($conteudo->dia)) ?></p>
                    <br>
                </div>
                <div class="col-lg-5">
                    <p><strong>Hora:</strong> <?php echo $conteudo->horario?></p>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <p><strong>Idade:</strong> <?php echo $conteudo->idade?></p>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <p><strong>Agressão:</strong> <?php echo $conteudo->forma?></p>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <p><strong>Preconceito:</strong> <?php echo $conteudo->preconceito?></p>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <p><strong>Gênero:</strong> <?php echo $conteudo->genero?></p>
                    <br>
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
    
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO4dGu0GjhQi1FE0MVjJbBS6Eq_TNiimI&libraries=places&callback=initAutocomplete"
                async defer></script>
        <script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
            <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
            
</body>
</html>
