<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estilo.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perf.css"/>
    <link rel="shortcut icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <link rel="icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>

        <?php $this->load->view('menu'); ?>
        <div id="conteudo">
        <span onclick="openmenu()" class="menuicon grey">&#9776;</span>
        <div class="row">
        <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <br><br>
                    <h5 style="text-align: center; color: white; font-size:30px;" class="mx-auto"><i class="fas fa-exclamation-circle"></i> AÇÕES</h5>
                        <hr/>
            </div>    
        <div>
            </div>
        </div>
        <div class="row">
             <div class="col-lg-3"></div>
             <div class="col-lg-6">
                   <div class="container-fluid text-center margin">
                    <div class="table-responsive table-test mt-5">
                        <table class="table table-striped table-dark">
                          <thead>
                            <tr>
                                <th>Ação</th>
                                <th>Data</th>
                                
                            </tr>
                            <?php if($logs == false){
                                  echo '<tr><td colspan="2">Nenhum resultado encontrado</td></tr>';
                               }
                              else{
                                foreach($logs as $log){
                                 echo '<tr>
                                      <td>'.$log->Mensagem.'</td>
                                      <td>'.date('d/m/Y',strtotime($log->Data)).'</td>
                                      
                                </tr>';}}
                              
                             ?>
                             <?php if($logs !== false){  
                          echo $pagination;} ?>
                          </thead>
                        </table>
                        </div>
                </div>
            </div> 
        </div>
        </div>    
                
    <div class="container-fluid foot">
        <h5 id="footerH" class="mt-4">RADAR DO PRECONCEITO | POR UMA SOCIEDADE MAIS JUSTA</h5>  
    </div>
    <div class="container-fluid bg-dark baixo">
        <h5 id="footerH" class="mt-4" style="color: white;">© 2018 Copyright:<a href="http://enkisolucoes.com.br/" target="_blank"> Enki Soluções</a></h5>  
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
</body>
</html>