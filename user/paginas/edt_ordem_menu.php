<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
    
    require_once '../../classes/Control.php';
    $sql = new Control();
    
    $pgID   = $_GET['pgID'];
    $nOrdem = $_GET['nOrdem'];
    
    if (!$sql->altOrdem_menuPagina($pgID, $nOrdem)) echo '<h3>Erro</h3>';
    
?>
