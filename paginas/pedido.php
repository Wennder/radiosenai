<?php
    $arqSessao = '../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
    require_once 'classes/Control.php';
    $sql = new Control();
    if (isset($_POST['pedido'])){
        extract($_POST);
            if (empty($nome)) echo '<p class="error">Preencha o campo Nome!</p>';
        elseif (empty($musica)) echo '<p class="error">Preencha o campo Música!</p>';
        elseif (empty($recado)) echo '<p class="error">Preencha o campo Recado</p>';
        elseif ($sql->cadPedido($nome, $musica, $artista, $recado)){
            ?>
                <script src="jquery.js"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                        window.location = '?pg=pedido&msg';
                    });
                </script>
            <?php
        } else {
            echo '<p class="error">Erro ao cadastrar</p>';
        }
    }
    if (isset($_GET['msg'])) echo '<h2>Pedido feito com sucesso</h2>';
    extract($_POST);
?>
                <style>
                    .textT{
                        width: 500px;
                        padding: 0;
                    }
                    textArea{
                        height: 100px;
                        resize: vertical;
                    }
                    .tableP{
                        margin: 0 auto;
                    }
                    .tableP tr td{
                        font-weight: bold;
                        width: 130px;
                        text-align: left;
                    }
                    .form{
                        text-align: center;
                    }
                </style>
                <form method="post" class="form" action="?pg=pedido">
                    <h2>Faça seu pedido:</h2>
                    <table class="tableP">
                        <tr>
                            <td>
                                Seu Nome:
                            </td>
                            <td>
                                <input value="<?php if (isset($nome)) echo $nome; ?>" type="text" name="nome" class="text textT" maxlength="40">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nome da Música:
                            </td>
                            <td>
                                <input value="<?php if (isset($musica)) echo $musica; ?>" type="text" name="musica" class="text textT" maxlength="40">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nome do Artista:
                            </td>
                            <td>
                                <input value="<?php if (isset($artista)) echo $artista; ?>" type="text" name="artista" class="text textT" maxlength="40">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Seu Recado:
                            </td>
                            <td>
                                <textarea name="recado" class="text textT" maxlength="400"><?php if (isset($recado)) echo $recado; ?></textarea>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" class="btn-verde" value="Enviar" name="pedido">
                    <input type="reset" class="btn-vermelho" onclick="window.location = '?'" value="Cancelar">
                </form><br /><br /><br />