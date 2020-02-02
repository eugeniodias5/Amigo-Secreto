<?php

    session_start();
    
    if(isset($_SESSION['participantes'])){
        //Checando se o número de participantes é ímpar, caso não seja, volta e exibe modal de erro
        if((sizeof($_SESSION['participantes']) % 2) != 0){
            header('Location: ../View/index.php?erro2');
        }

        else{

            $_SESSION['corpoEmail'] = $_POST['assuntoEmail'];   //Corpo do e-mail é guardado

            //Realizando sorteio
            shuffle($_SESSION['participantes']);
            header('Location: ../View/lista_sorteio.php');
        }
    }

    else{
            //Não existem participantes, exibe modal de erro
            header('Location: ../View/index.php?erro3');
    }

?>