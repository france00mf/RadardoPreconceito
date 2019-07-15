<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/contato.css')?>"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Contato</title>
</head>
<body>
    <?php $this->load->view('nav');?>
    <div class="container-fluid b1">
        <div class="b1">
            <br><br>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-11"><h4 class="menu"><strong><i>CONTATO</i></strong></h4>
                    <br>
                    <p class="menu"><strong></strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="width:100%;">
    <?php if($this->session->flashdata('fracasso')){
                echo "<div class='alert alert-danger mt-3'>".$this->session->flashdata('fracasso')."</div>" ;
            } ?>
    </div>
    
    <div class="container-fluid d-flex align-items-center justify-content-center  b2">
        
        <form action="<?php echo base_url('Principal/contato')?>" method="POST">
            <br><br>
            <div class="form-group">
            <label for="nome">NOME:</label>
            <input type="text" value="<?php echo set_value('nome')?>" id="nome" class="form-control in" size="100" name="nome" placeholder="ex: Rogério Santos">
          </div>
          <div class="form-group">
            <label for="assunto">ASSUNTO:</label>
            <input type="text" id="assunto" value="<?php echo set_value('assunto')?>" class="form-control in" size="100" name="assunto" placeholder="ex: Problema técnico no mapa">
          </div>
          <div class="form-group">
            <label for="telefone">TELEFONE:</label>
            <input type="tel" value="<?php echo set_value('telefone') ?>" id="telefone" class="form-control in" name="telefone" placeholder="ex: (21) 99999-9999">
          </div>
          <div class="form-group">
            <label for="email">EMAIL:</label>
            <input type="email" id="email" value="<?php echo set_value('email')?>" class="form-control in" name="email" placeholder="ex: paulo@gmail.com">
          </div>
          <div class="form-group">
            <label for="motivo">MOTIVO DO CONTATO:</label>
            <select onchange="hideArea(this.value)" name="motivo" class="form-control in">
                <option value="outro">Outro</option>
                <option value="bug">Bug</option>
            </select>
          </div>
          <div id="formarea" style="display:none" class="form-group">
            <label for="area">Area:</label>
            <select id="area" name="area" class="form-control in">
                <option value="Mapa">Mapa</option>
                <option value="Estatísticas">Estatísticas</option>
                <option value="Perfil">Perfil do Profissional</option>
                <option value="Area de Login">Area de Login do Profissional</option> 
            </select>
          </div>
          <div class="form-group">
            <label for="mensagem">MENSAGEM: </label>
            <textarea class="form-control in" value="<?php echo set_value('mensagem')?>" name="mensagem" rows="12" placeholder="O mapa de calor não está funcionando da maneira esperada."></textarea>
          </div>
          <div class="form-group">
          <div class="g-recaptcha"  data-sitekey="6Lef3noUAAAAAHWMRrgzg13cAA1BEyuFWoz0oT09"></div>
          </div>
          <button type="submit" class="btn btn-dark" style="float: right;" >ENVIAR</button>
        </form>    
    </div>    
    <div class="container-fluid footer">  
    <div class="container-fluid d-flex  justify-content-center align-items-center foot">
        <h5 id="footerH">RADAR DO PRECONCEITO | POR UMA SOCIEDADE MAIS JUSTA</h5>  
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center baixo">
        <h5 id="footerH">Desenvolvido Por:<a href="http://enkisolucoes.com.br/" target="_blank"> Enki Soluções</a></h5>  
    </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    let formarea = document.getElementById('formarea');
    let area = document.getElementById('area');
    function hideArea(valor){
        if(valor == 'bug'){
            formarea.style.display = 'inline';
            area.style.display = 'inline';
           
        }
        else{
            formarea.style.display = 'none';
            area.style.display = 'none';
        }
    }
</script>
<?php if($this->session->tempdata('captchaerror')){
    echo '<script>'.$this->session->tempdata('captchaerror').'</script>';
    $this->session->unset_tempdata('captchaerror');

}?>
<script>
    $(document).ready(function(){
        $('#telefone').mask('(00) 00000-0000');
    });
</script>
<?php if($this->session->tempdata('sucesso')){
    echo '<script>'.$this->session->tempdata('sucesso').'</script>';
    $this->session->unset_tempdata('sucesso');
}?>
</body>
</html>