<?php
require 'busca-email.php';

    //var_dump($_POST);
    $email = $_POST['email'];
   
    if (isset($email))
    {   
        $resultado = buscaEmail($email);
        if ($resultado['email']) 
        {
            //$nome = nomeEmail($email);
            echo json_encode(['status' => true, 'nome' => $resultado['nome']]);
        }
        else 
        {
            echo json_encode(['status' => false, 'nome' => '']);
        }
    }

?>