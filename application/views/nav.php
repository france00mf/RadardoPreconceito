<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
  .dropdown-item{
    color:white;
  }
  .dropdown-item:hover{
    color:black;
  }
  .pergunta{
    color:black;
    font-size:2vw;
  }
  @media(max-width:768px){
    .pergunta{
        font-size:5vw;
    }
  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
      
      <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse" id="navbarNav">
        <br>
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link text-white"   href="<?php echo base_url()?>">INÍCIO <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white"   href="<?php echo base_url('Principal/mapa')?>">MAPA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white"  href="<?php echo base_url('Principal/estatisticas')?>">ESTATÍSTICAS</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" >PROFISSIONAIS</a>
            <div class="dropdown-menu" style="background-color:black; color:white" aria-labelledby="navbarDropdown">
          <a class="dropdown-item"  href="<?php echo base_url('Profissionais/login')?>">LOGAR</a>
          <a class="dropdown-item"  href="<?php echo base_url('Principal/listarprofissionais')?>">LISTA DE PROFISSIONAIS</a>
        </div>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">MURAL</a>
            <div class="dropdown-menu" style="background-color:black; color:white" aria-labelledby="navbarDropdown2">
            <a class="dropdown-item"  href="<?php echo base_url('Principal/muralvirtual')?>">MURAL DE DENUNCIAS VIRTUAIS</a>
            <a class="dropdown-item"  href="<?php echo base_url('Principal/mural')?>">MURAL DE DENUNCIAS FÍSICAS</a>
        </div>
          </li>
          </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo base_url('Principal/contato')?>">CONTATO</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link  text-white" data-toggle="modal" data-target="#modelId" href="">SOFRI PRECONCEITO!</a>
          </li>
</ul>
          
      </div>
        
          <a class="navbar-brand" href="#"><img class="logo" src="<?php echo base_url('assets/img/bola.png')?>"><h4 class="tit">RADAR DO PRECONCEITO</h4></a>
    </nav>
 
 <!-- Modal -->
 <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Tipo de Preconceito</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
       </div>
       <div class="modal-body">
         <h4 class="pergunta">Em qual meio você sofreu o preconceito ?</h4>
         <a style="color:#a70c0c" href="<?php echo base_url('denunciafisica')?>">Físico</a>
         <a style="color:#a70c0c" href="<?php echo base_url('denunciavirtual')?>">Virtual</a>
       </div>
       <div class="modal-footer">
       </div>
     </div>
   </div>
 </div>