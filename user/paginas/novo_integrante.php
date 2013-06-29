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
        width: 496px;
        height: 150px;
        margin-left: 20px;
        resize: vertical;
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
    <label>Novo integrante</label>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
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
                    <input type="button" onclick="javascript: $('#inputFile').trigger('click');" value="Selecionar foto para integrante" class="btn-cinza">
                    <br /><br />
                    <label id="imgNome" style="margin: 0 auto;">Nenhuma imagem selecionada</label>
                </td>
            </tr>
        </table><br />
        <input type="submit" name="form_novo_integrante" value="Cadastrar" class="btn-verde">
        <input type="reset" value="Cancelar" class="btn-vermelho" onclick="fechar_novo_integrante();">
    </form>
</div>