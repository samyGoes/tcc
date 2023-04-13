
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../area-instituicao/css/estilo-arquivo-modelo.css">
    <link rel="stylesheet" href="../area-voluntario/css/style-editarPerfil-voluntario.css">
    <!-- LINK ICONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>

    <!-- BARRA DE NAVEGAÇÂO -->
    <nav class="cabecalho">
        <div class="logo">
            <p> Conecta </p>
        </div>

        <!-- BOTÃO PRA ESCONDER E APARECER OS TÓPICOS -->
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"> <i class="fas fa-bars"></i> </label>

        <!-- TÓPICOS -->
        <ul class="topicos-sessao-completa">
            <ul class="topicos">
                <li> <i class="fa-solid fa-house" id="topicos-icon-fixo"></i> <a href="../index.php" class="cabecalho-menu-item">Início</a></li>
                <li> <i class="fa-solid fa-person" id="topicos-icon-fixo"></i> <a href="voluntarios.php" class="cabecalho-menu-item">voluntários</a></li>
                <li> <i class="fa-sharp fa-solid fa-heart" id="topicos-icon-fixo"></i> <a href="../instituicoes/instituicoes.php" class="cabecalho-menu-item">instituições</a></li>
                <li> <i class="fa-solid fa-briefcase" id="topicos-icon-fixo"></i> <a href="../vagas/vagas.php" class="cabecalho-menu-item">Vagas</a></li>
                <li> <i class="fa fa-file-text" aria-hidden="true" id="topicos-icon-fixo"></i> <a href="../sobre-nos/sobre-nos.php" class="cabecalho-menu-item">sobre nós</a></li>
                <li> <i class="fa-solid fa-phone" id="topicos-icon-fixo"></i> <a href="../contato/contato.php" class="cabecalho-menu-item">contato</a></li>
            </ul>

            <ul class="topicos-sessao-login">
                <li class="topicos-sessao-login-linha"><a href="../form-login.php" class="cabecalho-menu-item" id="cabecalho-menu-item-login">
                        <i class="fa-solid fa-user" id="topicos-icon-fixo-dif"></i> login </a> <span id="nav-seta-sub-topicos"> 🢓 </span></i>
                    <ul class="sub-topicos">
                        <li> <a href="perfil-voluntario.php"> Meu Perfil </a></li>
                        <li> <a href=""> Vagas </a> </li>
                        <li> <a href="editar-perfil.php"> Configurações </a></li>
                        <li> <a href="logout.php"> Sair </a></li>
                    </ul>
                </li>
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
                <a href=""> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil
                    </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href=""> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Adicionar
                        Causas </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href=""> <i class="fa-solid fa-briefcase"></i> <span class="nav-lateral-topico"> Vagas </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href=""> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
            </div>

            <div class="nav-lateral-box-icon">
                <a href=""> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span class="nav-lateral-topico">Excluir Conta </span></a>
            </div>
        </div>

        <div class="nav-lateral-sessao-dois">
            <div class="nav-lateral-box-icon">
                <a href=""> <i class="fa-solid fa-door-open" id="nav-lateral-icon-sair"></i> <span class="nav-lateral-topico"> Sair </span></a>
            </div>
        </div>
    </nav>







    <!-- CONTEUDO  -->
    <main class="main-conteudo">
        <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->
        <!-- <div class="uau"></div> -->

        <div class="main-conteudo-container-titulo">
            <h1>EDITAR PERFIL</h1>
            <p>Digite as novas informações que deseja inserir</p>
        </div>

        <div class="form">
            <form class="container" action="editarPerfil-instituicao.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="input-box">
                        <div>
                            <label for="">Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite seu nome" value="<?php echo $_SESSION['nomeUsuario']; ?>" />
                        </div>
                        <div>
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" placeholder="Digite seu email" value="<?php echo $_SESSION['emailUsuario']; ?>" />
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for="">Telefone (Fixo)</label>
                            <input type="tel" name="telefone1" id="telefone" placeholder="(xx)xxxx-xxxx" value="<?php echo $_SESSION['numFoneUsuario1']; ?>" />
                        </div>
                        <div>
                            <label for="">Telefone (Cel)</label>
                            <input type="tel" name="telefone2" id="telefone-2" placeholder="(xx)xxxxx-xxxx" value="<?php echo $_SESSION['numFoneUsuario2']; ?>" />
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for="">Logradouro</label>
                            <input type="text" name="log" id="log" placeholder="Digite sua rua, avenida" value="<?php echo $_SESSION['logUsuario']; ?>" />
                        </div>
                        <div>
                            <label for="">Número</label>
                            <input type="text" name="numeroCasa" id="num" placeholder="Digite o n°" value="<?php echo $_SESSION['numLogUsuario']; ?>" />
                        </div>
                        <div>
                            <label for=" ">CEP</label>
                            <input type="text " name="cep" id="cep" placeholder="Digite seu CEP" value="<?php echo $_SESSION['cepUsuario']; ?>" />
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for=" ">Bairro</label>
                            <input type="text" name="bairro" id="bairro" placeholder="Digite seu bairro" value="<?php echo $_SESSION['bairroUsuario']; ?>" />
                        </div>
                        <div>
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" placeholder="Digite seu cidade">
                            <!--<select name="cidade" id="cidade">
                                <option disabled value="">Selecione sua cidade</option>
                                <option value="São Paulo" <?php if ($_SESSION['cidadeUsuario'] == 'São Paulo')
                                                                echo 'selected'; ?>>São Paulo</option>
                                <option value="Rio de Janeiro" <?php if ($_SESSION['cidadeUsuario'] == 'Rio de Janeiro')
                                                                    echo 'selected'; ?>>Rio de Janeiro</option>
                                <option value="Belo Horizonte" <?php if ($_SESSION['cidadeUsuario'] == 'Belo Horizonte')
                                                                    echo 'selected'; ?>>Belo Horizonte</option>
                            </select>-->
                        </div>
                        <div>
                            <label for="uf">Estado</label>
                            <input type="text" name="uf" id="uf" placeholder="Digite seu estado">
                            <!--<select name="uf" id="uf">
                                <option disabled value="">Selecione seu estado</option>
                                <option value="SP" <?php if ($_SESSION['estadoUsuario'] == 'SP')
                                                        echo 'selected'; ?>>SP
                                </option>
                                <option value="RJ" <?php if ($_SESSION['estadoUsuario'] == 'RJ')
                                                        echo 'selected'; ?>>RJ
                                </option>
                                <option value="BH" <?php if ($_SESSION['estadoUsuario'] == 'BH')
                                                        echo 'selected'; ?>>BH
                                </option>
                            </select>-->
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for=" ">Complemento</label>
                            <input type="text" name="complemento" id="comp" placeholder="Digite o complemento" value="<?php echo $_SESSION['compUsuario']; ?>" />
                        </div>
                        <div>
                            <label for="">País</label>
                            <input type="text" name="pais" id="pais" placeholder="Digite seu pais">
                            <!--<select name="pais" id="pais">
                                <option disabled>Selecione seu país</option>
                                <option value="Brasil" <?php if ($_SESSION['paisUsuario'] == 'Brasil')
                                                            echo 'selected'; ?>>
                                    Brasil</option>
                                <option value="Japão" <?php if ($_SESSION['paisUsuario'] == 'Japão')
                                                            echo 'selected'; ?>>
                                    Japão</option>
                                <option value="Portugal" <?php if ($_SESSION['paisUsuario'] == 'Portugal')
                                                                echo 'selected'; ?>>Portugal</option>
                            </select>-->
                        </div>
                        <div>
                            <span>Foto</span>
                            <label id="label" for="foto">Seleciona uma foto</label>
                            <input type="file" accept="image/*" id="foto">
                        </div>
                    </div>

                    <div class="input-box">
                        <div>
                            <label for="">Descrição</label>
                            <textarea name="desc" id="desc" cols="83" rows="10" placeholder="Digite sua descriçao" value="<?php echo $_SESSION['descUsuario']; ?>"></textarea>
                        </div>
                        <div class="div-image">
                            <div class="image">
                                <img src="../area-voluntario/img/userVoluntario.png" id="img" alt="user-instituição">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="continue-button">
                    <button type="submit"><a href="">SALVAR</a></button>
                </div>
            </form>
        </div>

    </main>








    <script src="../area-instituicao/js/script.js"></script>
    <script src="js/button-image.js"></script>
</body>

</html>