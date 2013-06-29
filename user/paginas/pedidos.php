<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    }
?>
<script type="text/javascript">
    function delAllPed(){
        var x = confirm('Deseja mesmo deletar todos os pedidos?');
        if (x==true){
            $('#proc_pedido').html('<img src="../img/carregando.gif">');
            $('#proc_pedido').load('paginas/del_all_pedidos.php');
        }
    }
    var last = '';
    function verMais(btn){
        $('#pdVerMais'+last).hide(400);
        if (last != btn.value){
            last = btn.value;
            $('#pdVerMais'+btn.value).show(400);
        } else last = '';
    }
    function delPedido(btn){
        var x = confirm('Deseja mesmo deletar o pedido?');
        if (x==true){
            $('#proc_pedido').html('<img src="../img/carregando.gif">');
            $.get('paginas/del_pedido.php', {id: btn.value}, function(res){
                $('#proc_pedido').slideUp(400, function(){
                    $('#proc_pedido').html(res);
                    $('#proc_pedido').slideDown(400);
                });
            });
        }
    }
    function verPedidos(){
        $('#pedidos').slideToggle(500, function(){
            $('#pedidos').html('<img src="../img/carregando.gif">')
            $('#pedidos').slideToggle(500, function(){
                $.get('paginas/busca_pedidos.php', function(busca){
                    $('#pedidos').slideToggle(500, function(){
                        $('#pedidos').html(busca);
                        $('#pedidos').slideToggle(500);
                    });
                    
                });
            });
        });
    }
    $(document).ready(function(){
        verPedidos();
    });
</script>
<style>
    h1{
        float: left;
    }
    #btnDelAll{
        float: left;
        margin-top: 26px;
        margin-left: 35px;
    }
    #btnAtualizar{
        float: left;
        margin-top: 26px;
        margin-left: 20px;
    }
    #proc_pedido{
        text-align: center;
    }
    #pedidos{
        text-align: center;
    }
    table{
        width: 100%;
        text-align: center;
    }
</style>
    <h1>Pedidos</h1>
    <button id="btnDelAll" onclick="delAllPed()" class="btn-preto">Deletar todos os pedidos</button>
    <button id="btnAtualizar" onclick="verPedidos()" class="btn-verde">Atualizar</button>
    <br id="clear" />
    <div id="proc_pedido"></div>
    <div id="pedidos"></div>