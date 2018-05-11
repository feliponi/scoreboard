<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $user_id = $_POST['id'];

    // delete User

    $response = "Registro removido com sucesso!";

    $query = "DELETE FROM colaboradores WHERE matr_col = '$user_id'";
    if (!$result = mysqli_query($con, $query)) {
        $response = "Erro: " . mysqli_error($con);
        //exit(mysqli_error($con));
    }

    echo $response;
}
?>