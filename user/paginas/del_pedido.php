<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
    
    require_once '../../classes/Control.php';
    $sql = new Control();
    $id = $_GET['id'];
    echo '<h3>';
    if ($sql->delPedido($id)) echo 'Pedido deletado com sucesso';
        else echo 'Erro ao deletar pedido';
    echo '</h3>';
?>
<script type="text/javascript">
    $('#pd<?php echo $id; ?>').hide();
    $('#pdVerMais<?php echo $id; ?>').hide();
</script>