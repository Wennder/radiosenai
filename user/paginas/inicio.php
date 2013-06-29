<?php
    $arqSessao = '../../classes/Sessao.php';
    if (is_file($arqSessao)){
        require_once $arqSessao;
        $sessao = new Sessao();
        $sessao->bloqueio();
    };
?>
<h1 style="text-align: center;">
    Área restrita para integrantes do projeto
</h1><hr />
<h2>
    Instruções de uso:
</h2><hr />
<ul>
    <li>
        <h3>Há 5 links para páginas no menu ao lado:</h3>
        <ul>
            <li>
                <b>Início</b>
                <ul>
                    <li>É esta página, que contém informações sobre a área restrita do site</li>
                </ul><br />
            </li>
            <li>
                <b>Páginas</b>
                <ul>
                    <li>Páginas visualizadas por visitantes do site podem ser criadas, editadas e deletadas</li>
                </ul><br />
            </li>
            <li>
                <b>Integrantes</b>
                <ul>
                    <li>Dados sobre os integrantes podem ser editados nessa página</li>
                </ul><br />
            </li>
            <li>
                <b>Pedidos</b>
                <ul>
                    <li>Pedidos feitos pelos visitantes do site podem ser visualizados e deletados</li>
                </ul><br />
            </li>
            <li>
                <b>Sair</b>
                <ul>
                    <li>A finalidade dessa página é deslogar-se do usuário administrador</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>
<ul>
    <li style="list-style: none;">
        <h3 style="float: left;">(FAQ) Frequently Asked Questions&nbsp;&nbsp;-&nbsp;&nbsp;</h3>
        <h5 style="float: left;">Perguntas frequentes</h5><br id="clear" />
        <ul>
            <li>
                <b>Como cadastrar integrante?</b>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Entre na página do menu "Integrantes" e clique em "novo integrante",
                    logo à direita do título, escreva os dados do integrante (é importante
                    ressaltar que todos os campo são obrigatórios, e a imagem também é
                    obrigatória) e clique em "Cadastrar".
                </p>
            </li>
            <li>
                <b>Como editar os dados de um integrante?</b>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Entre na página do menu "Integrantes" e encontre o integante
                    que deseja editar. Clique no botão azul "Editar" e vá até o 
                    topo da página aonde estará o formulário de edição. É importante
                    ressaltar que todos os campos são obrigatórios. Clique em "Salvar"
                    para salvar suas edições.
                </p>
            </li>
            <li>
                <b>Como alterar a imagem de um integrante?</b>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Entre na página do menu "Integrantes" e encontre o integante
                    que deseja editar. Clique no botão verde "Alt. Imagem" e vá 
                    até o topo da página e aperte o botão cinza "Selecionar foto para
                    integrante". Selecione a foto e clique em "Salvar". A foto será
                    salva.
                </p>
            </li>
            <li>
                <b>Como criar uma nova página?</b>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Entre na página do menu "Páginas" e aperte no botão cinza ao 
                    lado do título "Nova Página". Preencha com os dados da página
                    a ser criada. Nenhum campo pode estar vazio. Aperte em cadastrar
                    e sua página estará criada.
                </p>
            </li>
            <li>
                <b>Como trocar a "Página Inicial"?</b>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Entre na página do menu "Páginas" e ache o texto do lado 
                    direito do botão "Nova Página" e selecione a página que deseja
                    ter como página inicial, ou se quer que seja uma página aleatória.
                </p>
            </li>
            </li>
            <li>
                <b>Como editar uma página?</b>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Entre na página do menu "Páginas" e encontre a página que 
                    deseja editar. Aperte no botão azul "Editar" e um formulário
                    será aberto no topo da página. Edite os campos como desejar,
                    lembrando que não poderá deixar nenhum compo em branco. Aperte
                    em "Salvar" e suas edições serão salvas.
                </p>
            </li>
            </li>
            <li>
                <b>Como ver os pedidos?</b>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Entre na página do menu "Pedidos" e os pedidos estarão em 
                    uma lista. Para ver mais informações do pedido, clique no 
                    botão azul "Ver Mais", e mais informações serão mostradas,
                    no caso, o autor do pedido e seu recado.
                </p>
            </li>
            </li>
            <li>
                <b>Como deletar pedidos?</b>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Entre na página do menu "Pedidos"  e encontre o pedido a ser
                    deletado. Aperte no botão vermelho "X" e confirme que irá
                    deletar. A página não será atualizada e o pedido irá ser
                    deletado e irá desaparecer automaticamente.
                </p>
            </li>
            </li>
        </ul>
    </li>
</ul>
