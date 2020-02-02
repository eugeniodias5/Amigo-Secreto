<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once "../PHPMailer/Exception.php";
    require_once "../PHPMailer/OAuth.php";
    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/POP3.php";
    require_once "../PHPMailer/SMTP.php";

    require_once "../Model/Participante.php";
    require_once "../Model/RemetenteDeEmail.php";

    session_start();

    $numParticipantes = sizeof($_SESSION['participantes']);

    $envioEmailsDeuCerto = true;    //Indica se o envio foi feito com sucesso

    $remetente = new RemetenteDeEmail($_SESSION['corpoEmail']);

    //Envia Email para participantes
    for($indice = 0; $indice < $numParticipantes; $indice++){

        if($indice == ($numParticipantes - 1)){
            //Envia e-mail do último participante
            if(!$remetente->enviaEmail($_SESSION['participantes'][($indice)], $_SESSION['participantes'][0])){
                $envioEmailsDeuCerto = false;
                break;
            }
        }

        else{
            if(!$remetente->enviaEmail($_SESSION['participantes'][$indice], $_SESSION['participantes'][($indice + 1)])){
                //Retorna false se algum e-mail não foi enviado com sucesso
                $envioEmailsDeuCerto = false;
                break;
            }
        }     
    }

    if($envioEmailsDeuCerto){
        session_destroy();  //Destrói os dados inclusos na sessão 
        header('Location: ../View/index.php?sucesso2'); //Retorna para a tela inicial e informa que o envio de e-mails foi um sucesso
    }
        
    else
        header('Location: ../View/lista_sorteio.php?erro'); //Volta para a lista de sorteio e exibe modal de erro

?>