<?php

class FiltroTexto {
    
    private $texto       = NULL;
    private $novoTexto   = NULL;
    private $filtros     = array();
    
    public function __construct($http = NULL, $https = NULL) {
        if (!is_bool($http)) $http = FALSE;
        if (!is_bool($https)) $https = FALSE;
        $this->filtros = array(
            'http'  => $http,
            'https' => $https
        );
    }
    
    private function filtroLinkHttp(){
        $exp = 'http://';
        $expHttp = explode($exp, $this->texto);
        $links = count($expHttp);
        $this->novoTexto = '';
        if ((substr($this->novoTexto, 0, strlen($exp)))!=$exp) $this->novoTexto .= $expHttp[0];
        for ($i = 1; $i<$links; $i++){
            $string = explode(' ', $expHttp[$i]);
            $link = $string[0];
            $this->novoTexto .= '<a href="'.$link.'">'.$link.'</a>';
            $count = count($string);
            for ($j = 1; $j<$count; $j++){
                $this->novoTexto .= ' '.$string[$j];
            }
        }
        $this->texto = $this->novoTexto;
    }
    
    private function filtroLinkHttps(){
        $string = 'https://';
        $expHttp = explode($string, $this->texto);
        $this->novoTexto = '';
        $links = count($expHttp);
        if ((substr($this->novoTexto, 0, strlen($string)))!=$string) $this->novoTexto .= $expHttp[0];
        unset($string);
        for ($i = 1; $i<$links; $i++){
            $string = explode(' ', $expHttp[$i]);
            $link = $string[0];
            $this->novoTexto .= '<a href="'.$link.'">'.$link.'</a>';
            $count = count($string);
            for ($j = 1; $j<$count; $j++){
                $this->novoTexto .= ' '.$string[$j];
            }
        }
        $this->texto = $this->novoTexto;
    }
    
    public function filtrarTexto($texto = NULL){
        $this->texto = $texto;
        if ($this->filtros['http']) $this->filtroLinkHttp();
        if ($this->filtros['https']) $this->filtroLinkHttps();
    }
    
    public function escreverTexto(){
        echo $this->texto;
    }
    
}

?>
