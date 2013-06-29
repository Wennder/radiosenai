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
        <link rel="stylesheet" href="css/fonts.css" type="text/css" charset="utf-8" />
		<!--[if lte IE 8]><script src="js/html5shiv.js" type="text/javascript"></script><![endif]-->
		<script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/content.js" type="text/javascript"></script>
		<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
        
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
        <!--
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
            <script type="text/javascript">$('#login').fadeOut(0);</script>-->
        <div class="container">
            <div class="12u">
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
            </div>
            <div class="12u">
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
    </body>
</html>