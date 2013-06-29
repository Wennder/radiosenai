<?php

class Conexao {
    
        private $server = 'localhost'; 
        private $username = 'root'; 
        private $password = '';
        private $db = 'radiosenai';
    
        protected function __construct(){
            $con = @mysql_connect($this->server, $this->username, $this->password);
            if (!@mysql_select_db($this->db, $con)) die ('<h1 style="color: red;">Erro ao conectar com o banco</h1>');
            error_reporting(0); // Desativa todos os avisos
        }
        
        protected function erro($acao){
            return '<h2 style="color: red;">Erro ao executar '.$acao.'!</h2>';
        }
}

?>
