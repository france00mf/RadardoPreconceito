<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Mudança nos imports e no nav -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estatisticas.css')?>"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">    
    <link rel="icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script srt="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Estatísticas</title>
</head>
<body >
   <?php $this->load->view('nav');?>
    <!-- fecha -->
    <div class="container-fluid b1">
        <div class="b1">
            <br><br>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-11">
                <h3>Estatísticas sobre o preconceito no Brasil</h3>
                <p><i>segue informações sobre preconceito que podem ser utilizadas <br>livremente em qualquer veículo jornálistico ou educacional.</i></p>
                <hr class="jornal"> 
              </div>  
            </div>
              <br><br>
              <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-3">
                    <div class="ranking">
                      <h6 class="rank">
                          PRECONCEITOS MAIS 
                          COMUNS RELATADOS:
                      </h6>  
                      <h6>   
                          <br> 
                            <ol>
                                <?php if(!$rankingpreconceito == false){
                                    $counter = 0;
                                    foreach($rankingpreconceito as $row){
                                        if($counter == 5){
                                            break;
                                        }
                                        echo '<li>'.$row->preconceito.'['.$row->quant.']</li>';
                                        $counter+=1;
                                    }
                                }else{
                                    echo "Sem dados suficientes";
                                }
                                ?>
                            </ol>
                      </h6>
                    <div class="g1">
                      <canvas id="preconceito" width="20" height="20"></canvas>
                    </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                      <div class="ranking">
                          <h6 class="rank">
                              GÊNEROS MAIS AFETADOS:
                          </h6> 
                            <h6>
                              <br>    
                            <ol>
                            <?php if(!$rankinggenero == false){
                                    $counter=0;
                                    foreach($rankinggenero as $row){
                                        if($counter == 5){
                                            break;
                                        }
                                        echo '<li>'.$row->genero.'['.$row->quant.']</li>';
                                        $counter+=1;
                                    }
                                }else{
                                    echo "Sem dados suficientes";
                                }
                                ?>
                            </ol>
                          </h6>
                          <div class="g2">
                            <canvas id="genero"></canvas>
                        </div>
                        </div>
                  </div>  
                  <div class="col-lg-3">
                      <div class="rankingF">
                          <h6 class="rank">
                              REDES SOCIAIS EM QUE MAIS CASOS DE PRECONCEITO FORAM REGISTRADOS:
                          </h6>  
                          <h6>    
                              <br>
                              <ol>
                                <?php if(!$rankingsocialmedia == false){
                                    $counter=0;
                                    foreach($rankingsocialmedia as $row){
                                        if($counter == 5){
                                            break;
                                        }
                                        echo '<li>'.$row->lugar.'['.$row->quant.']</li>';
                                        $counter+=1;
                                    }    
                                }?>
                              </ol>
                          </h6>
                          <div class="g3">
                                <canvas id="redes"></canvas>
                            </div>
                      </div>
                  </div> 
              </div>
              <div class="row">
                <div class="col-lg-1">

                </div>
                <div class="col-lg-1">
                    <br>
                    <br>
                    <hr class="jornal1">
                    <hr class="jornal1">
                </div>
              </div>
              <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-3">
                    <div class="ranking1">
                      <h6 class="rank">
                          ESTADOS MAIS RELATADOS:
                      </h6>
                      <h6>    
                            <ol>
                            <?php if(!$rankingestado == false){
                                    $counter=0;
                                    foreach($rankingestado as $row){
                                        if($counter == 5){
                                            break;
                                        }
                                        echo '<li>'.$row->estado.'['.$row->quant.']</li>';
                                        $counter+=1;
                                    }    
                                }?>
                            </ol>
                      </h6>
                      <div class=" g4">
                        <canvas id="estado"></canvas>
                    </div>
                    </div>
                </div>
                  <div class="col-lg-3">
                      <div class="ranking1F">
                          <h6 class="rank ff">
                              TIPOS DE AGRESSÕES MAIS RELATADOS:
                              
                          </h6>
                          <h6>    
                        <ol>
                        <?php if(!$rankingagressao == false){
                                    $counter=0;
                                    foreach($rankingagressao as $row){
                                        if($counter == 5){
                                            break;
                                        }
                                        echo '<li>'.$row->forma.'['.$row->quant.']</li>';
                                        $counter+=1;
                                    }    
                                }?>
                        </ol>
                          </h6>
                          <div class="g5">
                            <canvas id="agressoes"></canvas>
                        </div>
                    </div>
                  </div> 
              </div>
              <div class="row">
                  <div class="col-lg-1">
                  </div>
                  <div class="col-lg-11">
                    <br>
                    <br>
                    <br>
                    <p class="id" style="margin-top:15vw">Idade média das vítimas: <?php if(isset($idade)){echo $idade;} ?> anos </p>
                    <br><br>
                    
                    <p class="fim">[quantidade de vezes com determinada característica]<br>
                        <i>fonte: dados coletados da própria plataforma.</i></p>
                  </div>
                </div> 
               </div>
               
        </div>   
    <div class="container-fluid footer">
        <div class="container-fluid d-flex  justify-content-center align-items-center foot">
            <h5 id="footerH">RADAR DO PRECONCEITO | POR UMA SOCIEDADE MAIS JUSTA</h5>
        </div>
        <div class="container-fluid d-flex justify-content-center align-items-center baixo">
            <h5 id="footerH">Desenvolvida Por:<a href="http://enkisolucoes.com.br/" target="_blank"> Enki Soluções</a></h5>
        </div>
        </div>
        <script>
            let preconceitos = new Array();
            let preconceito = document.getElementById('preconceito');
            let dados = new Array();
            let colors = ['#330000','#660000','#990000','#993333','#cc0033','#cc6666','#ff0033','#ff3333','#ff6666'];
            <?php
            if(!$rankingpreconceito == false){
                foreach($rankingpreconceito as $row){
                    echo 'preconceitos.push("'.$row->preconceito.'");';
                }
            }
            ?>

            <?php
                if(!$rankingpreconceito == false){
                    foreach($rankingpreconceito as $row){
                        echo 'dados.push("'.$row->quant.'");';
                }
            }
            ?>
            data = {
                datasets: [{
                    data:dados,
                    backgroundColor: colors,
                }],
                labels:preconceitos,
                
                

        };
        const PieChartprejudice = new Chart(preconceito,{
         type: 'pie',
        data: data,
        });
        </script>
        <script>
            let generos = new Array();
            let genderdata = new Array();
            let gendercolors = ['#330000','#660000','#990000','#993333','#cc0033','#cc6666','#ff0033','#ff3333','#ff6666'];
            const genero = document.getElementById('genero');
            <?php if(!$rankinggenero == false){
                foreach($rankinggenero as $row){
                    echo 'genderdata.push("'.$row->quant.'");';
                    echo 'generos.push("'.$row->genero.'");';
                }
            }
            ?>
            genderdata = {
                datasets: [{
                    data:genderdata,
                    backgroundColor: gendercolors,
                }],
                labels:generos,
            };
              const PieChartgender = new Chart(genero,{
                    type: 'pie',
                    data: genderdata,
            });
        </script>
        <script>
            let redes = new Array();
            let socialdata = new Array();
            let socialcolors =  ['#330000','#660000','#990000','#993333','#cc0033','#cc6666','#ff0033','#ff3333','#ff6666'];
            const socialmedia = document.getElementById('redes');
            <?php if(!$rankingsocialmedia == false){
                foreach($rankingsocialmedia as $row){
                    echo 'socialdata.push("'.$row->quant.'");';
                    echo 'redes.push("'.$row->lugar.'");';
                }
            }?>
            mediadata = {
                datasets: [{
                    data:socialdata,
                    backgroundColor:socialcolors,

                }],
                labels:redes,
            };
            const Piechartsocialmedia = new Chart(socialmedia,{
                type:'pie',
                data:mediadata,
            });
        </script>
        <script>
            let estados = new Array();
            let statedata = new Array();
            const estado = document.getElementById('estado');
            <?php if(!$rankingestado == false){
                foreach($rankingestado as $row){
                    echo 'statedata.push("'.$row->quant.'");';
                    echo 'estados.push("'.$row->estado.'");';
                }
            }
            ?>
            sdata = {
                datasets: [{
                    data:statedata,
                    backgroundColor: gendercolors,
                }],
                labels:estados,
            };
              const PieChartestado = new Chart(estado,{
                    type: 'pie',
                    data: sdata,
            });
        </script>
        <script>
            let labelagressao = new Array();
            let agressiondata = new Array();
            const agressao = document.getElementById('agressoes');
            <?php if(!$rankingagressao == false){
                foreach($rankingagressao as $row){
                    echo 'labelagressao.push("'.$row->forma.'");';
                    echo 'agressiondata.push("'.$row->quant.'");';
                }
            }?>
            agdata = {
                datasets: [{
                    data:agressiondata,
                    backgroundColor: gendercolors,
                }],
                labels:agressao,
            };
              const PieChartagressao = new Chart(agressao,{
                    type: 'pie',
                    data: agdata,
            });
        </script>
        <script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>  
</body>
</html>
