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
        <link rel="shortcut icon" href="img/favicon.ico">
        <title>Rádio Senai</title>
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/buttons.css">
		<!--[if lte IE 8]><script src="js/html5shiv.js" type="text/javascript"></script><![endif]-->
		<script src="js/jquery-1.4.4.min.js"></script>
        <script src="js/jquery.reveal.js" type="text/javascript"></script>
		<script src="js/skel.min.js">
		{
			prefix: 'css/style',
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
<<<<<<< HEAD
        <div id="header_logo">
			<a href="?pg=1"><img src="img/logo.png" class="ri"/></a>
		</div>
		<div id="nav">
			<div id="header_nav">
				<?php
					$paginas = $sql->verPaginas();
					foreach ($paginas as $pagina){ echo '<a href="?pg='.$pagina['id'].'">'.$pagina['nome'].'</a>'; }
				?>
				<a href="?pg=integrantes">Integrantes</a>
				<a href="?pg=radio">Ouça agora</a>
				<a href="?pg=pedido">Pedidos</a>
				<a href="#" data-reveal-id="adminlogin">Login</a>
			</div>
		</div>
=======
        <a href="?pg=1"><img src="img/logo.png" class="ri"/></a>
         <div id="nav">
            <?php
                $paginas = $sql->verPaginas();
                foreach ($paginas as $pagina){ echo '<a href="?pg='.$pagina['id'].'">'.$pagina['nome'].'</a>'; }
            ?>
            <a href="?pg=integrantes">Integrantes</a>
            <a href="?pg=radio">Ouça agora</a>
            <a href="?pg=pedido">Pedidos</a>
            <a href="#" data-reveal-id="adminlogin">Login</a>
        </div>
>>>>>>> d5f33543b6da237b27db1cd08640e4900a25e6df
    </div>
    
<!--------------------MAIN----------------------------->
    <div class="container box">
        <?php
            if (isset($_GET['pg'])){
                $pagina = $_GET['pg'];
                if ($pagina>0) echo $sql->buscaConteudo($pagina);
                    else {
                        $pagina = 'paginas/'.$pagina.'.php';
                        if (is_file($pagina)){
                            include_once $pagina;
                        } else echo '<center><h1>Erro 404</h1><br/><p>A Página que você procura não existe, redirecionando para home.</p><br/>
                <img src="img/carregando.gif"/></center>
                <meta http-equiv="refresh" content="4; url=?pg=1">';
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
<!--------------------FOOTER----------------------------->
    <div class="12u" id="footer">
        Radio SENAI &copy; 2013<br>Todos os direitos reservados.
    </div>
<!--------------------ADMIN LOGIN------------------------>
<div id="adminlogin" class="reveal-modal">
   <form action="user/" method="post">
      <h1> Área Restrita </h1>
          <table>
              <input type="text" class="text" id="campo_login" name="usuario_login" placeholder="Usuário" style="width: 200px;"><br>
              <input type="password" class="text" name="usuario_senha" placeholder="Senha" style="width: 200px;">
         </table>
        <input type="submit" value="Acessar" name="user_login_try" class="button small green">
        <input type="reset" value="Cancelar" class="button small red" onclick="login()">
    </form>
<a class="close-reveal-modal">&#215;</a>
</div>
    
</body>
</html>