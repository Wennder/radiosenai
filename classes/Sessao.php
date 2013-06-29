<?php

class Sessao {
    
    private $user_login = 'radiosenai';
    private $user_senha = '';
    private $status;
    
    public function __construct() {
        if (!isset($_SESSION)) session_start();
        $this->getStatus();
    }
    
    private function getStatus(){
        if (!isset($_SESSION['user_logado'])){
            $this->altStatus(FALSE);
        } else $this->status = $_SESSION['user_logado'];
    }
    
    private function altStatus($status){
        $_SESSION['user_logado'] = $status;
        $this->status = $status;
    }
    
    public function bloqueio(){
        if ($this->status == FALSE){ 
            echo '
            <script type="text/javascript">';
            if (!isset($_GET['sair'])) echo 'alert("Acesso proibido!");
                ';
            echo 'window.location = "../";
            </script>
            ';
        }
    }
    
    public function entrar($user, $senha){
        if (($user==$this->user_login) and ($senha==$this->user_senha)){
            $this->altStatus(TRUE);
        }
    }
    
    public function sair(){
        $this->altStatus(FALSE);
    }
    
}

?>
