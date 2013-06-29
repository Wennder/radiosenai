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
        <link rel="shortcut icon" href="../img/favicon.ico">
        <title>Rádio Senai</title>
        <link rel="stylesheet" href="../css/fonts.css" type="text/css" charset="utf-8" />
		<!--[if lte IE 8]><script src="js/html5shiv.js" type="text/javascript"></script><![endif]-->
		<script src="../js/jquery-1.4.4.min.js"></script>
		<script src="../js/skel.min.js">
		{
			prefix: '../css/style',
			preloadStyleSheets: true,
			resetCSS: true,
			boxModel: 'border',
			/*grid: { gutters: 0 },*/
			breakpoints: {
				wide: { range: '1200-', containers: 1190, grid: { gutters: 0 } },
				narrow: { range: '481-1199', containers: 960, grid: { gutters: 0 } },
				mobile: { range: '-480', containers: 'fluid', lockViewport: true, grid: { collapse: true } }
			}
		}
		</script>
</head>
<body>
<!--------------------HEADER----------------------------->
       <div id="header">
        <img src="../img/logo.png" class="ri"/>
         <div id="nav">
                <a href="?pg=inicio">
                    Início
                </a>
                <a href="?pg=paginas">
                    Páginas
                </a>
                <a href="?pg=integrantes">
                    Integrantes
                </a>
                <a href="?pg=pedidos">
                    Pedidos
                </a>
                <a href="?sair">
                    Sair
                </a>
           </div>
        </div>
<!--------------------MAIN----------------------------->
        <div class="container box">
            <?php
                if (isset($_GET['pg'])) $pagina = $_GET['pg'];
                    else $pagina = 'inicio';
                    $pagina = 'paginas/'.$pagina.'.php';
                if (is_file($pagina)){
                    include_once $pagina;
                } else echo '<h1>Erro 404</h1><br /><h2>Página não existente</h2>';
                
            ?>
        </div>
<!--------------------FOOTER----------------------------->
    <div class="12u" id="footer">
        Radio SENAI &copy; 2013<br>Todos os direitos reservados.
    </div>
    
</body>
</html>