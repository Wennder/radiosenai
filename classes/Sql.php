<?php

require_once 'Conexao.php';

class Sql extends Conexao{
    
    protected $resultado;
    private $processo;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function ver_processo() {
        return $this->processo;
    }
    
    public function linhas(){
        return mysql_num_rows($this->resultado);
    }
    
    protected function linhas_afetadas(){
        return mysql_affected_rows();
    }
    
    protected function funcionou(){
        return mysql_affected_rows()==0 ? FALSE : TRUE;
    }

    protected function inserir($tabela, $campos, $valores){
        $this->processo = 'INSERT INTO '.$tabela.'('.$campos.') VALUES ('.$valores.')';
        $this->resultado = mysql_query($this->processo) or die ($this->erro('inserção'));
    }
    
    protected function alterar($tabela, $alteracoes, $complemento){
        $this->processo = 'UPDATE '.$tabela.' SET '.$alteracoes.' '.$complemento;
        $this->resultado = mysql_query($this->processo) or die ($this->erro('alteração'));
    }
    
    protected function deletar($tabela, $complemento) {
        $this->processo = 'DELETE FROM '.$tabela.' '.$complemento;
        $this->resultado = mysql_query($this->processo) or die ($this->erro('ação de deletar'));
    }
    
    protected function busca($campos, $tabela, $complemento){
        $this->processo = 'SELECT '.$campos.' FROM '.$tabela.' '.$complemento;
        $this->resultado = mysql_query($this->processo) or die ($this->erro('busca'));
    }
    
}

?>
