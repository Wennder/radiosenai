<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
?>
<style>
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
    .form{
    margin-bottom: 30px;
}
    .form label{
        font-size: 22px;
        padding: 10px;
        padding-left: 20px;
        padding-right: 20px;
        font-weight: bold;
    }
    .form form{
        padding-bottom: 15px;
        margin-top: 9px;
    }
    .form table{
        text-align: left;
        font-weight: bold;
        margin: 0 auto;
        margin-top: 10px;
    }
</style>
<script type="text/javascript">
    function fechar_novo_integrante(){
        $('#proc_int').slideToggle(500, function(){
            $('#proc_int').html('');
            $('#proc_int').fadeIn(0);
        });
    }
    $(document).ready(function(){
        $('#inputFile').hide();
        
        $('#inputFile').on({
            change: function(){
                $('#imgNome').html($('#inputFile').val());
            }
        });
    });
</script>
<div class="form">
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <h2>Novo integrante</h2>
            <tr>
                <td>
                    Nome:
                </td>
                <td>
                    <input type="text" maxlength="40" name="nome_integrante" class="text">
                </td>
            </tr>
            <tr>
                <td>
                    Descrição:
                </td>
                <td>
                    <textarea maxlength="500" class="text" name="desc_integrante"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Foto:
                </td>
                <td style="text-align: center;">
                    <input type="file" name="foto_integrante" id="inputFile">
                    <input type="button" onclick="javascript: $('#inputFile').trigger('click');" value="Selecionar foto para integrante" class="button black">
                    <br /><br />
                    <label id="imgNome" style="margin: 0 auto;">Nenhuma imagem selecionada</label>
                </td>
            </tr>
        </table><br />
        <input type="submit" name="form_novo_integrante" value="Cadastrar" class="button medium green">
        <input type="reset" value="Cancelar" class="button medium red" onclick="fechar_novo_integrante();">
    </form>
    <hr>
</div>