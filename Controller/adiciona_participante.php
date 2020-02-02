<?php
    
    require_once "../Model/Participante.php";

    session_start();

    $participante = new Participante($_POST['nome'], $_POST['email']);

    $participanteJaExiste = false;

    if(isset($_SESSION['participantes'])){ 
        foreach($_SESSION['participantes'] as $pessoa){
            //Checa se o email cadastrado já existe. Caso já exista, não cadastra o usuário e exibe modal de erro
            if(strcmp($pessoa->email, $participante->email) == 0){
                $participanteJaExiste = true;
                break;     
            }
        }
    }

    if($participanteJaExiste)
        header('Location: ../View/index.php?erro');
    
    else{
        $_SESSION['participantes'][] = $participante;
        header('Location: ../View/index.php?sucesso');
    }
?>