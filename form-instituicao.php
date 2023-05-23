<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-form-voluntario-instituicao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cadastro da Instituição</title>

</head>

<body class="body" id="body">
    <div class="image-fundo">
        <!-- <div id="form1"> -->
        <div class="container" id="primeiroConteudo">
            <div class="form-image">
                <img src="img/muie10.jpg" alt="">
            </div>
            <div class="form">
                <!-- SETAS -->
                <i id="seta-direita-instituicao" class="fa-solid fa-arrow-right"></i>
                <i id="seta-esquerda-instituicao" class="fa-solid fa-arrow-left"></i>
                <!-- TÍTULO -->
                <div class="form-header">
                    <div class="title">
                        <h1 class="titulo-cadastro">Cadastro da Instituição</h1>
                    </div>
                </div>

                <!-- BOTÕES PARA MUDAR OS CAMPOS DO FORMULÁRIO -->
                <div id="select-button">
                    <button id="botao-dados-pessoais-i">Dados comerciais</button>
                    <button id="botao-endereco-i">Endereço</button>
                </div>

                <!-- FORMULÁRIO COMPLETO -->
                <form class="formulario-completo" id="formulario-instituicao" action="cadastra-instituicao.php" method="POST">
                    <div id="formulario1">
                        <div class="input-group">
                            <div class="input-box">
                                <label for="name">Nome</label>
                                <input type="name" name="name" class="inputs required" id="name" placeholder="Digite seu nome" oninput="nameValidate()">
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone1" class="inputs required" id="telefone" placeholder="Digite seu telefone" oninput="foneValidate()">
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box">
                                <label for="telefone">Telefone(Opcional)</label>
                                <input type="text" name="telefone2" class="inputs required" id="telefone2" placeholder="Digite seu telefone" oninput="foneOpcValidate()">
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" name="cnpj" class="inputs required" id="cnpj" placeholder="Digite seu CNPJ" oninput="cnpjValidate()">
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="inputs required" id="email" placeholder="Digite seu email" oninput="emailValidate()">
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box" id="input-box-senha">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" class="inputs required" id="senha" placeholder="Digite sua senha" oninput="passwordValidate()">
                                <span class="span-required"></span>
                            </div>
                            <div class="input-box" id="input-box-confirmar-senha">
                                <label for="senha">Confirmar senha</label>
                                <input type="password" name="confSenha" class="inputs required" id="senha" placeholder="Digite sua senha" oninput="confirmPassword()">
                                <span class="span-required"></span>
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
                                <input type="text" name="numeroCasa" id="numeroCasa" placeholder="Digite o n° da sua casa">
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
                                <label for="complemento">Complemento</label>
                                <input type="text" name="complemento" id="complemento" placeholder="Digite o complemento">
                            </div>
                            <div class="input-box">
                                <label for="cidade">Cidade</label>
                                <input name="cidade" id="cidade" readonly>
                            </div>
                            <div class="input-box">
                                <label for="uf">UF</label>
                                <input name="uf" id="uf" readonly>
                            </div>
                            <div class="input-box">
                                <label for="pais">País</label>
                                <input name="pais" id="pais" placeholder="Digite o país"></select>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div id="continue-button">
                        <button type="submit">CADASTRAR</button>
                        <a href="opcao-cadastro.php">Voltar para opções de cadastro</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </div>



    <!-- <script src="js/script.js"></script> -->
    <!-- <script src="js/valida-instituicao.js"></script>  -->
    <script src="js/endereco-auto.js"></script>
    <!-- <script src="js/mascara.js"></script> -->
    
    <!--Máscaras do formulário-->
    <script src="js/mascarasForm.js"></script>
    <script>
        adicionarMascaraTelefone('#telefone');
        adicionarMascaraTelefone('#telefone2');
        adicionarMascaraCnpj('#cnpj');
        adicionarMascaraCep('#cep'); 

    </script>



    <script>
        const form1 = document.querySelector("#formulario1");
        const form2 = document.querySelector("#formulario2");
        const botaoDados = document.querySelector("#botao-dados-pessoais-i");
        const botaoEndereco = document.querySelector("#botao-endereco-i");
        const setaDireita = document.querySelector("#seta-direita-instituicao")
        const setaEsquerda = document.querySelector("#seta-esquerda-instituicao")

        botaoEndereco.addEventListener('click', function() {
            // oculta o Formulário 1
            form1.style.display = 'none';

            // exibe o Formulário 2
            form2.style.display = 'flex';

            // MUDAR COR DO BOTÃO QUANDO TIVER NA SESSÃO RESPECTIVA  
            botaoEndereco.style.backgroundColor = "#4567a5";
            botaoEndereco.style.color = "#fff";

            botaoDados.style.backgroundColor = "#fff";
            botaoDados.style.color = "#6588c9";

            //SETAS
            setaDireita.style.display = "none"
            setaEsquerda.style.display = "block"
        });

        botaoDados.addEventListener('click', function() {

            // exibe o Formulário 1
            form1.style.display = 'flex';

            //oculta o Formulário 2
            form2.style.display = 'none';

            // MUDAR COR DO BOTÃO QUANDO TIVER NA SESSÃO RESPECTIVA
            botaoDados.style.backgroundColor = "#4567a5";
            botaoDados.style.color = "#fff";

            botaoEndereco.style.backgroundColor = "#fff";
            botaoEndereco.style.color = "#6588c9";

            // SETAS
            setaEsquerda.style.display = "none"
            setaDireita.style.display = "block"
        });

        setaDireita.addEventListener('click', function() {
            // oculta o Formulário 1
            form1.style.display = 'none';

            // exibe o Formulário 2
            form2.style.display = 'flex';

            // MUDAR COR DO BOTÃO QUANDO TIVER NA SESSÃO RESPECTIVA  
            botaoEndereco.style.backgroundColor = "#4567a5";
            botaoEndereco.style.color = "#fff";

            botaoDados.style.backgroundColor = "#fff";
            botaoDados.style.color = "#4567a5";

            //SETAS
            setaDireita.style.display = "none"
            setaEsquerda.style.display = "block"
        })

        setaEsquerda.addEventListener('click', function() {

            // exibe o Formulário 1
            form1.style.display = 'flex';

            //oculta o Formulário 2
            form2.style.display = 'none';

            // MUDAR COR DO BOTÃO QUANDO TIVER NA SESSÃO RESPECTIVA
            botaoDados.style.backgroundColor = "#4567a5";
            botaoDados.style.color = "#fff";

            botaoEndereco.style.backgroundColor = "#fff";
            botaoEndereco.style.color = "#4567a5";
            setaEsquerda.style.display = "none"
            setaDireita.style.display = "block"
        })
    </script>
</body>

</html>