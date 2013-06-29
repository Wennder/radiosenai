<?php
    $arqSessao = '../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
?>
<center>
<h2>Heading</h2>
<p>RADIO AQUI !</p>
</center>