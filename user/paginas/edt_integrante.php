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
    $integrante = $sql->buscaIntegrante($id);
    if ($integrante == FALSE) die ('<h1>Erro</h1>');
?>
<style>
    table{
        margin: 0 auto;
    }
    table tr td input{
        width: 500px;
        margin-left: 20px;
        padding: 0;
    }
    table tr td textarea{
        width: 500px;
        height: 150px;
        margin-left: 20px;
        resize: vertical;
    }
</style>
<script type="text/javascript">
    function fechar_edt_integrante(){
        $('#proc_int').slideToggle(500, function(){
            $('#proc_int').html('');
            $('#proc_int').fadeIn(0);
        });
    }
</script>
<hr>
<div class="form">
    <form action="?pg=integrantes" method="post">
        <h2>Editar Integrante</h2>
        <table>
            <tr>
                <td>
                    Nome:
                </td>
                <td>
                    <input type="text" maxlength="40" value="<?php echo $integrante->nome; ?>" name="nome_integrante" class="text">
                </td>
            </tr>
            <tr>
                <td>
                    Descrição:
                </td>
                <td>
                    <textarea maxlength="500" class="text" name="desc_integrante"><?php echo $integrante->descricao; ?></textarea>
                </td>
            </tr>
            <tr>
        </table><br />
        <input type="hidden" name="id_integrante" value="<?php echo $integrante->id; ?>">
        <input type="submit" name="form_edt_integrante" value="Salvar" class="button medium green">
        <input type="reset" value="Cancelar" class="button medium red" onclick="fechar_edt_integrante();">
    </form>
</div>