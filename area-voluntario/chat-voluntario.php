<?php
require_once 'global.php';
require_once '../auth/verifica-logado.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../area-instituicao/css/estilo-arquivo-modelo.css">
    <link rel="stylesheet" href="../area-instituicao/gerenciar-vagas//css/estilo-chat.css">
    <link rel="stylesheet" href="css/estilo-tabela-vagas.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Configurações do Perfil - Vagas </title>
    <style>
        #pesquisar::placeholder {
            font-family: poppins, sans-serif;
            font-weight: 400;
            font-size: 13px;
            color: #ffffff;
        }
    </style>
</head>

<body class="body">



    <!-- BARRA DE NAVEGAÇÂO -->
    <nav class="cabecalho">
        <div class="logo">
            <img src="../img/logo-conecta.png">
        </div>

        <!-- BOTÃO PRA ESCONDER E APARECER OS TÓPICOS -->
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"> <i class="fas fa-bars"></i> </label>

        <!-- TÓPICOS -->
        <ul class="topicos-sessao-completa">
            <ul class="topicos">
                <li> <i class="fa-solid fa-house" id="topicos-icon-fixo"></i> <a href="../index.php" class="cabecalho-menu-item">Início</a></li>
                <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="../voluntarios/voluntarios.php" class="cabecalho-menu-item">voluntários</a></li>
                <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="../instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="../vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="../sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="../contato/contato.php" class="cabecalho-menu-item">contato</a></li>
            </ul>

            <ul class="topicos-sessao-login">
                <?php
                if (empty($_SESSION['nomeUsuario'])) {
                ?>
                    <li class="topicos-sessao-login-linha">
                        <a href="<?php echo 'form-login.php' ?>" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                            <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login
                        </a>
                    </li>
                <?php
                } else {
                    $nomeCompleto = $_SESSION['nomeUsuario'];
                    if ($_SESSION['tipoPerfil'] == 'Voluntario') {
                        $nomeArray = explode(" ", $nomeCompleto);
                        $primeiroNome = $nomeArray[0];
                    } else {
                        $nomeArray = explode(" ", $nomeCompleto);
                        $primeiroNome = $nomeArray[0] . " " . $nomeArray[1];
                    }
                ?>
                    <li class="topicos-sessao-login-linha">
                        <div class="box-topicos-sessao-login-linha">
                            <?php

                            require_once 'global.php';
                            include 'diretorios-notificacao.php';
                            try {
                                $idVoluntarioLogado = $_SESSION['codUsuario'];
                                $notificacoes = VoluntarioDao::notificacoes($idVoluntarioLogado);
                                //$novaNotificacao = InstituicaoDao::novaNotificacao($idInstituicaoLogada);
                                //$diretorio = diretorios($linha['arquivo']);
                                //print_r($links);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }

                            if (empty($notificacoes)) {
                            ?>
                                <div class="box-sininho">
                                    <i id="nav-sininho-sub-topicos" class="fa-solid fa-bell"></i>
                                </div>
                                <ul class="sub-topicos-sininho sem-resultado">
                                    <li>
                                        <div class="sub-topicos-sininho-linha sem-resultado">
                                            <p class="sub-topicos-sininho-linha-sem-resultado"> Sem notificações...</p>
                                        </div>
                                    </li>
                                </ul>
                            <?php

                            } else {
                            ?>
                                <div class="box-sininho">
                                    <div class="nova-notificacao-bolinha"></div>
                                    <i id="nav-sininho-sub-topicos" class="fa-solid fa-bell"></i>
                                </div>

                                <ul class="sub-topicos-sininho">
                                    <?php
                                    foreach ($notificacoes as $linha) {
                                        $primeiraIteracao = true;
                                        foreach ($linha as $titulo => $frase) {
                                            if ($primeiraIteracao) {
                                                $titulos = array_keys($linha); // Obter as chaves do array $linha
                                                $primeiroTitulo = $titulos[0]; // Obter o primeiro título

                                                $frases = array_values($linha); // Obter os valores do array $linha
                                                $primeiraFrase = $frases[0];
                                    ?>
                                                <li>
                                                    <div class="sub-topicos-sininho-linha">
                                                        <a class="sub-topicos-sininho-linha-titulo" href="<?php echo diretorios($linha['arquivo']) . $linha['arquivo'] ?>"> <?php echo $primeiroTitulo; ?> </a>
                                                        <a class="sub-topicos-sininho-linha-frase" href="<?php echo diretorios($linha['arquivo']) . $linha['arquivo'] ?>"> <?php echo $primeiraFrase; ?> </a>
                                                    </div>
                                                </li>
                                    <?php
                                                $primeiraIteracao = false;
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            <?php
                            }
                            ?>

                            <p class="cabecalho-menu-item" id="cabecalho-menu-item-usuario">
                                Olá, <?php echo $primeiroNome ?> <span id="nav-seta-sub-topicos"> 🢓 </span>
                            </p>
                        </div>

                        <ul class="sub-topicos">
                            <li> <a href="../auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                            <li> <a href=""> Vagas </a> </li>
                            <li> <a href="../auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                            <li> <a href="../auth/logout.php"> Sair </a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
            </ul>
        </ul>
    </nav>




    <!-- TITULO CONFIGURAÇÕES DO PERFIL -->
    <div class="container-titulo-configuracoes">
        <h1> Configurações do Perfil </h1>
    </div>





    <!-- NAV LATERAL -->
    <nav class="nav-lateral">
        <div class="nav-lateral-sessao-um">
            <i class="fa-solid fa-bars" id="nav-lateral-icon-lista"></i>

            <div class="nav-lateral-box-icon">
                <a href="form-editar-perfil-voluntario.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="form-adicionar-causas-voluntario.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Adicionar Causas </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="tabela-vagas-voluntario.php"> <i class="fa-solid fa-briefcase"></i> <span class="nav-lateral-topico"> Vagas </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="form-trocar-senha-voluntario.php"> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="form-excluir-conta-voluntario.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span class="nav-lateral-topico">Excluir Conta </span></a>
            </div>
        </div>

        <div class="nav-lateral-sessao-dois">
            <div class="nav-lateral-box-icon">
                <a href="../auth/logout.php"> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span class="nav-lateral-topico"> Sair </span></a>
            </div>
        </div>
    </nav>





    <!-- MODAL RETIRAR CANDIDATURA -->
    <?php

    if (isset($_GET['retirar-candidatura'])) {
        if ($_GET['retirar-candidatura'] === 'sucesso') {
            echo ' <script>
                        // cria o elemento HTML do modal
                        const modal = document.createElement("div");
                        modal.id = "modal";
                        modal.innerHTML = `
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
                            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
                            crossorigin="anonymous" referrerpolicy="no-referrer" />
                            <div id="modal-content">
                                <i id="icone-fechar-modal" class="fa-solid fa-xmark"></i>
                                <p class="modal-titulo-cadastro"> Retirada realizada com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                <p class="modal-frase-cadastro"> Você retirou sua candidatura e não poderá desfazer as alterações. </p>
                            </div>
                            `;

                        // adiciona o modal como filho do body (ou de outro elemento HTML)
                        document.body.appendChild(modal);

                        //adiciona a tag style do modal
                        const style = document.createElement("style");
                        const iconFechaModal = document.querySelector("#icone-fechar-modal");

                        style.innerHTML = `
                            #modal 
                            {
                                position: fixed;
                                bottom: 20px;
                                right: -600px;
                                z-index: 9999;
                                transition: all 1s ease;
                                border: #4567a5 solid 1px;
                                border-radius: 0.5rem;
                                background-color: #fff;
                                padding: 1.3rem;
                                max-width: 24rem;
                            }

                            #modal-content 
                            {
                                display: flex;
                                flex-direction: column;
                                gap: 0.4rem;
                                
                                position: relative;
                            }

                            #icone-fechar-modal
                            {
                                position: absolute;
                                right: -9px;
                                top: -11px;
                                color: #525252;
                                cursor: pointer;
                                transition: all 0.5s ease;
                            }

                            #icone-fechar-modal:hover
                            {
                                color: #green;
                            }

                            .modal-titulo-cadastro 
                            {
                                font-family: Poppins, sans-serif;
                                font-size: 15px;
                                color: #000;
                                font-weight: 500;
                                display: flex;
                                gap: 0.4rem;
                            }

                            p>i 
                            {
                                font-size: 1.2rem;
                                color: #1ea41e;
                            }

                            .modal-frase-cadastro
                            {
                                font-family: Poppins, sans-serif;
                                font-size: 13px;
                                color: #2e2e2e;
                                font-weight: 400;
                            }
                            `;

                        document.head.appendChild(style);

                        document.addEventListener("DOMContentLoaded", function()
                        {
                            modal.style.right = "20px";
                        });

                        iconFechaModal.addEventListener("click", function()
                        {
                            modal.remove();
                        });

                        setTimeout(function()
                        {
                            modal.remove();
                        }, 8000);

                    </script>';
        }
    }

    ?>



    <!-- CONTEUDO  -->
    <main class="main-conteudo">

        <div class="main-conteudo-container-titulo">
            <h1> VAGAS </h1>
            <p>
                Aqui você verá as listas das vagas para as quais se candidatou e as vagas em que foi
                requisitado.
            </p>
        </div>

        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
        <div class="conteudo-completo">
            <!-- TÍTULO 1 -->
            <div class="container-titulo-1 c">
                <h2 class="titulo-voluntarios"> Chat </h2>
                <p class="frase-voluntarios">
                    Converse com a instituição para que ambos possam resolver como funcionará o serviço e se tudo está de acordo com o esperado.
                </p>
            </div>
            <?php
            require_once 'global.php';

            $id = $_GET['c'];
            // $t = 'Voluntario';
            $id1 = $_SESSION['codUsuario'];
            try {
                $listaInsitituicao = InstituicaoDao::listar();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            ?>
            <?php

            foreach ($listaInsitituicao as $instituicao) {

            ?>

                    <div class="chat-container" id="chat-container">
                        <div class="chat-header">
                            <div class="nome-user">
                                <img src="../area-instituicao/<?php echo $instituicao['fotoInstituicao']; ?>" alt="img">
                                <h2 class="chat-titulo" id="chat-titulo"> <?php echo $instituicao['nomeInstituicao']; ?> </h2>
                            </div>
                            <div class="pesquisar-chat">
                                <input type="text" name="pesquisar" id="pesquisar" placeholder="Pesquisar">
                                <i class="fa-solid fa-magnifying-glass" id="icon-lupa"></i>
                            </div>
                        </div>
                        <div class="scroll-chat" id="scroll-chat">
                            <div class="main-chat">
                                <div class="mensagens" id="mensagens">
                                </div>
                            </div>
                        </div>
                        <div class="chat-footer">
                            <div class="fundo-footer">
                                <div class="enviar-mensagem">
                                    <input type="text" name="enviar-mensagem" id="enviar-mensagem" placeholder="Mensagem...">
                                </div>
                                <button type="" class="button-send" id="btn1">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>

            <?php
                }
            ?>

            <a class="link-voltar-anterior" href="../area-voluntario/tabela-vagas-voluntario.php"> Voltar para a página anterior. </a>
        </div>
    </main>
    <script>
        var conn = new WebSocket('ws://localhost:3000');
        var inp_message = document.getElementById('enviar-mensagem');
        var btn_env = document.getElementById('btn1');
        var area_content = document.getElementById('mensagens');
        var scroll = document.getElementById('scroll-chat');

        conn.onopen = function(e) {
            //console.log("Connection established!");
        };

        conn.onmessage = function(e) {
            //console.log(e.data);
            showMessages('area-voluntario', e.data);
        };

        btn_env.addEventListener('click', sendMessage);
        inp_message.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                sendMessage();
            }
        });

        function sendMessage() {
            if (inp_message.value !== '') {
                var msg = {
                    'msg': inp_message.value
                };
                msg = JSON.stringify(msg);

                conn.send(msg);

                showMessages('me', msg);

                inp_message.value = '';

                scroll.scrollTop = scroll.scrollHeight; // Scroll to the bottom
            }
        }

        function showMessages(papelRemetente, data) {
            data = JSON.parse(data);

            console.log(data);

            var srcFotoRemetente, srcFotoDestinatario, containerClass;
            var mensagemClass, fotoClass;
            if (papelRemetente === 'me') {
                srcFotoRemetente = "../area-voluntario/<?php echo $voluntario['fotoVoluntario']; ?>";
                containerClass = 'area-instituicao me';
                mensagemClass = 'mensagem-instituicao';
                fotoClass = 'foto-instituicao';
            } else if (papelRemetente === 'area-voluntario') {
                srcFotoDestinatario = "../area-instituicao/<?php echo $instituicao['fotoInstituicao']; ?>";
                containerClass = 'area-voluntario';
                mensagemClass = 'mensagem-voluntario';
                fotoClass = 'foto-voluntario';
            }

            var div = document.createElement('div');
            div.setAttribute('class', containerClass);

            var divFoto = document.createElement('div');
            divFoto.setAttribute('class', fotoClass);

            var img = document.createElement('img');
            img.setAttribute('src', (papelRemetente === 'me') ? srcFotoRemetente : srcFotoDestinatario);
            img.setAttribute('alt', 'foto');

            divFoto.appendChild(img);

            var divMensagem = document.createElement('div');
            divMensagem.setAttribute('class', mensagemClass);

            var divConteudo = document.createElement('div');
            divConteudo.setAttribute('class', 'conteudo-mensagem');

            var p = document.createElement('p');
            p.textContent = data.msg;

            divConteudo.appendChild(p);
            divMensagem.appendChild(divConteudo);

            div.appendChild((papelRemetente === 'me') ? divMensagem : divFoto);
            div.appendChild((papelRemetente === 'me') ? divFoto : divMensagem);

            if (papelRemetente === 'area-voluntario') {
                var divAreaVoluntario = document.createElement('div');
                divAreaVoluntario.setAttribute('class', 'area-voluntario-style');
                divAreaVoluntario.appendChild(div);
                area_content.appendChild(divAreaVoluntario);
            } else {
                area_content.appendChild(div);
            }

            scroll.scrollTop = scroll.scrollHeight; // Scroll to the bottom
        }

        window.addEventListener('load', function() {
            var storedMessages = localStorage.getItem('chatMessages');
            if (storedMessages) {
                var messages = JSON.parse(storedMessages);
                messages.forEach(function(message) {
                    showMessages(message.papelRemetente, message.data);
                });
            }
        });

        window.addEventListener('beforeunload', function() {
            var messages = Array.from(area_content.querySelectorAll('.area-instituicao, .area-voluntario'));
            var storedMessages = messages.map(function(message) {
                var papelRemetente = message.classList.contains('me') ? 'me' : 'area-voluntario';
                var data = {
                    msg: message.querySelector('.conteudo-mensagem p').textContent
                };
                return {
                    papelRemetente: papelRemetente,
                    data: JSON.stringify(data)
                };
            });
            localStorage.setItem('chatMessages', JSON.stringify(storedMessages));
        });
    </script>
    <script type="module" src="imports/side-bar.js"></script>
    <script type="module" src="../imports/nav-drop-down.js"></script>
    <script type="module" src="imports/box-info.js"></script>
    <script type="module" src="../imports/nav-drop-down-notificacao.js"></script>
    <script type="module" src="../imports/nova-notificacao.js"></script>
</body>

</html>