<?php 
session_start();
if((!isset ($_SESSION['username']) == true) and (!isset ($_SESSION['adm']) == true))
{
    unset($_SESSION['username']);
    unset($_SESSION['adm']);
    header('location:login.php');
    }
 
$logado = $_SESSION['username'];
?>