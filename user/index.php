<?php
    require_once '../classes/Sessao.php';
    $sessao = new Sessao();
    if (isset($_POST['user_login_try'])) $sessao->entrar($_POST['usuario_login'], $_POST['usuario_senha']);
    if (isset($_GET['sair'])) $sessao->sair();
    $sessao->bloqueio();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/botoes.css">
        <link rel="stylesheet" type="text/css" href="../css/divs.css">
        <link rel="shortcut icon" href="../img/favicon.ico">
        <title>Rádio Senai - Área restrita</title>
        <script src="../jquery.js"></script>
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
                    loadCSS('../css/estilo_mobile.css');
                    $('#esquerda').hide();
                } else {
                    loadCSS('../css/estilo.css');
                }

                function menu(){
                    $('#esquerda').show();
                }
            // Funções gerais
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
            $(document).ready(function(){
                $('#fundo-preto').fadeOut(0);
            });
        </script>
    </head>
    <body>
        <div id="fundo-preto"></div>
        <div id="all">
            <div id="esquerda">
                <img src="../img/senai.png"><br />
                <a href="?pg=inicio">
                    Início
                </a><br />
                <a href="?pg=paginas">
                    Páginas
                </a><br />
                <a href="?pg=integrantes">
                    Integrantes
                </a><br />
                <a href="?pg=pedidos">
                    Pedidos
                </a><br />
                <a href="?sair">
                    Sair
                </a>
            </div>
            <div id="direita">
                <img src="../img/logo.png">
            </div><div id="direita" class="direita">
                <?php
                    if (isset($_GET['pg'])) $pagina = $_GET['pg'];
                        else $pagina = 'inicio';
                        $pagina = 'paginas/'.$pagina.'.php';
                    if (is_file($pagina)){
                        include_once $pagina;
                    } else echo '<h1>Erro 404</h1><br /><h2>Página não existente</h2>';
                    
                ?>
            </div>
        </div>
        <div id="clear"></div>
    </body>
</html>