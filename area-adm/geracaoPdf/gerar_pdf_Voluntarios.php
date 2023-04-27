<?php

//INCLUINDO O AUTOLOAD E A CONEXAO COM O BANCO
require './vendor/autoload.php';
include_once ('../../model/Conexao.php');

//USANDO O DOMPDF
use Dompdf\Dompdf;

//INSTANCIANDO O DOMPDF
$dompdf = new Dompdf();

//HORARIO E FUSIO HORARIO
$timezone = new DateTimeZone ('America/Sao_Paulo');
$agora = new DateTime('now', $timezone);


//CONECTANDO E SELECT DO BANCO DE DADOS
$conectar = Conexao::conectar();

$query_voluntarios = "SELECT codVoluntario, nomeVoluntario, emailVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario FROM tbVoluntario";

$resultado_voluntarios = $conectar->prepare ($query_voluntarios);

$resultado_voluntarios->execute();



//CODIGO HTML

$html = <<<'ENDHTML'
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gerarPdf.css">
    <title>Relatorio</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            border: 1px solid #000;
            color: #000;
            padding: 10px;
            text-align: center;
            
        }

        hr{
            color: #000
        }

        .titulos{
            text-align: center;
            font-weight: bold;
        }

        .text-titulos{
            font-size: 13px;
            font-weight: bold;
        }

        h1 {
            margin: 0;
        }

        .conteudo{
            padding: 20px;
            border: 1px solid #CCC;
        }

        footer{
            display: flex;
            height: 35px;
            margin-top: 15px;
            justify-content: center;
            align-items: center;
            text-align: center;
            border: 2px solid #000;
        }
    </style>

    
</head>
 <body>
    <div class="header">
        <h2> CONECTA </h2>
ENDHTML;

        $html .= "<p>EMITIDO EM " . $agora-> format('d/m/Y H:i'). "<p>";

$html .= <<<'ENDHTML'
    </div>

    <div class="titulos">
        <h4>RELATÓRIO DE VOLUNTÁRIOS CADASTRADOS </h4>
        <hr>
        <font>Relatório de Voluntários Cadastrados</font>
        <hr>
    </div>

    <div class="conteudo">
        <font class="text-titulos">Dados do voluntários</font><br>
        <hr>
ENDHTML;
 

    while ($row_voluntario = $resultado_voluntarios->fetch(PDO::FETCH_ASSOC)) {
        extract($row_voluntario);
        $html.= "<b>Numero do cadastro: </b> $codVoluntario <br>";
        $html.= "<b>Nome: </b> $nomeVoluntario <br>";
        $html.= "<b>E-mail: </b> $emailVoluntario <br>";
        $html.= "<b>Cidade: </b> $cidadeVoluntario <b>Estado: </b> $estadoVoluntario <b>País: </b> $paisVoluntario <br>";
        $html.= "<hr>";
    }

$html .= <<<'ENDHTML'
    </div>

    <footer>
    <p>
        CONECTA | AION - Rua Feliciano de Mendonça, 290 - Guaianases, São Paulo - SP
        , 08460-365 - Telefone: (11) 2551-9484
    </p>
    </footer>
    </body>
</html>
ENDHTML;



//CARREAGANDO O CODIGO HTLM;  ESCOLHANDO OPÇOES DO PDF;  RENDERIZANDO CODIGO;  EXIBINDO NO PDF
$dompdf -> loadHtml($html);

$dompdf-> setPaper('A4', 'portrait');

$dompdf-> render();

$dompdf-> stream('Relatorio de Voluntário');

?>