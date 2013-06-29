<?php

require_once 'Sql.php';

class Control extends Sql {

    public function __construct() {
        parent::__construct();
    }
    
    private function nomeAleatorio(){
        return date('zYHis');
    }
    
    // Insert
    public function cadPedido($nome, $musica, $artista, $recado){
        $nome = str_replace("'", '', $nome);
        $musica = str_replace("'", '', $musica);
        $artista = str_replace("'", '', $artista);
        $recado = str_replace("'", '', $recado);
        $this->inserir('pedidos', 'id, nome, musica, artista, recado', 
                "NULL, '".$nome."', '".$musica."', '".$artista."', '".$recado."'");
        return $this->funcionou();
    }
    
    private function getExtIMG($type){
        $img = explode('/', $type);
        $last = count($img)-1;
        if ($img[0]=='image') return $img[$last];
            else return '';
    }
    public function cadIntegrante($FilesFoto, $nome, $descricao){
        if ($this->getExtIMG($FilesFoto['type'])=='') return FALSE;
         else{
            $destino = 'img/'.$this->nomeAleatorio().'.'.$this->getExtIMG($FilesFoto['type']);
            $caminho = $FilesFoto['tmp_name'];
            move_uploaded_file($caminho, $destino);
            $nome = str_replace("'", '', $nome);
            $descricao = str_replace("'", '', $descricao);
            $this->inserir('integrantes', 'id, imagem, nome, descricao', "NULL, '".$destino."', '".$nome."', '".$descricao."'");
            return $this->funcionou();
         }
    }
    
    public function cadPagina($nome, $conteudo){
        $nome = str_replace("'", '', $nome);
        $conteudo = str_replace("'", '', $conteudo);
        $this->inserir('paginas', 'id, nome, conteudo, inicial, ordem_menu', "NULL, '".$nome."', '".$conteudo."', '0', 10");
        return $this->funcionou();
    }
    
    // Select
    public function verPedidos(){
        $this->busca('id, nome, musica, artista, recado', 'pedidos', 'ORDER BY id');
        $arr = array();
        while ($pedido = mysql_fetch_array($this->resultado)) {
            $arr[] = array(
                'id'      => $pedido['id'],
                'nome'    => $pedido['nome'],
                'musica'  => $pedido['musica'],
                'artista' => $pedido['artista'],
                'recado'  => $pedido['recado']
            );
        }
        return $arr;
    }
    
    public function verIntegrantes(){
        $this->busca('id, imagem, nome, descricao', 'integrantes', 'ORDER BY nome');
        $arr = array();
        while (($integrante = mysql_fetch_array($this->resultado))){
            $arr[] = array(
                'id'        => $integrante['id'],
                'imagem'    => $integrante['imagem'],
                'nome'      => $integrante['nome'],
                'descricao' => $integrante['descricao']
            );
        }
        return $arr;
    }
    
    public function verPaginas(){
        $this->busca('id, nome, conteudo, inicial, ordem_menu', 'paginas', 'ORDER BY ordem_menu');
        $arr = array();
        while ($pagina = mysql_fetch_array($this->resultado)) {
            $arr[] = array(
                'id'           => $pagina['id'],
                'nome'         => $pagina['nome'],
                'conteudo'     => $pagina['conteudo'],
                'inicial'      => $pagina['inicial'],
                'ordem_menu'   => $pagina['ordem_menu']
            );
        }
        return $arr;
    }
    
    public function buscaConteudo($id){
        $this->busca('conteudo', 'paginas', 'WHERE id='.$id);
        $pagina = mysql_fetch_array($this->resultado);
        return $pagina['conteudo'];
    }
    
    public function buscaPagina($id){
        $this->busca('id, nome, conteudo', 'paginas', 'WHERE id='.$id);
        $pagina = mysql_fetch_object($this->resultado);
        return $pagina;
    }
    
    public function buscaIntegrante($id){
        $this->busca('id, nome, imagem, descricao', 'integrantes', 'WHERE id='.$id);
        if ($this->linhas()==0) return FALSE;
            else{
                $rowIntegrante = mysql_fetch_object($this->resultado);
                return $rowIntegrante;
            }
    }

    public function buscaPaginaInicial(){
        $this->busca('id, conteudo', 'paginas', "WHERE inicial='1'");
        if ($this->linhas()==0) return FALSE;
            else{
                if ($this->linhas()>1){
                    $this->alterar('paginas', "inicial='0'", "WHERE inicial='1'");
                    return FALSE;
                } else {
                    $inicial = mysql_fetch_object($this->resultado);
                    return $inicial->conteudo;
                }
            }
    }

    // Update
    public function altIntegrante($id, $nome, $descricao){
        $nome = str_replace("'", '', $nome);
        $descricao = str_replace("'", '', $descricao);
        $this->alterar('integrantes', "nome='".$nome."', descricao='".$descricao."'", 'WHERE id='.$id);
        return $this->funcionou();
    }
    
    public function altImagem($FilesFoto, $id){
        if ($this->getExtIMG($FilesFoto['type'])=='') return FALSE;
         else{
            
            // Busca e deleta a imagem anterior
            $integrante = $this->buscaIntegrante($id);
            unlink($integrante->imagem);
          
            // Envia imagem e retorna resultado
            $destino = 'img/'.$this->nomeAleatorio().'.'.$this->getExtIMG($FilesFoto['type']);
            $caminho = $FilesFoto['tmp_name'];
            if (move_uploaded_file($caminho, $destino)){
                // Salva em banco
                $this->alterar('integrantes', "imagem='$destino'", 'WHERE id='.$id);
                return $this->funcionou();
            } else return FALSE;
         }
    }

    public function altPagina($id, $nome, $conteudo){
        $nome = str_replace("'", '', $nome);
        $conteudo = str_replace("'", '', $conteudo);
        $this->alterar('paginas', "nome='".$nome."', conteudo='".$conteudo."'", 'WHERE id='.$id);
        return $this->funcionou();
    }
    
    public function altPaginaInicial($id){
        $this->alterar('paginas', "inicial='0'", "WHERE inicial='1'");
        if ($id==0) return TRUE;
            else{
                $this->alterar('paginas', "inicial='1'", 'WHERE id='.$id);
                return $this->funcionou();
            }
    }
    
    public function altOrdem_menuPagina($pg, $num){
        $this->alterar('paginas', 'ordem_menu='.$num, 'WHERE id='.$pg);
        return $this->funcionou();
    }
    
    // Delete
    public function delPedido($id){
        $this->deletar('pedidos', 'WHERE id='.$id);
        return $this->funcionou();
    }
    
    public function delTodosOsPedidos(){
        $this->deletar('pedidos', 'WHERE id>0');
        return $this->funcionou();
    }
    
    public function delIntegrante($id){
        $this->busca('imagem', 'integrantes', 'WHERE id='.$id);
        if ($this->linhas()!=0){
            $buscaIntegrante = mysql_fetch_object($this->resultado);
            if (!unlink($buscaIntegrante->imagem)) return FALSE;
                else{
                    $this->deletar('integrantes', 'WHERE id='.$id);
                    return $this->funcionou();
                }
        } else return FALSE;
    }
    
    public function delPagina($id){
        $this->deletar('paginas', 'WHERE id='.$id);
        return $this->funcionou();
    }
    
}

?>
