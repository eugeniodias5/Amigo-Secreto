<?php
    class Participante{
        
        private $nome = null;
        private $email = null;

        function __construct($nome, $email){
            $this->nome = $nome;
            $this->email = $email;
        }

        function __get($atributo){
            return $this->$atributo;
        }
    }

?>