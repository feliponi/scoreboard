<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastro de Colaboradores</title>

<!-- Bootstrap CSS File -->
<link rel="stylesheet" type="text/css" href="js/bootstrap-3.3.7-dist/css/bootstrap.css" />
</head>
<body>

<?php
    include("session.php");
    if (isset($_SESSION['nome'])){
        $username = $_SESSION['nome'];
        echo "Hai " . $username . "
        ";
        echo "<a href='logout.php'>Logout</a>";
    }   
?>
<!-- Content Section -->
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Colaboradores</h2>
<div class="pull-right">
<button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Adicionar Registro</button>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<h4>Cadastros:</h4>
<div class="records_content"></div>
</div>
</div>
</div>
<!-- /Content Section -->

<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Adicionar Registro</h4>
</div>
<div class="modal-body">

<div class="form-group">
<label for="matr_col">Matrícula</label>
<input type="text" id="matr_col" placeholder="Matrícula" class="form-control" />
</div>

<div class="form-group">
<label for="nome_col">Nome</label>
<input type="text" id="nome_col" placeholder="Nome" class="form-control" />
</div>

<div class="form-group">
<label for="email_col">E-Mail</label>
<input type="text" id="email_col" placeholder="nome.sobrenome@netzsch.com" class="form-control" />
</div>

<div class="form-group">
<label for="senha_col">Senha</label>
<input type="password" id="senha_col" placeholder="Senha" class="form-control" />
</div>

<div class="form-group">
<label for="adm_col">Administrador?</label>
<input type="checkbox" id="adm_col" class="form-check-input"/>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
<button type="button" class="btn btn-primary" onclick="addRecord()">Salvar</button>
</div>
</div>
</div>
</div>

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualizar Colaborador</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_col_matricula">Matricula</label>
                    <input type="text" id="update_col_matricula" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_col_name">Nome</label>
                    <input type="text" id="update_col_name" placeholder="Colaborador" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_col_email">E-mail</label>
                    <input type="text" id="update_col_email" placeholder="nome.sobrenome@netzsch.com" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_col_senha">Senha</label>
                    <input type="password" id="update_col_senha" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_adm">Administrador</label>
                    <input type="checkbox" id="update_adm" class="form-check-input"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Salvar</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

 <div id="erro_box" class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Atenção!</strong> <div id="erro_message"></div>
 </div>

 <div id="alert_box" class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Feito!</strong> <div id="alert_message"></div>
</div>

<!-- Jquery JS file -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="js/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
