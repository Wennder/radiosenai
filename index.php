<?php
    require_once 'classes/Sessao.php';
    $sessao = new Sessao();
    $sessao->sair();
    require_once 'classes/Control.php'; 
    $sql = new Control();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/botoes.css">
        <link rel="stylesheet" type="text/css" href="css/divs.css">
        <link rel="shortcut icon" href="img/favicon.ico">
        <title>Rádio Senai</title>
        <script src="js/jquery.js"></script>
        <script type="text/javascript">
            // Funções para android
                function android() {
                        navegadorTotal = navigator.userAgent.toLowerCase();	
                        //Confere se é iphone, ipod e ipad, android, symbian, mobile
                        if(navegadorTotal.indexOf("iphone") != "-1" ||
                        navegadorTotal.indexOf("ipad") != "-1" ||
                        navegadorTotal.indexOf("ipod") != "-1" ||
                        navegadorTotal.indexOf("android") != "-1" ||
                        navegadorTotal.indexOf("j2me") != "-1" ||
                        navegadorTotal.indexOf("nokia") != "-1" ||
                        navegadorTotal.indexOf("symbianos") != "-1" ||
                        navegadorTotal.indexOf("opera mini") != "-1" ||
                        navegadorTotal.indexOf("mobile") != "-1" ||
                        navegadorTotal.indexOf("mobi") != "-1"){
                            return false;// Mudar para true
                        }else{
                            return false;
                        }
                }
                function loadCSS(url) {
                    var lnk = document.createElement('link');
                    lnk.setAttribute('type', "text/css" );
                    lnk.setAttribute('rel', "stylesheet" );
                    lnk.setAttribute('href', url );
                    document.getElementsByTagName("head").item(0).appendChild(lnk);
                }

                if (android()){
                    loadCSS('css/estilo_mobile.css');
                    $('#esquerda').hide();
                } else {
                    loadCSS('css/estilo.css');
                }

                function menu(){
                    $('#esquerda').show();
                }
            // Funções gerais
                // Functions login
                    var fundo = false;
                    function fundo_preto(){
                        if (fundo==false){
                            $('#fundo-preto').fadeIn(500);
                            fundo = true;
                        } else {
                            $('#fundo-preto').fadeOut(500);
                            fundo = false;
                        }
                    }

                    var l = false;
                    function login(){
                        fundo_preto();
                        if (l==false){
                            $('#login').fadeIn(500);
                            $('#campo_login').focus();
                            l = true;
                        } else {
                            $('#login').fadeOut(500);
                            l = false;
                        }
                    }                
                // Login
                $(document).on('keypress', function(e){
                    if(e.which==12){
                        login();
                    }
                });    
        </script>
    </head>
    <body>
        <div id="fundo-preto"></div>
        <script type="text/javascript">$('#fundo-preto').fadeOut(0);</script>
            <div id="login">
                <form action="user/" method="post">
                    <h1> Área Restrita </h1>
                    <table>
                        <tr>
                            <td>
                                Usuário:
                            </td>
                            <td>
                                <input type="text" class="text" id="campo_login" name="usuario_login" style="width: 151px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Senha:
                            </td>
                            <td>
                                <input type="password" class="text" name="usuario_senha" style="width: 151px;">
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Acessar" name="user_login_try" class="btn-verde">
                    <input type="reset" value="Cancelar" class="btn-vermelho" onclick="login()">
                </form>
            </div>
            <script type="text/javascript">$('#login').fadeOut(0);</script>
        <div id="all">
            
            <div id="header">
                <img src="img/logo.png">
                 <div class="tnav">
                     
                <?php
                    $paginas = $sql->verPaginas();
                    foreach ($paginas as $pagina){
                        echo '
                                <a href="?pg='.$pagina['id'].'">
                                    '.$pagina['nome'].'
                             ';
                    }
                ?> 
                 <a href="?pg=integrantes">
                    Integrantes
                </a>
                <a href="?pg=radio">
                    Ouça nossa rádio
                </a>
                <a href="?pg=pedido">
                    Pedido online
                </a>
                </div>
            </div>
            
            <div id="direita" class="direita">
                <?php
                    if (isset($_GET['pg'])){
                        $pagina = $_GET['pg'];
                        if ($pagina>0) echo $sql->buscaConteudo($pagina);
                            else {
                                $pagina = 'paginas/'.$pagina.'.php';
                                if (is_file($pagina)){
                                    include_once $pagina;
                                } else echo '<h1>Erro 404</h1><br /><h2>Página não existente</h2>';
                        }
                    } else {
                        $inicial = $sql->buscaPaginaInicial();
                        if (!$inicial){
                            // Caso não tiver página inicial, uma randomica é aberta
                            $pg = $sql->verPaginas();
                            if (count($pg)==0) include_once 'paginas/pedido.php';
                                else {
                                    $PgParaAbrir = rand(0, count($pg)-1);
                                    echo $pg[$PgParaAbrir]['conteudo'];
                                }
                        } else echo $inicial;
                    }
                ?>
            </div>
        </div>
        <div id="clear"></div>
    </body>
</html>