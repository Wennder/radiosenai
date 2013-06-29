<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
    
    require_once '../classes/Control.php';
    $sql = new Control();
?>
<style>
    #proc_pagina{
        text-align: center;
        width: 100%;
    }
    h1{
        float: left;
    }
    #nova_pagina{
        float: right;
    }
    .paginaInicial{
        float: left;
        margin-bottom: 30px;
        font-size: 20px;
        font-weight: bold;
    }
    #paginaInicial{
        float: left;
        margin-bottom: 30px;
        margin-left: 10px;
        padding: 5px;
    }
</style>
<script type="text/javascript">
    function nova_pagina(){
        $('#proc_pagina').html('<img src="../img/carregando.gif">');
        $('#proc_pagina').slideToggle(0);
        $('#proc_pagina').slideToggle(500);
        $('#proc_pagina').load('paginas/nova_pagina.php');
    }
    function editar_pagina(btn){
        $('#proc_pagina').html('<img src="../img/carregando.gif">');
        $.get('paginas/edt_pagina.php', {id: btn.value}, function(edt){
            $('#proc_pagina').slideToggle(500, function(){
                $('#proc_pagina').html(edt);
                $('#proc_pagina').slideToggle(500);
            });
        });
    }
    function deletar_pagina(btn){
        x = confirm('Tem certeza que quer deletar a página?');
        if (x==true){
            $('#proc_pagina').html('<img src="../img/carregando.gif">');
            $.get('paginas/del_pagina.php', {id: btn.value}, function(res){
                $('#proc_pagina').slideToggle(500, function(){
                    $('#proc_pagina').html(res);
                    $('#proc_pagina').slideToggle(500);
                });
            });
        }
    }
    function paginaInicial(){
        var pgID = $('#paginaInicial option:selected').val();
        $.get('paginas/edt_inicial.php', {pgID: pgID}, function(res){
            $('#msgErro').html(res);
        });
    }
    function mudarOrdem(pgID, nOrdem){
        $.get('paginas/edt_ordem_menu.php', {pgID: pgID, nOrdem: nOrdem}, function(res){
            $('#msgErro').html(res);
        })
    }
</script>
<h1>Páginas</h1>
<button onclick="nova_pagina();" id="nova_pagina" class="button blue">
    Nova Página
</button><br>
<hr>
<div id="proc_pagina">
    <?php
        if (isset($_POST['edt_pagina'])){
            $id = $_POST['id_pagina'];
            $nome = $_POST['nome_pagina'];
            $conteudo = $_POST['conteudo_pagina'];
            echo '<h3 style="text-align: center;">';
            if ($sql->altPagina($id, $nome, $conteudo)) echo 'Página "'.$nome.'" alterada com sucesso';
                else echo 'Erro ao alterar página';
            echo '</h3>';
        } elseif (isset($_POST['nova_pagina'])){
            $nome = $_POST['nome_pagina'];
            $conteudo = $_POST['conteudo_pagina'];
            echo '<h3 style="text-align: center;">';
            if ($sql->cadPagina($nome, $conteudo)) echo 'Página "'.$nome.'" cadastrada com sucesso';
                else echo 'Erro ao cadastrar página';
            echo '</h3>';
        }
    ?>
</div>
<label class="paginaInicial">
    Página Inicial: 
</label>
    <select id="paginaInicial" class="text" onchange="paginaInicial();">
        <option value="0">Aleatória</option>
        <?php
            $pgs = $sql->verPaginas();
            foreach ($pgs as $pg) {
                echo '<option value="'.$pg['id'].'"';
                if ($pg['inicial']) echo ' SELECTED';
                echo '>'.$pg['nome'].'</option>';
            }
        ?>
    </select>
<div id="msgErro" class="paginaInicial"></div>
    <?php
    $pgs = $sql->verPaginas();
    echo '<table style="width: 100%; font-weight: bold;">';
    foreach ($pgs as $pg) {
        ?>
        <tr id="pagina<?php echo $pg['id']; ?>">
            <td>
                <?php echo $pg['nome']; ?>
            </td>
            <td>
                Ordem no menu: 
                <select onchange="mudarOrdem(<?php echo $pg['id']; ?>, this.value);" class="text">
                    <option value="10"></option>
                    <?php
                    for ($i = 1; $i<10; $i++){
                        echo '<option value="'.$i.'"';
                        if (($pg['ordem_menu'])==$i) print ' SELECTED';
                        echo '>'.$i.'</option>';
                    }
                    ?>
                </select>
            </td>
            <td style="width: 165px;">
                <button onclick="editar_pagina(this);" class="button blue" value="<?php echo $pg['id']; ?>">
                    Editar
                </button>
                <button onclick="deletar_pagina(this);" class="button red" value="<?php echo $pg['id']; ?>">
                    Deletar
                </button>
            </td>
        </tr>
        <?php
    }
    echo '</table>';
?>