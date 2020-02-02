<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once "../PHPMailer/Exception.php";
    require_once "../PHPMailer/OAuth.php";
    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/POP3.php";
    require_once "../PHPMailer/SMTP.php";

    require_once "Participante.php";

    class RemetenteDeEmail extends PHPMailer{

        private $corpoEmail = null;


        //E-mail que enviará o resultado aos participantes, favor não modifica-lo
        private const EMAIL_REMETENTE = 'secretoamigo452@gmail.com'; 
        private const SENHA_REMETENTE = 'amigosecreto123'; 

        function __construct($corpoEmail){
            parent::__construct(true);

            $this->SMTPDebug = 0;                                       
            $this->isSMTP();                                           
            $this->Host = 'smtp.gmail.com';                       
            $this->SMTPAuth = true;
            
            $this->Username =  self::EMAIL_REMETENTE;              
            $this->Password = self::SENHA_REMETENTE;     

            $this->SMTPSecure = 'tls';                                  
            $this->Port = 587;     
            $this->CharSet = 'UTF-8';                              
            
            $this->setFrom(self::EMAIL_REMETENTE, 'Amigo Secreto');

            $this->isHTML(true);

            $this->corpoEmail = $corpoEmail;    //Recebe o corpo do e-mail
        }


        public function enviaEmail($participante, $amigoSecreto){
            try{
                $this->ClearAddresses();
                //Adiciona e-mail do participante entre os destinatários
                $this->addAddress($participante->email);    
                $this->Subject = "Resultado do sorteio do amigo secreto!";
                $this->Body = "Você tirou <strong>$amigoSecreto->nome</strong><br>" . $this->corpoEmail;
                $this->send();
                return true;    //Envio com sucesso
            }catch(Exception $e){
                return false;   //Erro no envio
            }
        }
        
    }

?>