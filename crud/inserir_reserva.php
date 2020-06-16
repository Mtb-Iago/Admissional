<?php 

require_once("../config/conexao.php");
@session_start();


//PARAMÊTRO PARA ENTRAR NAS CONDIÇÕES 

@$data_entrada = $_POST['data_entrada'];
@$data_saida = $_POST['data_saida'];
@$dia_semana = $_POST['dia_semana'];
@$rede = $_POST['rede'];
@$cliente = $_POST['cliente'];

@$hotel = $rede;




if(@$data_entrada == ''){
	echo "Preencha a data de entrada!";
	
	exit();
}
if ($data_entrada > $data_saida) {
	echo ("A data de entrada não pode ser depois da data de saída!!");
	exit();
}
//CALCULO PARA OBTER O NÚMERO DE DIAS QUE O CLIENTE VAI FICAR HOSPEDADO.
$data_entrada = $_POST['data_entrada'];
$hoje = $_POST['data_saida'];
$data1 = new DateTime($data_entrada );
$data2 = new DateTime($data_saida);

$intervalo = $data1->diff( $data2 );

if ($rede == 'Jardim Botânico') {
   
	$res = $pdo->prepare("INSERT into reserva (data_entrada, data_saida, dia_semana, hotel, cliente) values (:data_entrada, :data_saida, :dia_semana, :hotel, :cliente)");

	
	$res->bindValue(":data_entrada", $data_entrada);
	$res->bindValue(":data_saida", $data_saida);
	$res->bindValue(":dia_semana", $dia_semana);
	$res->bindValue(":hotel", $hotel);
	$res->bindValue(":cliente", $cliente);
	
	
	$res->execute();

	//INCREMENTA O CARTÃO FIDELIDADE AO CLIENTE;
	$res_p = $pdo->query("SELECT * from clientes where id = '$cliente'");
	$dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);
	$linhas_p = count($dados_p);
	
	if($linhas_p > 0){
	
	$cliente_fid = $dados_p[0]['cliente_fid'];
	$cliente_fid = $cliente_fid + 1;
	

	$res_p = $pdo->query("UPDATE clientes set cliente_fid = '$cliente_fid' where id = '$cliente'");
	}	
	echo "Reservado com Sucesso!! \n";

	
	if ($cliente_fid >= 2){	
		if ($dia_semana == 'Sexta' || $dia_semana == 'Sabado' || $dia_semana == "Domingo") {
			$valor = 50 * $intervalo->d;
			echo "\nO valor da reserva é R$: {$valor},00";
		}else{
			$valor = 110 * $intervalo->d;
			echo "O valor da reserva é R$: {$valor},00";
		}
	}else
		if ($dia_semana == 'Sexta' || $dia_semana == 'Sabado' || $dia_semana == "Domingo") {
			$valor = 60 * $intervalo->d;
			echo "O valor da reserva é R$: {$valor},00";
		}else{
			$valor = 160 * $intervalo->d;
			echo "O valor da reserva é R$: {$valor},00";
	}
    


}elseif ($rede == 'Mar Atlantico') {

if($data_entrada == ''){
	echo "Preencha a data de entrada!";
	    
	exit();
}

	$res = $pdo->prepare("INSERT into reserva (data_entrada, data_saida, dia_semana, hotel, cliente) values (:data_entrada, :data_saida, :dia_semana, :hotel, :cliente)");

	
	$res->bindValue(":data_entrada", $data_entrada);
	$res->bindValue(":data_saida", $data_saida);
	$res->bindValue(":dia_semana", $dia_semana);
	$res->bindValue(":hotel", $hotel);
	$res->bindValue(":cliente", $cliente);

	
	$res->execute();

	
	//INCREMENTA O CARTÃO FIDELIDADE AO CLIENTE;
	$res_p = $pdo->query("SELECT * from clientes where id = '$cliente'");
	$dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);
	$linhas_p = count($dados_p);
	
	if($linhas_p > 0){
	
	$cliente_fid = $dados_p[0]['cliente_fid'];
	$cliente_fid = $cliente_fid + 1;
	

	$res_p = $pdo->query("UPDATE clientes set cliente_fid = '$cliente_fid' where id = '$cliente'");
	}	
	echo "Reservado com Sucesso!!";

	if ($cliente_fid >= 2){	
		if ($dia_semana == 'Sexta' || $dia_semana == 'Sabado' || $dia_semana == "Domingo") {
			$valor = 40 * $intervalo->d;
			echo "O valor da reserva é R$: {$valor},00";
		}else{
			$valor = 100 * $intervalo->d;
			echo "O valor da reserva é R$: {$valor},00";
		}
	}else
		if ($dia_semana == 'Sexta' || $dia_semana == 'Sabado' || $dia_semana == "Domingo") {
			$valor = 150 * $intervalo->d;
			echo "O valor da reserva é R$: {$valor},00";
		}else{
			$valor = 220 * $intervalo->d;
			echo "O valor da reserva é R$: {$valor},00";
	}
   

}elseif ($rede == 'Parque das Flores') {
    
   
    if($data_entrada == ''){
        echo "Preencha a data de entrada!";
        
        exit();
    }

   
	$res = $pdo->prepare("INSERT into reserva (data_entrada, data_saida, dia_semana, hotel, cliente) values (:data_entrada, :data_saida, :dia_semana, :hotel, :cliente)");

	
	$res->bindValue(":data_entrada", $data_entrada);
	$res->bindValue(":data_saida", $data_saida);
	$res->bindValue(":dia_semana", $dia_semana);
	$res->bindValue(":hotel", $hotel);
	$res->bindValue(":cliente", $cliente);

	
	$res->execute();
	
	//INCREMENTA O CARTÃO FIDELIDADE AO CLIENTE;
	$res_p = $pdo->query("SELECT * from clientes where id = '$cliente'");
	$dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);
	$linhas_p = count($dados_p);
	
	if($linhas_p > 0){
	
	$cliente_fid = $dados_p[0]['cliente_fid'];
	$cliente_fid = $cliente_fid + 1;
	

	$res_p = $pdo->query("UPDATE clientes set cliente_fid = '$cliente_fid' where id = '$cliente'");
	}	

	echo "Reservado com Sucesso!!";

	if ($cliente_fid >=2){	
		if ($dia_semana == 'Sexta' || $dia_semana == 'Sabado' || $dia_semana == "Domingo") {
			$valor = 80 * $intervalo->d;
			echo "O valor da reserva é R$: {$valor},00";
		}else{
			$valor = 80 * $intervalo->d;
			echo "O valor da reserva é R$: {$valor},00";
		}
	}else
		if ($dia_semana == 'Sexta' || $dia_semana == 'Sabado' || $dia_semana == "Domingo") {
			$valor = 90 * $intervalo->d;
			echo "O valor da reserva é R$: {$valor},00";
		}else{
			$valor = 110 * $intervalo->d;
			echo "O valor da reserva é R$: {$valor},00";
	}
    
}



?>