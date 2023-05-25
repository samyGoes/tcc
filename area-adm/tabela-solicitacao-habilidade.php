<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/estilo-habilidades-solicitadas.css">
    <link rel="stylesheet" href="css/arquivo-modelo.css">
    <title>ADM</title>
</head>

<body>

    <!-- NAV LATERAL -->
    <nav class="nav-lateral">
        <div class="nav-lateral-sessao-um">
            <i class="fa-solid fa-bars" id="nav-lateral-icon-lista"></i>
            <div class="nav-lateral-box-icon">
                <a href="dashboard.php"> <i class="fa-solid fa-chart-line"></i> <span class="nav-lateral-topico"> Dashboard
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="instituicoes-cadastradas.php"> <i class="fa-solid fa-hand-holding-heart"></i> <span class="nav-lateral-topico"> Instituições
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="habilidades-cadastradas.php"> <i class="fa-solid fa-wrench"></i> <span class="nav-lateral-topico">
                        Habilidades </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="causas-cadastradas.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Causas
                    </span></a>
            </div>
            <div class="nav-lateral-box-icon">
                <a href="vagas-cadastradas.php"> <i class="fa-solid fa-briefcase"></i> <span class="nav-lateral-topico"> Vagas
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href="voluntarios-cadastrados.php"> <i class="fa-solid fa-person"></i> <span class="nav-lateral-topico"> Voluntários
                    </span></a>
            </div>
        </div>

        <div class="nav-lateral-sessao-dois">
            <div class="nav-lateral-box-icon">
                <a href="logout.php"> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span class="nav-lateral-topico"> Sair </span></a>
            </div>
        </div>
    </nav>

    <!-- TITULO CONFIGURAÇÕES DO PERFIL -->
    <div class="container-titulo-configuracoes">
        <!-- <h1> Configurações do Perfil </h1> -->
        <ul class="topicos-sessao-login">
            <li class="topicos-sessao-login-linha">
                <div class="box-topicos-sessao-login-linha">
                    <i id="nav-sininho-sub-topicos" class="fa-solid fa-bell"></i>

                    <?php
                    $notInstituicaoTitulo = array(
                        'Nova Candidatura',
                        'Nova Mensagem',
                        'Nova Avaliação',
                        'Nova Avaliação'
                    );

                    $notInstituicaoFrase = array(
                        'Um voluntário se candidatou a vaga de professor de inglês.',
                        'Você tem uma nova mensagem do voluntário João.',
                        'Um voluntário fez uma avaliação sua.',
                        'Um voluntário fez uma avaliação sua.'
                    );

                    ?>
                    <ul class="sub-topicos-sininho">
                        <?php
                        foreach ($notInstituicaoTitulo as $notificacoes => $notInstituicaoTitulo) {
                        ?>
                            <li>
                                <div class="sub-topicos-sininho-linha">
                                    <a class="sub-topicos-sininho-linha-titulo" href="#"> <?php echo ($notInstituicaoTitulo); ?> </a>
                                    <a class="sub-topicos-sininho-linha-frase" href="#"> <?php echo ($notInstituicaoFrase[$notificacoes]); ?> </a>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <p class="cabecalho-menu-item" id="cabecalho-menu-item-usuario">
                        Olá, adm <span id="nav-seta-sub-topicos"> 🢓 </span>
                    </p>
                </div>

                <ul class="sub-topicos">
                    <li> <a href="../auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                    <li> <a href=""> Vagas </a> </li>
                    <li> <a href="../auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                    <li> <a href="../auth/logout.php"> Sair </a></li>
                </ul>
            </li>
        </ul>
    </div>





    <!-- MODAL SOLICITAÇÃO ACEITA E RECUSADA -->
    <?php

    if (isset($_GET['solicitacao'])) {
        if ($_GET['solicitacao'] === 'true') {
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
                                <p class="modal-titulo-cadastro">Solicitação aceita com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                <p class="modal-frase-cadastro"> Entre no menu <a href="habilidades-cadastradas.php" class="modal-frase-cadastro-link"> Habilidades Cadastradas </a> para ver as todas as habilidades. </p>
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

                            .modal-frase-cadastro-link
                            {
                                color: #4567a5;
                                font-weight: 500;
                                transition: all 0.5s ease;
                            }

                            .modal-frase-cadastro-link:hover
                            {
                                color: #cf8a3f;
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
    if (isset($_GET['solicitacao'])) {
        if ($_GET['solicitacao'] === 'recusada') {
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
                                <p class="modal-titulo-cadastro">Solicitação recusada com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                                <p class="modal-frase-cadastro"> Você não poderá mais desfazer a recusa da solicitação.</p>
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

                            .modal-frase-cadastro-link
                            {
                                color: #4567a5;
                                font-weight: 500;
                                transition: all 0.5s ease;
                            }

                            .modal-frase-cadastro-link:hover
                            {
                                color: #cf8a3f;
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
                        }, 10000);

                    </script>';
        }
    }
    ?>

    <!-- CONTEUDO  -->
    <main class="main-conteudo">
        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
        <div class="main-conteudo-container-titulo">
            <h1>HABILIDADES SOLICITADAS </h1>
            <p>Aqui você verá todas as habilidades cadastradas pelas instituições no site. Você também pode filtrar ou pesquisar
                pela habilidade que deseja. Também tem como opção bloquear alguma habilidade caso ela esteja
                violando alguma das diretrizes.</p>
        </div>
        <div class="gerarPdf">
            <a href="geracaoPdf/gerar_pdf_Habilidades.php"><button> <i class="fa-solid fa-file-pdf"></i>Gerar pdf </button></a>
        </div>


        <div class="cards">


            <!-- TABELA -->
            <div class="table">
                <div class="table-responsive">
                    <div class="funcoes">
                        <div class="funcoes-sessao-1">
                            <span>Selecionar todos</span>
                            <input type="checkbox" name="selecionar-todos" id="selecionar-todos">
                            <i class="fa-solid fa-circle-xmark" id="icone-x"></i>
                        </div>
                        <div class="funcoes-sessao-2">
                            <input type="text" name="" id="pesquisar" placeholder="Pesquisar">
                            <i class="fa-solid fa-magnifying-glass" id="icon-lupa"></i>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th> </th>
                                <th> ID </th>
                                <th> Habilidades </th>
                                <th> Instituição </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'global.php';

                            try {
                                $listaSolicitacaoHabilidade = SolicitacaoHabilidadeDao::listarSolicitacaoHabilidade();
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }

                            foreach ($listaSolicitacaoHabilidade as $habilidade) {
                            ?>
                                <form method="POST">
                                    <tr>
                                        <td><input type="checkbox" name="checkbox" id="checkbox"></td>
                                        <td><?php echo $habilidade['codSolicitacaoHabilidade']; ?></td>
                                        <td><?php echo $habilidade['nomeHabilidade']; ?></td>
                                        <td><?php echo $habilidade['nomeInstituicao']; ?></td>
                                        <td><button name="btnChamar" type="submit" class="table-btn-chamar" value="<?php echo $habilidade['codSolicitacaoHabilidade']; ?>">ACEITAR</button></td>
                                        <td><button name="btnRecusar" type="submit" class="table-btn-recusar" value="<?php echo $habilidade['codSolicitacaoHabilidade']; ?>">RECUSAR</button></td>
                                    </tr>
                                </form>
                            <?php
                                if (isset($_POST['btnChamar']) && $_POST['btnChamar'] == $habilidade['codSolicitacaoHabilidade']) {
                                    $codSolicitacaoHabilidade = $_POST['btnChamar'];

                                    SolicitacaoHabilidadeDao::aceitarSolicitacao($habilidade['nomeHabilidade'], $habilidade['codSolicitacaoHabilidade']);
                                } elseif (isset($_POST['btnRecusar']) && $_POST['btnRecusar'] == $habilidade['codSolicitacaoHabilidade']) {
                                    $codSolicitacaoHabilidade = $_POST['btnRecusar'];

                                    SolicitacaoHabilidadeDao::recusarSolicitacao($codSolicitacaoHabilidade);
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </main>

    <script src="../area-voluntario/js/script.js"></script>
    <script src="js/script.js"></script>
    <script type="module" src="../imports/nav-drop-down.js"></script>
    <script type="module" src="../imports/nav-drop-down-notificacao.js"></script>


</body>

</html>