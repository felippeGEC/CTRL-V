<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: paginainicial.php?erro=1');
}
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
include('bd.php');

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="estilo.css">  
</head>

<body>
<div id="particles-js">
    <script type="text/javascript" src="particles.js"></script>
    <script type="text/javascript" src="app.js"></script>
</div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 card">
        <div>
          <div class="head-title">
            <h1 class="text-center"><img src="ctrlv.png" width="100" height="100"></img></h1>
            <hr>
          </div>
          <div class="col-md-3 float-left add-new-button">
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">
              <i class="fas fa-plus"></i> Novo Codigo
            </a>
          </div>
          <div class="col-md-3 float-left add-new-button">
            <a href="pdf.php" target="_blank" class="btn btn-success btn-block">
              <i class="fas fa-print"></i> Sair
            </a>
          </div>          
          <br><br><br>
          <table class="table table-striped">
            <thead class="bg-secondary text-white">
              <tr>
                <th>Id</th>
                <th>Id_usuario</th>
                <th>cd</th>                
                <th>Visualizar</th>
                <th>Atualizar</th>
                <th>Deletar</th>
              </tr>
            </thead>
            <tbody>

              <?php

              $sql = "SELECT * FROM codigos";             
              $resultado = mysqli_query($con, $sql);

              if ($resultado) {
                while ($row = mysqli_fetch_assoc($resultado)) {
              ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['id_usuario']; ?></td>
                    <td><?php echo $row['cd']; ?></td>                    
                    <td>
                      <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i> Visualizar </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i> Atualizar </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger deleteBtn"> <i class="fas fa-trash-alt"></i> Deletar </button>
                    </td>
                  </tr>
              <?php
                }
              } else {
                echo "<script> alert('No Record Found');</script>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- MODALS -->

  <!-- ADD RECORD MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Novo Código</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="inclui_codigo.php" method="POST">
            <div class="form-group">
              <label for="title">Entre com seu codigo</label>
              <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Digite seu codigo aqui" maxlength="300" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="insertData">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW MODAL -->
  <div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">Visualizar</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-5 col-xs-6 tital ">
              <strong>Codigo:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="visucodigo"></div>
            </div>            
          </div>
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- UPDATE MODAL -->
  <div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Editar</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="editar.php" method="POST">
            <input type="hidden" name="updateId" id="updateId">
            <div class="form-group">
              <label for="title">Codigo</label>
              <input type="text" name="updatecodigo" id="updatecodgo" class="form-control" placeholder="Entre com seu codigo" maxlength="50"
                required>
            </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- DELETE MODAL -->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="deletar.php" method="POST">

          <div class="modal-body">

            <input type="hidden" name="deleteId" id="deleteId">

            <h4>Tem certeza que quer deletar?</h4>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
            <button type="submit" class="btn btn-primary" name="deletarid">Sim</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  <script>
    $(document).ready(function() {
      $('.updateBtn').on('click', function() {

        $('#updateModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#updateId').val(data[0]);
        $('#updatecodigo').val(data[2])      

      });

    });
  </script>

  <script>
    $(document).ready(function() {
      $('.viewBtn').on('click', function() {

        $('#viewModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#visucodigo').text(data[2]);               

      });

    });
  </script>

  <script>
    $(document).ready(function() {
      $('.deleteBtn').on('click', function() {

        $('#deleteModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#deletarid').val(data[0]);

      });

    });
  </script>
</body>

</html>