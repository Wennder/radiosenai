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
<p><audio controls="controls" autoplay="true" src="http://thalesog.no-ip.info:8000/;"></audio></p>
</center>