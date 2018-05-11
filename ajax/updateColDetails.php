<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $matricula = $_POST['matricula'];
    $colaborador = $_POST['colaborador'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $adm = $_POST['adm'];

    // Updaste User details
    $query = "UPDATE colaboradores SET nome_col = '$colaborador', email_col = '$email', adm_col = $adm WHERE matr_col = '$matricula'";

    if ($senha) 
    {
        $query = "UPDATE colaboradores SET nome_col = '$colaborador', email_col = '$email', senha_col = '$senha', adm_col = $adm WHERE matr_col = '$matricula'";
    }

    $response = "Alterado com Sucesso!";

    if (!$result = mysqli_query($con, $query)) {
        $response = "Erro: " . mysqli_error($con);
        //exit(mysqli_error($con));
    }

    echo $response;
}