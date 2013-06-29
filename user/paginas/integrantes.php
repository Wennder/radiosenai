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
    h1{
        float: left;
    }
    #novo_int{
        float: right;
        margin-right: 35px;
    }
    #proc_int{
        text-align: center;
    }
    #busca_integrantes{
        text-align: center;
    }
    #intss{
        margin: 0 auto;
    }
</style>
<script type="text/javascript">
    function novo_int(){
        $('#proc_int').html('<img src="../img/carregando.gif">');
        $.get('paginas/novo_integrante.php', {}, function(form){
            $('#proc_int').slideToggle(500, function(){
                $('#proc_int').html(form);
                $('#proc_int').slideToggle(500);                
            });
        });
    }
    function busca_int(){
        $('#busca_integrantes').html('<img src="../img/carregando.gif">');
        $.get('paginas/busca_integrantes.php', {admin: 1}, function(result){
            $('#busca_integrantes').slideToggle(500, function(){
                $('#busca_integrantes').html(result);
                $('#busca_integrantes').slideToggle(500);
            });
        });
    }
    $(document).ready(function(){
        busca_int();
    });
</script>
<h1>
    Integrantes da rádio
</h1>
<button onclick="novo_int();" class="button blue" id="novo_int">
    Novo integrante
</button>
<br id="clear"/>
<div id="proc_int">
    <?php
        if (isset($_GET['id'])) {
            if ($sql->delIntegrante($_GET['id'])) echo '<h3>Integrante deletado com sucesso</h3>';
                else '<h3>Erro ao deletar Integrante</h3>';
                
        } elseif (isset($_POST['form_edt_integrante'])){
            $id        = $_POST['id_integrante'];
            $nome      = $_POST['nome_integrante'];
            $descricao = $_POST['desc_integrante'];
            if (!empty($nome)){
                if (!empty($descricao)){
                    if ($sql->altIntegrante($id, $nome, $descricao)) echo '<h3>Integrante alterado com sucesso</h3>';
                        else echo '<h3>Erro ao alterar integrante</h3>';
                } else echo '<h3>A descrição é obrigatória</h3>';
            } else echo '<h3>O nome é obrigatório</h3>';
            
        } elseif (isset($_POST['form_edt_imagem'])){
            $foto = $_FILES['foto_integrante'];
            $id = $_POST['id_integrante'];
            if (is_file($foto['tmp_name'])){
                if ($sql->altImagem($foto, $id)){
                    echo '<h3>Imagem do integrante alterada com sucesso</h3>';
                } else echo '<h3>Erro ao alterar imagem do integrante</h3>';
            } else echo '<h3>Nenhuma imagem foi selecionada</h3>';
            
        } elseif (isset($_GET['msg'])) echo '<h2>Integrante cadastrado com sucesso</h2>';
    ?>
</div>
<?php
    if (isset($_POST['form_novo_integrante'])){
        $nome = $_POST['nome_integrante'];
        $descricao = $_POST['desc_integrante'];
        $foto = $_FILES['foto_integrante'];
        if (!empty($nome)){
            if (!empty($descricao)){
                if (is_file($foto['tmp_name'])){
                    if ($sql->cadIntegrante($foto, $nome, $descricao)) {
                        echo '
                             <script type="text/javascript">
                                 window.location = "?pg=integrantes&msg";
                             </script>
                             ';
                    } else echo '<h2>Erro ao cadastrar integrante</h2>';
                } else echo '<h2>Nenhuma imagem foi selecionada</h2>';
            } else echo '<h2>O campo descrição é obrigatório</h2>';
        } else echo '<h2>O campo nome é obrigatório</h2>';
    }
?>
<hr>
<div id="busca_integrantes"></div>