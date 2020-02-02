<?php
    require_once "../Model/Participante.php";
    require_once "../View/barra_navegacao.php";

?>

<head>
    <script>
        //Torna ativa a tag 'Participantes' na NavBar
        document.getElementById('home').classList.remove('active')
        document.getElementById('participantes').classList.add('active')       
    </script>

</head>

<body>
    <div class="container">
        <div class="row">
          <div class="col-md mt-5 d-flex justify-content-center">
            <h1>LOGO</h1>
          </div>  
        </div>

          <div class="row">
            <div class="col-md mt-3 justify-content-center">
              <h4>Lista de participantes</h4>
            </div>  
          </div>

          <table class="table table-md table-bordered table-striped mt-3">
            <thead class="bg-success text-light">
              <tr>
                <th scope="col"></th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 0;  

                if(isset($_SESSION['participantes'][0])){
                    foreach($_SESSION['participantes'] as $participante){
                        echo "<tr>
                                <th>" . ($index+1) . "</th>
                                <td>$participante->nome</td>
                                <td>$participante->email</td>
                                <td class=\"bg-white border-white\">
                                  <a href=\"../Controller/exclui_participante.php?indice=$index\" class=\"btn btn-danger\">
                                     <i class=\"far fa-trash-alt\"></i>
                                  </a>
                                </td>   
                            </tr>";

                            $index++;
                    }
                }        
              ?>
            </tbody>  
          </table>
          
    </div>      
</body>