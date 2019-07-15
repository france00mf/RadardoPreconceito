<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Mudança nos imports e no nav -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/listagemprofissionais.css')?>"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/radar-preconceito-bola.png')?>" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Source+Code+Pro|Special+Elite|Teko|Abel" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Listagem de Profissionais</title>
</head>
<body>
    <?php $this->load->view('nav');?>
    <!-- fecha -->
    <div class="container-fluid b1">
        <div class="b1">
            <br><br>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-11"><h4 class="menu"><strong><i>PROFISSIONAIS</i></strong></h4>
                    <br>
                    <p class="menu"><strong></strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid b2">
        <br>
        <form action="<?php echo base_url('Principal/flistarprofissionais')?>" method="POST">
        <div class="row">
   
              <div class="col-lg-5">
                <div class="form-group">
                    <label for="inputaidade">NOME: </label>
                    <input type="text" name="nome" class="form-control in" id="inputidade" placeholder="ex: João Silva">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group pt-2">
                  <label for="inputprofissao">PROFISSÃO: </label>
                  <select name="profissao" id="inputprofissao" class="in form-control" size="1">
                          <option value=""></option>
                          <option value="Advogado">Advogado</option>
                          <option value="Psicólogo">Psicólogo</option>
                  </select>
                </div>
              </div> 
              <div class="col-lg-3">
                <div class="form-group pt-2">
                  <label for="inputestado">Estado: </label>
                  <select name="estado" id="inputestado" class="in form-control" size="1">
                          <option value="">Escolha</option>
                          <option value="AC">AC</option>
                          <option value="AL">AL</option>
                          <option value="AP">AP</option>
                          <option value="AM">AM</option>
                          <option value="BA">BA</option>
                          <option value="CE">CE</option>
                          <option value="DF">DF</option>
                          <option value="ES">ES</option>
                          <option value="GO">GO</option>
                          <option value="MA">MA</option>
                          <option value="MT">MT</option>
                          <option value="MS">MS</option>
                          <option value="MG">MG</option>
                          <option value="PA">PA</option>
                          <option value="PB">PB</option>
                          <option value="PR">PR</option>
                          <option value="PE">PE</option>
                          <option value="PI">PI</option>
                          <option value="RJ">RJ</option>
                          <option value="RN">RN</option>
                          <option value="RS">RS</option>
                          <option value="RO">RO</option>
                          <option value="RR">RR</option>
                          <option value="SC">SC</option>
                          <option value="SP">SP</option>
                          <option value="SE">SE</option>
                          <option value="TO">TO</option>
                  </select> 
                </div>
                <button type="submit" class="btn btn-danger">Pesquisar</button>
                  </form>
              </div>
        </div>
        <br>
        <div style="background-color:black;color:white" class="container instructions d-flex align-itens-center justify-content-center mt-3">
              <h4>Instruções</h4>

        </div>
        <div style="background-color:black;color:white" class="container instructions d-flex align-itens-center justify-content-center">
            <ul>
              <li>Nunca aceite se encontrar fora do local indicado no perfil do profissional</li>
              <li>Sempre se encontre em horário comercial</li>
              <li>Verifique as credenciais do profissional nos respectivos orgãos regulatórios</li>
              <li>Ao menor sinal de desconfiança envie uma mensagem para apurarmos melhor o perfil do profissional</li>
          </p>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12">
            <p style="color: red; font-size: 20px; margin-left: 10px"> Resultados:</p>
          </div>
        </div>
        <?php if(!$pessoas == false){
            foreach($pessoas as $row){
                echo '<div class="container res" >
                <div class="row">
                  <div class="col-lg-2 pt-4 pl-4">
                    <img src="'.base_url($row->Imagem).'" class="img-responsive imgprof">
                  </div>
                  <div class="col-lg-3 pt-4">
                    <p style="color: #a70c0c;"><strong><a style="color:#a70c0c" href="'.base_url('Profissionais/mostrarperfil/'.$row->Id).'">'.$row->Nome.'</a></strong></p>
                  </div>
                </div>
                <div class="row nom">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        <h6><i class="fas fa-briefcase"></i>&nbsp;&nbsp;PROFISSÃO:  &nbsp;<strong>'.$row->Profissao.'</strong></h6>
                    </div>
                    <div class="col-lg-3">
                        <h6><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp; UF:  &nbsp;<strong><i>'.$row->estado.'</i></strong></h6>
                    </div>
                  </div>
            </div><br>';
            }
        }?>
        <?php echo $pagination;?>
    </div>    
    <div class="container-fluid footer">
        <div class="container-fluid d-flex  justify-content-center align-items-center foot">
            <h5 id="footerH">RADAR DO PRECONCEITO | POR UMA SOCIEDADE MAIS JUSTA</h5>
        </div>
        <div class="container-fluid d-flex justify-content-center align-items-center baixo">
            <h5 id="footerH">Desenvolvido Por:<a href="http://enkisolucoes.com.br/" target="_blank"> Enki Soluções</a></h5>
        </div>
        </div>
        <script src="<?php echo base_url('assets/js/dist/sweetalert2.all.min.js')?>"></script>
            <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
            
</body>
</html>
