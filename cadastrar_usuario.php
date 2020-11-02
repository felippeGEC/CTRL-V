<?php
    session_start(); 

    include('bd.php');        
 
   $usuario = $_POST['usuario'];
   $email = $_POST['email'];
   $senha = md5($_POST['senha']);
   

   $sql = "insert into usuario(usuario,email,senha) values('$usuario','$email','$senha')";

   if(mysqli_query($con,$sql)){
   	  header('Location: paginainicial.php?validar=1');
   }else{
   	  header('Location: paginainicial.php?erro2=1');
   }
 
?>	