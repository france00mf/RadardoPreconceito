<style>
 .link{text-decoration: none;
    color: white;}

.link:hover{
    transition:0.5;
    color:#dddddd;
    text-decoration:none;
}
.closebtt{
        color:white;

    }
.closebtt:hover{
    transition:0.5;
    color:black;
}

@media(max-width:768px){
    #sidebar li{
    padding:3vw;
    margin-top:0.5vh;
    font-size:4vw;
}
    .closebtt{
        font-size:10vw;
    }
}

</style>

<nav id="sidebar" style="overflow: hidden;">

                <a href="javascript:void(0)" id="close" class="closebtt" onclick="closemenu()">&times;</a>
                <h5>&nbsp;&nbsp;DASHBOARD RP</h5>
                <div class="sidebar-header">
                    
                    <h5 class="display-5">Bem vindo:</h5>
                    <h2><?php echo $this->session->userdata('user');?></h2>
                </div>
                <ul class="sidebar-elements" style="list-style-type: none;">
                    <li class="active"><a  class="link" href="<?php echo base_url('Adm/painel')?>"><i class="fas fa-home" style="margin-right:1vw"></i>Home</a></li>
                    <li class="decoration"><a class="link" href="<?php echo base_url('Adm/denunciasf')?>"><i class="fas fa-map-marker-alt" style="margin-right:1vw"></i>Denuncias Físicas</a></li>
                    <li><a class="link" href="<?php echo base_url('Adm/denunciasv')?>"><i class="fas fa-desktop"  style="margin-right:1vw"></i>Denuncias Virtuais</a></li>
                    <li class="decoration"><a class="link" href="<?php echo base_url('Adm/bugs')?>"><i class="fas fa-bug"  style="margin-right:1vw"></i>Reports de Bugs</a></li>
                    <li><a  class="link "href="<?php echo base_url('Adm/contato')?>"><i class="fas fa-comments"  style="margin-right:1vw"></i>Mensagens de Contato</a></li>
                    <li class="decoration"><a class="link" href="<?php echo base_url('Adm/moderadores')?>"><i class="fas fa-users" style="margin-right:1vw"></i>Moderadores</a></li>
                    <li><a class="link" href="<?php echo base_url('Adm/psicologos')?>"><i class="fas fa-user-md" style="margin-right:1vw"></i>Psicólogos</a></li>
                    <li class="decoration"><a class="link" href="<?php echo base_url('Adm/advogados')?>"><i class="fas fa-gavel"  style="margin-right:1vw"></i>Advogados</a></li>
                    <li><a class="link" href="<?php echo base_url('Adm/reports')?>"><i class="fas fa-exclamation-triangle" style="margin-right:1vw"></i>Reports de Falsarios</a></li>
                    <li class="decoration"><a class="link" href="<?php echo base_url('Adm/deslogar')?>"><i class="fas fa-sign-in-alt" style="margin-right:1vw"></i>Deslogar</a></li>
                </ul>
            </nav>