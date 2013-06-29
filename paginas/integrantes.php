<?php
    $arqSessao = '../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
?>
<h1>Integrantes da Rádio</h1>
<div id="buscaIntegrantes" style="text-align: center;">
    <script type="text/javascript">
        $(document).ready(function(){
            $('#buscaIntegrantes').load('user/paginas/busca_integrantes.php');
        });
    </script>
</div>
