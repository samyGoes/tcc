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
        <!-- LINKS CSS -->
        <link rel="stylesheet" href="../area-instituicao/css/estilo-arquivo-modelo.css">
        <link rel="stylesheet" href="css/estilo-editar-perfil-voluntario.css">

        <!-- LINK ICONES -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title> Configurações do Perfil     - Editar Perfil </title>
    </head>

    <body>

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
                <?php if (empty($_SESSION['nomeUsuario'])) { ?>
                    <li class="topicos-sessao-login-linha">
                        <a href="<?php echo 'form-login.php' ?>" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                            <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login 
                        </a>
                    </li>
                <?php } else { 
                    $nomeCompleto = $_SESSION['nomeUsuario'];
                    if($_SESSION['tipoPerfil']=='Voluntario')
                    {
                        $nomeArray = explode(" ", $nomeCompleto);
                        $primeiroNome = $nomeArray[0];
                    }
                    else
                    {
                        $nomeArray = explode(" ", $nomeCompleto);
                        $primeiroNome = $nomeArray[0]." ".$nomeArray[1];  
                    }                        
                ?>
                    <li class="topicos-sessao-login-linha">
                        <a href="#" class="cabecalho-menu-item" id="cabecalho-menu-item-usuario">
                            Olá, <?php echo $primeiroNome ?> <span id="nav-seta-sub-topicos"> 🢓 </span>
                        </a>
                        <ul class="sub-topicos">
                            <li> <a href="../auth/redirecionamento-perfil-usuario.php"> Meu Perfil </a></li>
                            <li> <a href=""> Vagas </a> </li>
                            <li> <a href="../auth/configuracao-perfil-usuario.php"> Configurações </a></li>
                            <li> <a href="../auth/logout.php"> Sair </a></li>
                        </ul>
                    </li>
                <?php } ?>
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







        <!-- CONTEUDO  -->
        <main class="main-conteudo">
            <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
            <!-- <div class="uau"></div> -->
            <div class="main-conteudo-container-titulo">
                <h1>EDITAR PERFIL</h1>
                <p>
                    Digite as novas informações que deseja inserir. Agora você também pode adicionar uma
                    descrição e uma foto de perfil.
                </p>
            </div>

            <div class="form">
                <form class="container" action="update-voluntario.php" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                        <div class="input-box">
                            <div>
                                <label for="">Nome</label>
                                <input type="text" name="nome" id="nome" placeholder="Digite seu nome"
                                    value="<?php echo $_SESSION['dadoPerfil']['nomeVoluntario'] ?>" />
                            </div>
                            <div>
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" placeholder="Digite seu email"
                                    value="<?php echo$_SESSION['dadoPerfil']['emailVoluntario'] ?>" />
                            </div>
                        </div>

                        <div class="input-box">
                            <div>
                                <label for="">Telefone (Fixo)</label>
                                <input type="tel" name="telefone1" id="telefone" placeholder="(xx)xxxx-xxxx"
                                    value="<?php echo $_SESSION['dadoPerfil']['telefone1'] ?>" />
                            </div>
                            <div>
                                <label for="">Telefone (Cel)</label>
                                <input type="tel" name="telefone2" id="telefone-2" placeholder="(xx)xxxxx-xxxx"
                                    value="<?php echo $_SESSION['dadoPerfil']['telefone2']; ?>" />
                            </div>
                        </div>

                        <div class="input-box">
                            <div>
                                <label for="">Logradouro</label>
                                <input type="text" name="log" id="log"
                                    value="<?php echo $_SESSION['dadoPerfil']['logVoluntario'] ?>" />
                            </div>
                            <div>
                                <label for="">Número</label>
                                <input type="text" name="numeroCasa" id="num" placeholder="Digite o n°"
                                    value="<?php echo $_SESSION['dadoPerfil']['numLogVoluntario'] ?>" />
                            </div>
                            <div>
                                <label for=" ">CEP</label>
                                <input type="text " name="cep" id="cep" placeholder="Digite seu CEP"
                                    value="<?php echo $_SESSION['dadoPerfil']['cepVoluntario'] ?>" />
                            </div>
                        </div>

                        <div class="input-box">
                            <div>
                                <label for=" ">Bairro</label>
                                <input type="text" name="bairro" id="bairro"
                                    value="<?php echo  $_SESSION['dadoPerfil']['bairroVoluntario'] ?>" />
                            </div>
                            <div>
                                <label for="cidade">Cidade</label>
                                <input type="text" name="cidade" id="cidade" value="<?php echo $_SESSION['dadoPerfil']['cidadeVoluntario'] ?>">
                            </div>
                            <div>
                                <label for="uf">Estado</label>
                                <input type="text" name="uf" id="uf"  value="<?php echo $_SESSION['dadoPerfil']['estadoVoluntario'] ?>">
                            </div>
                        </div>

                        <div class="input-box">
                            <div>
                                <label for=" ">Complemento</label>
                                <input type="text" name="complemento" id="comp" placeholder="Digite o complemento"
                                    value="<?php echo  $_SESSION['dadoPerfil']['compVoluntario'] ?>" />
                            </div>
                            <div>
                                <label for="">País</label>
                                <input type="text" name="pais" id="pais" placeholder="Digite seu pais"  value="<?php echo $_SESSION['dadoPerfil']['paisVoluntario'] ?>">
                            </div>
                            <div>
                                <span>Foto</span>
                                <label id="label" for="foto">Selecione uma foto</label>
                                <input type="file" accept="image/*" id="foto" name="foto">
                            </div>
                        </div>

                        <div class="input-box">
                            <div>
                                <label for="">Descrição</label>
                                <textarea name="desc" id="desc" cols="83" rows="10" placeholder="Digite sua descriçao"><?php echo  $_SESSION['dadoPerfil']['descVoluntario'] ?></textarea>
                            </div>
                            <div class="div-image">
                                <div class="image">
                                    <img src="<?php echo ($_SESSION['dadoPerfil']['fotoVoluntario']) ?>" id="img" alt="user-instituição">
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href=""><div class="continue-button">
                        <button type="submit">SALVAR</button>
                    </a>
                    </div>
                </form>
            </div>


        </main>




        <!-- SCRIPTS  -->
        <script src="../area-voluntario/js/button-image.js"></script>
        <script src="../js/endereco-auto.js"></script>
        <script type="module" src="imports/side-bar.js"></script>
        <script type="module" src="../imports/nav-drop-down.js"></script>
        
    </body>

</html>