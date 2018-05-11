<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>Matrícula</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Administrador C3</th>
							<th>Atualizar</th>
							<th>Remover</th>
						</tr>';

	$query = "SELECT matr_col,nome_col,email_col,adm_col FROM colaboradores";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {

    	while($row = mysqli_fetch_assoc($result))
    	{
            $adm = 'não';

            if ($row['adm_col'] == 1 ) $adm = 'sim';

    		$data .= '<tr>
				<td>'.$row['matr_col'].'</td>
				<td>'.$row['nome_col'].'</td>
				<td>'.$row['email_col'].'</td>
				<td>'.$adm.'</td>
				<td>
					<button onclick="GetUserDetails('.$row['matr_col'].')" class="btn btn-warning">Atualizar</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['matr_col'].')" class="btn btn-danger">Remover</button>
				</td>
    		</tr>';
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Registros não encontrados!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>