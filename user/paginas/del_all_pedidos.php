<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
    
    require_once '../../classes/Control.php';
    $sql = new Control();
    echo '<h3>';
    if ($sql->delTodosOsPedidos()) {
        echo 'Pedidos deletados com sucesso';
        $deu = TRUE;
    } else {
        echo 'Erro ao deletar pedidos';
        $deu = FALSE;
    }
    echo '</h3>';
    if ($deu){
?>
    <script type="text/javascript">
        $('#pedidos').fadeOut(500, function(){
            $('#pedidos').load('paginas/busca_pedidos.php', function(){
                $('#pedidos').fadeIn(500);
            });
        });
    </script>
<?php } ?>

