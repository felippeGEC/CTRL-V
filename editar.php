<?
     include('connection.php');


        if(ISSET($_POST['updateData']))
        {   
          $id = $_POST['updateId'];
          $codigo = $_POST['updatecodigo'];    
    
          $sql = "UPDATE codigos SET cd ='$codigo',
                               where id = '$id';  

         $resultado = mysqli_query($conn, $sql);

        if($resultado){        
          echo '<script> alert("Codigo atualizado com sucesso."); </script>';
          header("Location:home.php");
        }
       else{
        echo '<script> alert("Não foi possivel atualizar o codigo"); </script>';
       }
  }
  
>?