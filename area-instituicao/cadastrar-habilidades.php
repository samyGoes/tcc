<?php
    require_once 'global.php';  

    try
    {
        header('Location: form-cadastrar-habilidades-instituicao.php');
        
        $habilidadeServico = new HabilidadeServ();

    
        //Inserindo os dados vindos do formulário nos atributos da classe
        $habilidadeServico -> setNomeHabilidade($_POST ['nome']);
       

        $cadastrar = HabilidadeServicoDao::cadastrar($habilidadeServico);

    }
    catch(Exception $e)
    {
        echo "Erro cadastra-voluntario";
        echo '<pre>';
            echo($e);
        echo '</pre>';
         
    }
?>