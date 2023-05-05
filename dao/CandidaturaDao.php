<?php 
  
    require_once 'global.php';
    
    class CandidaturaDao
    {

        public static function listar($idInstituicao) {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT tbCandidatura.codCandidatura, tbInstituicao.codInstituicao, tbVoluntario.nomeVoluntario, tbVoluntario.cidadeVoluntario, tbVoluntario.estadoVoluntario, tbVoluntario.paisVoluntario, tbServico.nomeservico, tbVoluntario.fotoVoluntario
            FROM tbCandidatura
            INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
            INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
            INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
            WHERE tbInstituicao.codInstituicao = ?
            ";
            
            /*"SELECT codCandidatura, codInstituicao, nomeVoluntario, cidadeVoluntario, estadoVoluntario, paisVoluntario, nomeservico, fotoVoluntario
                FROM tbCandidatura
                INNER JOIN tbVoluntario ON tbCandidatura.codVoluntario = tbVoluntario.codVoluntario
                INNER JOIN tbServico ON tbCandidatura.codServico = tbServico.codServico
                INNER JOIN tbInstituicao ON tbServico.codInstituicao = tbInstituicao.codInstituicao
                WHERE tbInstituicao.codInstituicao = ?";*/
            $resultado = $conexao->prepare($querySelect);
            $resultado->execute(array($idInstituicao));
            $lista = $resultado->fetchAll();
            return $lista;
        }
        
        


        public static function atualizarStatus(){
            $conexao = Conexao :: conectar();

            $queryAceito = "UPDATE tbCandidatura SET statusCandidatura = 'aceito' WHERE codCandidatura = ?";
            $resultado = $conexao -> query($queryAceito);
            $status = $resultado ->fetchAll();
            return $status;
        }

        public static function deletarCandidatura(){
            $conexao = Conexao :: conectar();
            
            $queryRejeitado = "DELETE FROM tbCandidatura WHERE codCandidatura = ?";

            $resultado = $conexao ->query($queryRejeitado);
            $status = $resultado ->fetchAll();
            return $status;
        }

        public static function cadastrar($candidato,$vaga,$status)
        {
            $conexao = Conexao :: conectar();

            $prepareStatement = $conexao -> prepare ( "INSERT INTO tbcandidatura(codVoluntario,codServico,statusCandidatura) 
            VALUES(?,?,?)");

            $prepareStatement -> bindValue (1, $candidato);
            $prepareStatement -> bindValue (2, $vaga);
            $prepareStatement -> bindValue (3, $status);
            $prepareStatement -> execute();
        }

        //$queryRejeitado = "UPDATE tbCandidatura SET statusCandidatura = 'rejeitado'";
    }
?>