<?php
session_start();

include_once '../config/conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>LISTA DE RESERVAS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
    </head>

    <body>
    <a href="http://localhost/testeAdmin/index.php">INICIO</a>

        <h1>Lista de reservas</h1>
       
        <table>
            <tr id="titulo">
                <td>ID </td>
                <td>| HOTEL</td>
                <td>| DATA DE ENTRADA</td>
                <td>| DATA DE SAÍDA</td>
                <td>| DIA DA ENTRADA</td>
                <td>| ID DO CLIENTE</td>
                <td>DELETAR RESERVA</td>
                
            </tr>
            <?php
           $res = $pdo->query("SELECT * from reserva order by id asc");
           $dados = $res->fetchAll(PDO::FETCH_ASSOC);
               foreach ($dados as $v ) { ?>
                <tr>
                <td> <?php echo $v['id']; ?> </td>
                <td> <?php echo $v['hotel']; ?> </td>
                <td> <?php echo $v['data_entrada']; ?> </td>
                <td> <?php echo $v['data_saida']; ?> </td>
                <td> <?php echo $v['dia_semana']; ?> </td>
                <td> <?php echo $v['cliente']; ?> </td>
                <td><b> <a style="color:red;margin:0px;padding:0px;" href="lista_reservas.php?id_exc=<?php echo $v['id']; ?> ">Excluir</a> </b></td>

                
            </tr>
               <?php }
                ?>        
            
        </table>



        <h1>Lista de Clientes</h1>
       
        <table>
            <tr id="titulo">
                <td>ID </td>
                <td>| NOME</td>
                <td>| TELEFONE</td>
                <td>| EMAIL</td>
                <td>| CARTÃO FIDELIDADE</td>
               
                <td>DELETAR CLIENTE</td>
                
            </tr>
            <?php
           $res1 = $pdo->query("SELECT * from clientes order by id asc");
           $dados1 = $res1->fetchAll(PDO::FETCH_ASSOC);
               foreach ($dados1 as $v1 ) { ?>
                <tr>
                <td> <?php echo $v1['id']; ?> </td>
                <td> <?php echo $v1['nome']; ?> </td>
                <td> <?php echo $v1['telefone']; ?> </td>
                <td> <?php echo $v1['email']; ?> </td>
                <td> <?php echo $v1['cliente_fid']; ?> </td>
               
                <td><b> <a style="color:red;margin:0px;padding:0px;" href="lista_reservas.php?id_exc1=<?php echo $v1['id']; ?> ">Excluir</a> </b></td>

                
            </tr>
               <?php }
                ?>        
            
        </table>



    </body>
</html>








 <?php

if(isset($_GET['id_exc']))
{

$id = addslashes($_GET['id_exc']);

                 // FUNÇÃO PARA DELETAR RESERVAS
                
                 
            $cmd = $pdo->prepare("DELETE FROM reserva WHERE id = :id_c");
            $cmd->bindValue(":id_c", $id);
            $cmd->execute();

                   
                    ?>
                    <script language='javascript'>window.location='lista_reservas.php'; </script>
                    <?php
}  


//FUNÇÃO PARA DELETAR USUARIOS
if(isset($_GET['id_exc1']))
{

$id1 = addslashes($_GET['id_exc1']);

            $cmd1 = $pdo->prepare("DELETE FROM clientes WHERE id = :id_d");
            $cmd1->bindValue(":id_d", $id1);
            $cmd1->execute();

                   
                    ?>
                    <script language='javascript'>window.location='lista_reservas.php'; </script>
                    <?php
}  

?>

