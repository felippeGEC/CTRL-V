<?php
    include('bd.php');

    if(isset($_POST['deletarid']))
    {
        $id = $_POST['deleteId'];

        $sql = "DELETE FROM codigos WHERE id = '$id'";
        $resultado = mysqli_query($con,$sql);


        
        if($resultado){
            echo '<script> alert("Codigo deletado com sucesso."); </script>';
            header('Location:home.php');
        }else{
            echo '<script> alert("Não foi possivel deletar o codigo."); </script>';
        }
    }
?>    
