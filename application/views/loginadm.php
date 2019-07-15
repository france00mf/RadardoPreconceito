<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/login.css"/>
    <link rel="shortcut icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <link rel="icon" href="radar-preconceito-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container centered rounded shadow">
        <header class="container-fluid text-center rounded header ">
            <h4 class="display-4" style="color:white"><strong>LOGIN</strong></h4>
        </header>
        <form class="margin" action="<?php echo base_url('Adm/login')?>" method="POST">
                <div class="form-group">
                        <?php if($this->session->flashdata('errologin')){
                            echo $this->session->flashdata('errologin');
                        } ?>
                        <?php if($this->session->flashdata('fracasso')){
                            echo "<div class='alert alert-danger'>".$this->session->flashdata('fracasso')."</div>";
                        }?>
                        <div class="input-group-prepend">
                                <label class="input-group-text" for="inputlogin">
                                        <i class="fas fa-sign-in-alt"></i>
                                </label>
                                <input type="text" value="<?php echo set_value('inputlogin')?>" name="inputlogin" placeholder="Login" id="inputlogin" class="form-control">
                            </div>
                  
                </div>
                <div class="form-group">
                        <div class="input-group-prepend">
                                <label class="input-group-text" for="inputlogin">
                                        <i class="fas fa-key"></i>
                                </label>
                                <input type="password" value="<?php echo set_value('inputpass')?>" name="inputpass" placeholder="Senha" class="form-control">
                            </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-dark" style="float:right;">Entrar</button>
                </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
</body>
</html>