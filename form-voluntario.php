<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link rel="stylesheet" href="css/style-form-voluntario-instituicao.css">
        <title>Cadastro Usuario</title>

    </head>

    <body class="body">
        <div class="image-fundo">
            <!-- <div id="form1"> -->
                <div class="container" id="primeiroConteudo">
                    <div class="form-image">
                        <img src="img/mao4.jpg" alt="">
                    </div>
                    <div class="form">
                        
                        <!-- TÍTULO -->
                        <div class="form-header">
                            <div class="title">
                                <h1 class="titulo-cadastro">Cadastro do Voluntário </h1>
                            </div>
                        </div>

                        <!-- BOTÕES PARA MUDAR OS CAMPOS DO FORMULÁRIO -->
                        <div class="select-button">
                            <button id="botao-dados-pessoais" type="button">Dados pessoais</button>
                            <button id="botao-endereco" type="button">Endereço</button>
                        </div>

                        <!-- FORMULÁRIO COMPLETO -->
                        <form class="formulario-completo" id="formulario" action="cadastra-voluntario.php" method="POST">
                            <div id="formulario1">
                                <div class="input-group">
                                    <div class="input-box">
                                        <label for="name">Nome Completo</label>
                                        <input type="text" name="nome" class="inputs required" id="name" oninput="nameValidate()" placeholder="Digite seu nome">
                                        <span class="span-required">O nome deve conter no minimo 3 caracteres</span>
                                    </div>
                                    <div class="input-box">
                                        <label for="date">Data de Nascimento</label>
                                        <input type="text" name="date" id="date" pattern="\d{2}/\d{2}/\d{4}" placeholder="Digite sua data de nasc...">
                                    </div>
                                    <div class="input-box">
                                        <label for="cpf">CPF</label>
                                        <input type="text" name="cpf" class="inputs required" id="cpf"  placeholder="Digite seu CPF" oninput="cpfValidate()">
                                    </div>
                                    <div class="input-box">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" name="telefone1" id="telefone" placeholder="Digite seu telefone">
                                    </div>
                                    <div class="input-box">
                                        <label for="telefone">Telefone (opcional)</label>
                                        <input type="text" name="telefone2" id="telefone" placeholder="Digite seu telefone">
                                    </div>
                                    <div class="input-box">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="inputs required" oninput="emailValidate()" id="email" placeholder="Digite seu email">
                                    </div>
                                    <div class="input-box">
                                        <label for="senha">Senha</label>
                                        <input type="password" name="senha"class="inputs required" id="senha" placeholder="Digite sua senha" oninput="passwordValidate()">
                                    </div>
                                    <div class="input-box">
                                        <label for="senha">Confirmar senha</label>
                                        <input type="password" name="confSenha" class="inputs required" id="senha" placeholder="Digite sua senha" oninput="passwordValidate()">
                                    </div>
                                </div>
                            </div>


                            <!-- ENDEREÇO -->
                            <div id="formulario2" style="display: none;">
                                <div class="input-group">
                                    <div class="input-box">
                                        <label for="cep">CEP</label>
                                        <input type="text" name="cep" id="cep" placeholder="Digite seu CEP">
                                    </div>
                                    <div class="input-box">
                                        <label for="numeroCasa">Número</label>
                                        <input type="text" name="numLog" id="numeroCasa" placeholder="Digite o n° da sua casa">
                                    </div>
                                    <div class="input-box">
                                        <label for="logradouro">Logradouro</label>
                                        <input type="text" name="logradouro" id="logradouro" readonly>
                                    </div>
                                    <div class="input-box">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" name="bairro" id="bairro" readonly>
                                    </div>
                                    <div class="input-box">
                                        <label for="comp">Complemento</label>
                                        <input type="text" name="complemento" id="comp" placeholder="Digite o complemento">
                                    </div>
                                    <div class="input-box">
                                        <label for="uf">Estado</label>
                                        <input name="uf" id="uf" readonly>
                                    </div>
                                    <div class="input-box">
                                        <label for="cidade">Cidade</label>
                                        <input name="cidade" id="cidade" readonly>
                                    </div>
                                    <div class="input-box">
                                        <label for="pais">País</label>
                                        <input name="pais" id="pais" placeholder="Digite seu país">
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="continue-button">
                                <button type="submit">CADASTRAR</button>
                                <a href="opcao-cadastro.php">Voltar para opções de cadastro</a>
                            </div>
                        </form>
                    </div>
                </div>
            <!-- </div> -->
        </div>



        <!-- <script src="js/script.js"></script> -->
        <script src="js/validacoes.js"></script>
        <script src="js/endereco-auto.js"></script>
        <script src="js/mascara.js"></script>
        <script>
            const form1 = document.querySelector("#formulario1");
            const form2 = document.querySelector("#formulario2");
            const botaoDados = document.querySelector("#botao-dados-pessoais");
            const botaoEndereco = document.querySelector("#botao-endereco");

            botaoEndereco.addEventListener('click', function () {
                // oculta o Formulário 1
                form1.style.display = 'none';

                // exibe o Formulário 2
                form2.style.display = 'flex';

                // MUDAR COR DO BOTÃO QUANDO TIVER NA SESSÃO RESPECTIVA  
                botaoEndereco.style.backgroundColor = "#cf8a3f";
                botaoEndereco.style.color = "#fff";

                botaoDados.style.backgroundColor = "#fff";
                botaoDados.style.color = "#cf8a3f";
                      
            });

            botaoDados.addEventListener('click', function () {

                 // exibe o Formulário 1
                form1.style.display = 'flex';

                //oculta o Formulário 2
                form2.style.display = 'none';

                // MUDAR COR DO BOTÃO QUANDO TIVER NA SESSÃO RESPECTIVA
                botaoDados.style.backgroundColor = "#cf8a3f";
                botaoDados.style.color = "#fff";

                botaoEndereco.style.backgroundColor = "#fff";
                botaoEndereco.style.color = "#cf8a3f";
                            
            });
        </script>
    </body>
</html>