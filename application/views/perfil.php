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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/perfil2.css')?>"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Perfil</title>
</head>
<body>
    <div class="wrapper">
        <?php $this->load->view('menu')?>
            <div id="conteudo">
                    <span onclick="openmenu()" class="menuicon grey">&#9776;</span>
                        <div class="header container">
                        <h1>VISÃO GERAL</h1>
                        <hr>
                    </div>
                   <div class="row" >
                     <div class="col-lg-3"></div>  
                      <div class="col-lg-2">
                          <div class="card">
                           <div class="card-body">
                             <h5 class="card-title">Denúncias feitas:</h5>
                             <p class="card-text"><?php echo $denf;?></p>
                           </div>
                         </div>
                       </div>
                       <div class="col-lg-2">
                        <div class="card">
                           <div class="card-body">
                             <h5 class="card-title">Denúncias feitas hoje:</h5>
                             <p class="card-text"><?php echo $tdy;?></p>
                           </div>
                           </div>
                       </div>
                       <div class="col-lg-2">
                       <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Denúncias físicas: </h5>
                            <p class="card-text"><?php echo $denr; ?></p>
                          </div>
                        </div>
                       </div>
                       <div class="col-lg-2">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Denúncias virtuais: </h5>
                            <p class="card-text"><?php echo $denvr; ?></p>
                          </div>
                        </div>
                       </div>
                     </div>
                <br>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-2">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Moderadores:</h5>
                            <p class="card-text"><?php echo $modr;?></p>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Psicólogos:</h5>
                            <p class="card-text"><?php echo $psicor;?></p>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                         <div class="card-body">
                           <h5 class="card-title">Advogados:</h5>
                           <p class="card-text"><?php echo $adr;?></p>
                         </div>
                       </div>
                    </div>
                </div>
                <hr>
                    <h5 style="font-size: 27px; color: white; text-align: center">Notificações</h5>
                    <br>
                    <div class="row">
                    <div class="col-lg-3"></div>
                        <div class="col-lg-3">
                           <?php if($this->session->flashdata('mensagem')){
                               echo  '<div class="alert alert-primary"><i class="fas fa-comments"  style="margin-right:1vw"></i>Você tem '.$this->session->flashdata('mensagem').' mensagens novas de contato</div>';
                           }?>
                        </div>
                        <div class="col-lg-3">
                        <?php if($this->session->flashdata('bugreport')){
                               echo  ' <div class="alert alert-danger"><i class="fas fa-bug"  style="margin-right:1vw"></i>Você tem '.$this->session->flashdata('bugreport').' report de bug</div>';
                           }?>
                        </div>
                        <div class="col-lg-3">
                        <?php if($this->session->flashdata('falsariomensagem')){
                               echo  ' <div class="alert alert-danger"><i class="fas fa-exclamation-triangle" style="margin-right:1vw"></i>Você tem '.$this->session->flashdata('falsariomensagem').' report de falsário</div>';
                           }?>
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
<?php if($this->session->tempdata('Sucesso')){
  echo "<script>".$this->session->tempdata('Sucesso')."</script>";
  $this->session->unset_tempdata('Sucesso');
}?>
<script src="<?php echo base_url('assets/js/menu.js')?>">
 
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>      
</body>
</html>