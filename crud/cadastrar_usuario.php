<?php 

require_once("../config/conexao.php");
@session_start();


//PARAMÊTRO PARA ENTRAR NA CONDIÇÃO DE CADASTRAR USUARIO
@$nome = $_POST['nome'];
$cliente_fid = 0;

//verificar duplicaidade de dados
$res = $pdo->query("SELECT * from clientes where nome = '$nome'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);
if($linhas > 0){
   ?>
    <script language='javascript'>
    alert("Usuario já Cadastrado, por favor cadastre um novo usuario");
    window.location='http://localhost/testeAdmin/index.php'; </script>
    <?php 
    exit();
}

   
@$nome = $_POST['nome'];
@$telefone = $_POST['telefone'];
@$email = $_POST['email'];




	$res = $pdo->prepare("INSERT into clientes (nome, telefone, email, cliente_fid) values (:nome, :telefone, :email, :cliente_fid)");

	
	$res->bindValue(":nome", $nome);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);
	$res->bindValue(":cliente_fid", $cliente_fid);
	
	
	$res->execute();

	?>
    <script language='javascript'>
    alert("Cadastrado com Sucesso!!");
    window.location='http://localhost/testeAdmin/index.php'; </script>
    <?php 
    exit();
?>