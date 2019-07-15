<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/perf.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/moderadores.css"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/pagination.css')?>"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Moderadores</title>
</head>
<body>
    <div class="wrapper-perfil">
            <?php $this->load->view('menu'); ?>
            <div id="conteudo">
                    <span onclick="openmenu()" class="menuicon grey">&#9776;</span>
                    <div class="header container">
                        <h1>Painel de Moderadores</h1>
                        <hr/>
                    </div>
                   <div class="container-fluid text-center margin">
                    <form action="<?php echo base_url('Adm/pmoderadores')?>" method="POST">
                      <div class="input-group formulario">
                      <input type="text" name="pesquisa" placeholder="Digite o nick do moderador" class="form-control">
                      <div class="input-group-btn ml-3">
                      <button type="submit" class="btn btn-success"><i class="fas fa-search" style="margin-right:1vw"></i>Pesquisar</button>
                      </div>
                      <div class="input-group mt-3">
                        <label for="#filtro">Filtrar Por:</label>
                        <select class="ml-3" id="filtro" name="filtro">
                          <option value="Nome">Nickname</option>
                          <option value="Sexo">Sexo</option>
                        </select>
                      </div>
                    </form>
                    <div class="table-responsive table-test mt-5">
                        <table class="table table-striped table-dark">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nickname</th>
                              <th>Perfil</th>
                              <th>Log</th>
                              <th>Ultima Vez Online</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php if($denuncias == false){
                                  echo '<tr><td colspan="5">Nenhum resultado encontrado</td></tr>';
                               }
                              else{
                                foreach($denuncias as $denuncia){
                                 echo '<tr>
                                <th scope="row">'.$denuncia->Id.'</th>
                                <td>'.$denuncia->Nome.'</td>
                                <td><a href='.base_url('Adm/modperfil/'.$denuncia->Id).'><div class="btn btn-primary">Perfil</div></td>
                                <td><a href='.base_url('Adm/Log/'.$denuncia->Id).'> <div class="btn btn-primary">Log</div></td>
                                <td>'.date('d/m/Y',strtotime($denuncia->Online)).'</td>
                              </tr>';}}
                              ?>
                          </tbody>
                        </table>
                        <?php if($denuncias !== false){  
                          echo $pagination;} ?>
                        <?php if(isset($retornar)){
                             echo '<a href="'.base_url('Adm/moderadores').'">'.$retornar.'</a>';
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
<script src="<?php echo base_url()?>assets/js/menu.js">
 
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>      
</body>
</html>