<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
?>
        <table>
            <?php
            require_once '../../classes/Control.php';
            $sql = new Control();
            $pedidos = $sql->verPedidos();
            $count = 0;
            foreach ($pedidos as $pd) {
                ?>
                <tr id="pd<?php echo $pd['id']; ?>" style="width: 10px;">
                    <td>
                        <?php echo '<b>'.$pd['musica'].' - </b>'.$pd['artista']; ?>
                    </td>
                    <td>
                        <button onclick="verMais(this);" class="btn-azul" value="<?php echo $pd['id']; ?>">
                            Ver Mais
                        </button>
                        <button onclick="delPedido(this);" class="btn-vermelho" value="<?php echo $pd['id']; ?>">
                            X
                        </button>
                    </td>
                </tr>
                <tr id="pdVerMais<?php echo $pd['id']; ?>">
                    <td>
                        <b>De: </b><?php echo $pd['nome']; ?>
                    </td>
                    <td>
                        <p style="width: 200px;">
                            <b>Recado: </b><?php echo $pd['recado']; ?>
                        </p>
                    </td>
                </tr>
                <script type="text/javascript">
                    $('#pdVerMais<?php echo $pd['id']; ?>').fadeOut(0);
                </script>
                <?php
                $count++;
            }
            ?>
        </table>
<?php if ($count==0) echo '<h4>Nenhum pedido pendente.</h4>'; ?>