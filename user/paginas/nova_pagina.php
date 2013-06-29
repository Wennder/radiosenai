<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
?>
<style>
    .nova_pagina{
        margin-bottom: 30px;
    }
        .nova_pagina label{
            font-size: 22px;
            border: black solid 1px;
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
            font-weight: bold;
            border-radius: 2px 2px 0 0;
        }
        .nova_pagina form{
            border: black solid 1px;
            border-radius: 2px;
            padding-bottom: 15px;
            margin-top: 9px;
        }
        .nova_pagina table{
            text-align: left;
            font-weight: bold;
            margin: 0 auto;
            margin-top: 10px;
        }
        .nova_pagina table input{
            width: 300px;
            margin-left: 15px;
        }
        .nova_pagina table textArea{
            width: 500px;
            height: 300px;
            margin-left: 15px;
            resize: vertical;
        }
</style>
<script type="text/javascript">
    function cancelNovaPagina(){
        $('#proc_pagina').slideToggle(800, function(){
            $('#proc_pagina').html('');
            $('#proc_pagina').fadeIn(0);
        });
    }
</script>
<div class="nova_pagina">
    <label>
        Cadastro de página
    </label>
    <form action="" method="post" class="edt_pagina">
        <table>
            <tr>
                <td>
                    Nome da página:
                </td>
                <td>
                    <input type="text" name="nome_pagina" class="text" maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    Conteúdo da página:
                </td>
                <td>
                    <textarea class="text" name="conteudo_pagina" maxlength="10000"></textarea>
                </td>
            </tr>
        </table>
        <input type="submit" name="nova_pagina" value="Cadastrar" class="btn-verde">
        <input type="reset" value="Cancelar" onclick="cancelNovaPagina()" class="btn-vermelho">
    </form>
</div>