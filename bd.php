<?php

    //host
    $host = 'localhost';

    //usuario
    $usuario = 'root';

    //senha
    $senha = '';

    //banco de dados
    $database = 'ctrlv';

    

    //criar conexao
    $con = mysqli_connect($host, $usuario, $senha, $database);
    
    if(!$con){
        die("Falha ao conectar com o bd: ".mysqli_connect_error());
    }
	


?>