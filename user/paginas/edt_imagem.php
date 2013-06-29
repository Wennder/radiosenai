<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
    
    require_once '../../classes/Control.php';
    $sql = new Control();
    $integrante = $sql->buscaIntegrante($_GET['id']);
    if ($integrante == FALSE) die ('<h1>Erro</h1>');
    
    
?>
<script type="text/javascript">
    function fechar_edt_imagem(){
        $('#proc_int').slideToggle(500, function(){
            $('#proc_int').html('');
            $('#proc_int').fadeIn(0);
        });
    }
    $(document).ready(function(){
        $('#inputFile').hide();
        
        $('#form_edt_imagem').submit(function(){
            var c = confirm('Tem certeza que deseja alterar para a foto para '+$('#inputFile').val());
            return c;
        });
        
        $('#inputFile').on({
            change: function(){
                $('#imgNome').html($('#inputFile').val());
            }
        });
    });
</script>
<div class="form">
    <label>Edição de imagem de integrante</label>
    <form action="?pg=integrantes" method="post" id="form_edt_imagem" enctype="multipart/form-data" style="text-align: center;">
        <b>Foto atual:</b><br />
        <img src="<?php echo $integrante->imagem; ?>" class="img_integrante"><br />
        <input type="file" name="foto_integrante" id="inputFile">
        <input type="button" onclick="javascript: $('#inputFile').trigger('click');" value="Selecionar foto para integrante" class="btn-cinza">
        <br /><br />
        <label id="imgNome" style="margin: 0 auto;">Nenhuma imagem selecionada</label>
        <br /><br />
        <input type="hidden" name="id_integrante" value="<?php echo $integrante->id; ?>">
        <input type="submit" name="form_edt_imagem" value="Salvar" class="btn-verde">
        <input type="reset" value="Cancelar" class="btn-vermelho" onclick="fechar_edt_imagem();">
    </form>
</div>