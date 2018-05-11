<?php
	if(isset($_POST['matr_col']) && isset($_POST['nome_col']) && isset($_POST['email_col'])  && isset($_POST['senha_col']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$matr_col = $_POST['matr_col'];
		$nome_col = $_POST['nome_col'];
		$email_col = $_POST['email_col'];
		$senha_col = md5($_POST['senha_col']);
		$adm_col = $_POST['adm_col'];
        
		$query = "INSERT INTO colaboradores(matr_col, nome_col, email_col, senha_col, adm_col) VALUES('$matr_col', '$nome_col', '$email_col', '$senha_col', $adm_col)";

		$response = "Registro salvo com sucesso!";

		if (!$result = mysqli_query($con, $query)) {
			$response = "Erro: " . mysqli_error($con);					
			//exit(mysqli_error($con));
		}
		// display JSON data
		echo $response;
	}
?>