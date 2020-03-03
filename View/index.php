<?php
  require_once '../View/barra_navegacao.php';

?>

<!doctype html>
<html lang="BR">
    <head>
    
    </head>

    <body onload="envioCorretoDeDados()">
        
        <div class="container">
          <div class="row">
            <div class="col-md mt-5 d-flex justify-content-center">
              <h1>LOGO</h1>
            </div>  
          </div>

          <div class="container">
            <div class="row">
              <div class="col-md mt-3">
                <h4>Adicione um participante</h4>
              </div>  
            </div>
          
          <form class="form mt-2" action="../Controller/adiciona_participante.php" method="POST" onsubmit="return validaFormulario()" novalidate>  
            <div class="row">
              <div class="col-md-5">

                <div class="row">
                  <div class="col-md">
                    <input id="nome" name="nome" placeholder="Nome" type="text" class="form-control">
                  </div>  
                </div>

                <div  class="row">
                  <!--Inclusão de mensagens de erro-->
                    <div id="nomeErro"  class="col-md text-danger invisible">
                      <p>Preencha o nome corretamente</p>
                    </div>
                  </div>

              </div>
                
              <div class="col-md-5">
                <div class="row">
                  <div class="col-md">
                    <input id="email" name="email" placeholder="Email" type="email" class="form-control">
                  </div>
                </div>

                <div  class="row">
                  <!--Inclusão de mensagens de erro-->
                    <div id="emailErro" class="col text-danger invisible">
                      <p>Preencha o email corretamente</p>
                    </div>
                </div>
              </div>  

              <div class="col-md-2">
                <button type="submit" id="botaoEnvio" class="btn btn-outline-success mb-5"><i class="fas fa-user-plus"></i></button>
              </div>

            </div>
        
          </form>
  

            <!--Modal de envio de formulário-->
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="tituloModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tituloModal"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p id="modalMensagem"></p> 
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="botaoModal" class="btn btn-success" data-dismiss="modal">Continuar</button>
                  </div>
                </div>
              </div>
            </div>

          <form action="../Controller/realiza_sorteio.php" method="POST">
            <div class="row">
              <div class="col-md-10">
                <textarea name="assuntoEmail" placeholder="Adicione uma mensagem para os participantes" class="form-control"></textarea>
              </div>
            </div>

            
            <div class="row">
                <div class="col-md d-flex justify-content-center">
                  <button type="submit" class="mt-4 btn btn-success">Realizar Sorteio</button>
                </div>
            </div>
            
          </form>  

        </div>

        <!-- Barra de ajuda -->
          <div class="row container d-flex justify-content-end mt-5" >
              <div id="ajuda" class="collapse col-md-8 card text-white bg-success" style="max-width: 700px;">
                <div class="card-header"><h4> Sobre </h4></div>
                  <div class="card-body">
                    <!-- <h5 class="card-title">Algumas instruções</h5> -->
                    <p class="card-text">
                      Cadastre o nome e o e-mail dos participantes, ao final, será realizado um sorteio e cada participante receberá 
                      um email com o seu amigo sorteado. Não é possível
                      adicionar participantes com e-mails iguais. Na aba "Participantes", você poderá ver a lista
                      de participantes cadastrados.
                    </p>
                  </div>  
                </div>

                <div class="col-md-0 d-flex">
                  <div class="align-self-end">
                    <button class="btn btn-success" data-toggle="collapse" data-target="#ajuda" aria-expanded="false" aria-controls="ajuda">
                      <i class="fas fa-2x fa-question-circle"></i>
                    </button>
                  </div>
                </div>  
    
                      
          </div>  


    </body>
</html>