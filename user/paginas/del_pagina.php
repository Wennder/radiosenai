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
    if ($sql->delPagina($id)){
        ?>
        <h3>Página deletada</h3>
            <script type="text/javascript">
                $('#pagina<?php echo $id; ?>').toggle(800);
            </script>
        <?php
    } else {
        echo 'Erro ao deletar página';
    }
?>