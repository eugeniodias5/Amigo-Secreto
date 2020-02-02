<?php
    require_once "../Model/Participante.php";
    session_start();

    $indice = $_GET[indice];
    //excluindo elemento no índice passado
    unset($_SESSION['participantes'][$indice]);

    //Reindexando o array
    $_SESSION['participantes'] = array_values($_SESSION['participantes']);

    print_r($_SESSION['participantes']);
    echo "$indice";
    header("Location: ../View/lista_participantes.php");
    
?>