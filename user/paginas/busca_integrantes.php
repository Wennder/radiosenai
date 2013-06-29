<?php    
    require_once '../../classes/Control.php';
    $sql = new Control(); 
    if (isset($_GET['admin'])){
        ?>
        <script type="text/javascript">
            function editar_integrante(id){
                $('#proc_int').html('<img src="../img/carregando.gif">');
                $.get('paginas/edt_integrante.php', {id: id}, function(form){
                    $('#proc_int').slideToggle(600, function(){
                        $('#proc_int').html(form);
                        $('#proc_int').slideToggle(600);
                    });
                });
            }
            function editar_imagem_integrante(id){
                $('#proc_int').html('<img src="../img/carregando.gif">');
                $.get('paginas/edt_imagem.php', {id: id}, function(form){
                    $('#proc_int').slideToggle(600, function(){
                        $('#proc_int').html(form);
                        $('#proc_int').slideToggle(600);
                    });
                });
            }
            function delIntegrante(id){
                var c = confirm('Tem certeza que deseja deletar esse Integrante?');
                if (c==true){
                    window.location = '?pg=integrantes&id='+id;
                }
            }
        </script>
        <?php
    }
    $integrantes = $sql->verIntegrantes();
    
    $clear = FALSE;
    foreach ($integrantes as $integrante) {
        ?>
        <div style="<?php echo isset($_GET['admin']) ? 'width: 48%; float: left;':'';?>  text-align: left; margin-top: 20px;">
            <img src="<?php if (!isset($_GET['admin'])) echo 'user/'; echo $integrante['imagem']; ?>" class="img_integrante" style="float: left; margin-right: 10px;">
                <b>Nome:</b>
            <?php echo $integrante['nome']; ?>
            <br /><br />
            <b>Descrição:</b>
                <p>
                    <?php echo $integrante['descricao']; ?>
                </p>
            <?php
            if (isset($_GET['admin'])){
                ?>
                <div>
                    <button class="button green" onclick="editar_imagem_integrante(<?php echo $integrante['id']; ?>);" style="padding-left: 15.5px; padding-right: 15.5px;">
                        Alt. Imagem
                    </button>
                    <button class="button blue" onclick="editar_integrante(<?php echo $integrante['id']; ?>)" style="margin-top: 5px; margin-right: -5px;">
                        Editar
                    </button>
                    <button class="button red" onclick="delIntegrante(<?php echo $integrante['id']; ?>);">
                        X
                    </button>
                </div>
                <?php
            }
            ?>
        </div>
<?php 
        if (isset($_GET['admin'])){
            if ($clear){
                echo '<br id="clear" />';
                $clear = FALSE;
            } else $clear = TRUE;
        } else echo '<br id="clear" />';
    } 
?>
<br id="clear" />