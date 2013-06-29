<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
    
require_once '../../classes/Control.php';
$sql = new Control();
$pg = $sql->buscaPagina($_GET['id']);
?>
<style>
    .edt_pagina{
        margin-bottom: 30px;
    }
        .edt_pagina label{
            font-size: 22px;
            border: black solid 1px;
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
            font-weight: bold;
            border-radius: 2px 2px 0 0;
        }
        .edt_pagina form{
            border: black solid 1px;
            border-radius: 2px;
            padding-bottom: 15px;
            margin-top: 9px;
        }
        .edt_pagina table{
            text-align: left;
            font-weight: bold;
            margin-top: 10px;
            margin-left: 10px;
        }
        .edt_pagina table input{
            width: 300px;
            margin-left: 15px;
        }
        .edt_pagina table textArea{
            width: 500px;
            height: 300px;
            margin-left: 15px;
            resize: vertical;
        }
</style>
<script type="text/javascript">
    function cancelAltPagina(){
        $('#proc_pagina').slideToggle(800, function(){
            $('#proc_pagina').html('');
            $('#proc_pagina').fadeIn(0);
        });
    }
</script>
<div class="edt_pagina">
    <label>
        Edição de página
    </label>
    <form action="" method="post" class="edt_pagina">
        <table>
            <tr>
                <td>
                    Nome da página:
                </td>
                <td>
                    <input type="text" name="nome_pagina" value="<?php echo $pg->nome; ?>" class="text" maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    Conteúdo da página:
                </td>
                <td>
                    <textarea class="text" name="conteudo_pagina" maxlength="10000"><?php echo $pg->conteudo; ?></textarea>
                </td>
            </tr>
        </table>
        <input type="hidden" name="id_pagina" value="<?php echo $pg->id; ?>">
        <input type="submit" name="edt_pagina" value="Salvar" class="btn-verde">
        <input type="reset" value="Cancelar" onclick="cancelAltPagina()" class="btn-vermelho">
    </form>
</div>