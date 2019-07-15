<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
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
    <title><?php echo $title ?></title>
</head>
<body>
   
    <div class="wrapper-perfil">
            <?php $this->load->view('menu'); ?>
            <div id="conteudo">
                    <span onclick="openmenu()" class="menuicon grey">&#9776;</span>
                    <div class="header container">
                        <h1><?php echo $header ?></h1>
                        <hr/>
                    </div>
                   <div class="container-fluid text-center margin">
                    <form action="<?php echo base_url($caminhopesquisa)?>" method="POST">
                      <div class="input-group formulario">
                      <input type="text" name="pesquisa"  class="form-control">
                      <div class="input-group-btn ml-3">
                      <button type="submit" class="btn btn-success"><i class="fas fa-search" style="margin-right:1vw"></i>Pesquisar</button>
                      </div>
                      <div class="input-group mt-3">
                        <label for="#filtro">Filtrar Por:</label>
                        <select class="form-control ml-3" id="filtro" name="filtro">
                          <option value="nome">Nome</option>
                          <option value="Email">Email</option>
                          <option value="Sexo">Genero</option>
                          <option value="online">Ultima Vez Online</option>
                        </select>
                      </div>
                    </form>
                    <div class="table-responsive table-test mt-5">
                        <table class="table table-striped table-dark">
                          <thead>
                            <tr>
                              <th>Nome</th>
                              <th>Perfil</th>
                              <th>Nascimento</th>
                              <th>Gênero</th>
                              <th>Ultima Vez Online</th>
                              <th>Excluir</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if($profissionais == false){
                                  echo '<tr><td colspan="7">Nenhum resultado encontrado</td></tr>';
                               }
                              else{
                                foreach($profissionais as $profissional){
                                 echo '<tr>
                                      <td>'.$profissional->Nome.'</td>
                                      <td> <a href="'.base_url('Adm/userperfil/'.$profissional->Id).'"><button class="btn btn-primary">Perfil</button></a> </td>
                                      <td>'.date('d/m/Y',strtotime($profissional->Nascimento)).'</td>
                                      <td>'.$profissional->Sexo.'</td>
                                      <td>'.date('d/m/Y',strtotime($profissional->ultima_vez)).'</td>
                                      <td><button type="button" value="'.base_url('Adm/excluirtrab/'.$delvalor.'/'.$profissional->Id).'" onclick="question(this.value)" id="button" class="btn btn-danger">X</button></td>
                                </tr>';}}
                              
                             ?>
                          </tbody>
                        </table>
                        <?php if($profissionais !== false){  
                          echo $pagination;} ?>
                           <?php if(isset($retornar)){
                             echo '<a href="'.base_url($caminhoRetorno).'">'.$retornar.'</a>';
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
<script>
      button = document.getElementById('button');
      question = (url) =>{
               Swal({
                    title: 'Você tem certeza que deseja deletar um usuario ?',
                    text: "O usuario nunca mais voltará",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, Deletar usuario !'
                  }).then((result) => {
                    if (result.value) {
                      window.location = url  ; 
                    }
                  });
      }
</script>
<script src="<?php echo base_url()?>assets/js/menu.js">
 
</script>
 <?php if($this->session->tempdata('pdel')){
      echo '<script>'.$this->session->tempdata('pdel').'</script>';
      $this->session->unset_tempdata('pdel');
    }?>
    <?php if($this->session->tempdata('fail')){
       echo '<script>'.$this->session->tempdata('fail').'</script>';
       $this->session->unset_tempdata('fail');
    }?>
    <?php if($this->session->tempdata('adel')){
      echo '<script>'.$this->session->tempdata('adel').'</script>';
      $this->session->unset_tempdata('adel');
    }?>
   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>      
</body>
</html>