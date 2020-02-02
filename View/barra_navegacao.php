<?php
require_once 'head.php';

?>

<!doctype html>
<html lang="BR">
  <head>

    
  </head>
      <body>
        
        <div class="container-fluid bg-success">
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <a class="navbar-brand ml-4" href="index.php">Amigo Secreto</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColapso" aria-controls="navbarColapso" aria-expanded="true" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mr-4" id="navbarColapso">
                  <ul class="navbar-nav ml-auto">
                    <li id="home" class="nav-item active">
                      <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li id="participantes" class="nav-item">
                      <a class="nav-link" href="lista_participantes.php">Participantes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../Controller/sair.php">Sair</a>
                    </li>               
                  </ul>
                </div>
              </nav>
        </div>

            
    </body>
</html>