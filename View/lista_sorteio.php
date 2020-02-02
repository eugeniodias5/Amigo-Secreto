<?php

    require_once "../Model/Participante.php";
    require_once "head.php";
    
?>

<html>
    <head>
        <script>
            function exibeTabela(){
                let classeTabela = document.getElementById('tabelaSorteio').className

                if(classeTabela.includes('invisible'))
                    classeTabela = classeTabela.replace('invisible', ' ')
                
                document.getElementById('tabelaSorteio').className = classeTabela
            }

            function exibeModal(){
                //Exibe modal de erro se o envio de emails não foi realizado coom sucesso em realiza_sorteio.php
                let url = document.location.search
                if(url.includes('erro')){
                    console.log('OLÁ!')
                    $(document).ready(function(){
                        $("#modal").modal();
                    });
                }
            }    
        </script>
    </head>

    <body onload="exibeModal()">

        <!--NavBar-->
        <div class="container-fluid bg-success">
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <a class="navbar-brand ml-4" href="index.php">Amigo Secreto</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColapso" aria-controls="navbarColapso" aria-expanded="true" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </nav>
        </div>

        <div class="container">
            <div class="row mt-4">
                <div class="col-md  text-center text-success">
                    <h2>Sorteio Realizado!</h2>
                </div>
            </div>

            <div class="row d-flex justify-content-center mt-4">
                <button onclick="exibeTabela()" class="btn btn-success mr-4">Ver sorteio</button>
                <a href="../Controller/envia_resultado.php" class="btn btn-success">Enviar resultado</a>
            </div>

                <table id="tabelaSorteio" class="table table-md table-bordered table-striped mt-5 invisible">
                    <thead class="bg-success text-light">
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Participante</th>
                        <th scope="col">Amigo Secreto</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?
                      $numParticipantes = sizeof($_SESSION['participantes']);
                      for($indice = 0; $indice < ($numParticipantes - 1); $indice++){
                        echo "<tr>
                                    <th>" . ($indice+1) . "</th>
                                    <td>" . $_SESSION['participantes'][$indice]->nome . "</td>
                                    <td>" . $_SESSION['participantes'][$indice+1]->nome . "</td>
                                </tr>";
                      }

                      //Último participante tira o primeiro     
                      echo "<tr>
                                    <th>" . $numParticipantes . "</th>
                                    <td>" . $_SESSION['participantes'][$numParticipantes - 1]->nome . "</td>
                                    <td>" . $_SESSION['participantes'][0]->nome . "</td>
                                </tr>";
                      ?>         

                    </tbody>  
                  </table>

                  <!--Modal de erro no envio dos e-mails-->
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="tituloModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title text-danger" id="tituloModal">Erro!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <p id="modalMensagem">O envio de e-mails não foi realizado com sucesso, tente novamente mais tarde!</p> 
                            </div>
                            <div class="modal-footer">
                            <button type="button" id="botaoModal" class="btn btn-danger" data-dismiss="modal">Continuar</button>
                            </div>
                        </div>
                        </div>
                    </div>



        </div>    



    </body>

</html>