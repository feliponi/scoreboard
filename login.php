<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastro de Colaboradores</title>

<!-- Bootstrap CSS File -->
<link rel="stylesheet" href="css/styles.css" >
 <link rel="stylesheet" type="text/css" href="js/bootstrap-3.3.7-dist/css/bootstrap.css" />
</head>

<?php  //Start the Session
session_start();
 require('ajax/db_connection.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
        //3.1.1 Assigning posted values to variables.
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = md5($_POST['password']);
        //3.1.2 Checking the values are existing in the database or not
        $sql = "SELECT * FROM colaboradores WHERE email_col='$username'";

        $sql .= " AND senha_col='$password'";
        $sql;
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);

        //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
        if ($count == 1){
            $row = mysqli_fetch_assoc($res);

            $_SESSION['username'] = $username;
            $_SESSION['adm'] = $row['adm_col'];
            $_SESSION['nome'] = $row['nome_col'];

            //TODO: mudar para index.php quando estiver pronto o menu
            header('location: colaboradores.php');

    }else{
            //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
            $fmsg = "Senha ou usuário inválido.";
        }
    }
        //3.1.4 if the user is logged in Greets the user with message
        /*if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            echo "Hai " . $username . "
            ";
            echo "<a href='logout.php'>Logout</a>";
    
    }else{
        //3.2 When the user visits the page first time, simple login form will be displayed.
    }*/
?>

<body>

      <form class="form-signin" method="POST">
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Pontuação PMP - C3</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="username" class="form-control" placeholder="Usuário" required>
	</div>
    
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>

<!-- Jquery JS file -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="js/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>


</body>
</html>