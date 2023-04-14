<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../area-instituicao/css/estilo-arquivo-modelo.css">
        <link rel="stylesheet" href="css/estilo-adicionar-causas-voluntario.css">
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
                    <a href="editar-perfil-voluntario-atualizado.php"> <i class="fa-solid fa-pen-to-square"></i> <span class="nav-lateral-topico"> Editar Perfil </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="adicionar-causas-voluntario.php"> <i class="fa-sharp fa-solid fa-heart"></i> <span class="nav-lateral-topico"> Adicionar Causas </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="vagas-voluntario.php"> <i class="fa-solid fa-briefcase"></i> <span class="nav-lateral-topico"> Vagas </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="trocar-senha-voluntario.php"> <i class="fa-solid fa-key"></i> <span class="nav-lateral-topico">Trocar Senha </span></a>
                </div>

                <div class="nav-lateral-box-icon">
                    <a href="excluir-conta-voluntario.php"> <i class="fa-solid fa-xmark" id="nav-lateral-icon-excluir"></i> <span class="nav-lateral-topico">Excluir Conta </span></a>
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
        
            <div class="main-conteudo-container-titulo">
                <h1> ADICIONAR CAUSAS </h1>
                <p> Aqui você pode adicionar as causas com as quais mais se identifica ou que deseja
                    ajudar. Isso ajudará na filtragem de vagas para que apareça as mais adequadas para você.    
                </p>
            </div>

            <!-- COLOCAR TODO O CONTEÚDO DENTRO DESSA SESSÃO -->

            <!-- CAUSAS -->
            <div class="container-conteudo-completo">
                <form class="form-causas" action="" method="post">
                    <div class="box-filtro-causas">
                    <div class="filtro-causas"> Selecione as causas... </div>
                        <div class="box-causas">
                                <?php 
                                    for($i = 1; $i <= 10; $i++)
                                    {
                                ?>      
                                        <div class="box-causas-checkbox">
                                            <input type="checkbox" name="causas" id="causas"> 
                                            <label for="causas"> Mulheres </label>
                                        </div>
                                    
                                <?php
                                    }
                                ?>  
                        </div>
                    </div>

                    <button type="submit" class="form-botao-adicionar"> Adicionar </button>
                </form>
            

                <div class="causas">
                    <div class="titulo-card">
                        <div class="icon-titulo-card">
                            <i class="fa-sharp fa-solid fa-heart"></i>
                            <h6>Causas ajudadas</h6>
                        </div>
                    </div>
                
                    <div class="tipo-causas">
                        <?php 
                            for($i = 1; $i <= 4; $i++)
                            {
                        ?>
                                <a href=""><button id="tipo-causas-1">animais</button></a>
                        <?php
                            }
                        ?>
                        
                    </div>
                </div>

            </div>
           

        </main>





        
        <!-- SCRIPITS -->
        <script src="../area-instituicao/js/script.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>