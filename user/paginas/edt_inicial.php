<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
    
    require_once '../../classes/Control.php';
    $sql = new Control();
    
    $pgID = $_GET['pgID'];
    
    if (!$sql->altPaginaInicial($pgID)) echo '<h3>ERRO</h3>';

?>