<?php
include_once ("./config/conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reservas</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>

    <H3>CADASTRAR CLIENTE</H3>

    <form id="Cadastro_usuario" action="./crud/cadastrar_usuario.php" method="post">  
    
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required>
        <br>

        <label for="telefone">telefone</label>
        <input type="tel" name="telefone" id="telefone" required>

        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <br>
        <button type="submit" id="Cadastrar1">CADASTRAR CLIENTE</button>  

    </form>

    <div align="center" id="mensagem1" class="">

    </div>

    <h2>Escolha em qual hotel da rede irá fazer a reserva</h2>
        
    <form action="./crud/inserir_reserva.php" method="post">

        <select name="cliente" id="cliente" required>
        <option value="" disabled="disabled" selected >Selecione o Cliente</option>
       
							<?php 

								//TRAZER TODOS OS REGISTROS EXISTENTES
							$res = $pdo->query("SELECT * from clientes order by nome asc");
							$dados = $res->fetchAll(PDO::FETCH_ASSOC);

							for ($i=0; $i < count($dados); $i++) { 
								foreach ($dados[$i] as $key => $value) {
								}

								$id_cliente = $dados[$i]['id'];	
								$nome_cliente = $dados[$i]['nome'];


								echo '<option value="'.$id_cliente.'">'.$nome_cliente.'</option>';

							}
							?>
                            </select>
        <br>
        <select name="rede" id="rede" required>
            <option value="" disabled="disabled" selected>Selecione um Hotel da rede</option>
            <option value="Mar Atlantico">Mar Atlantico * * * * *</option>
            <option value="Jardim Botânico">Jardim Botânico * * * *</option>
            <option value="Parque das Flores">Parque das Flores * * *</option>       
        </select>
        <br>
        <label for="data_entrada">Data de Entrada</label>
        <input class="form-control form-control-navbar" type="date" name="data_entrada" id="data_entrada" placeholder="Buscar" aria-label="Search" required>
    
        <br>
        <label for="data_saida">Data de Saida</label>
        <input class="form-control form-control-navbar" type="date" name="data_saida" id="data_saida" placeholder="Buscar" aria-label="Search" required>
    
        <br>
        <select name="dia_semana" id="dia_semana" required>
            <option value="" disabled="disabled" selected>Selecione o dia da entrada</option>
            <option value="Segunda">Segunda-Feira</option>
            <option value="Terça">Terça-Feira</option>
            <option value="Quarta">Quarta-Feira</option>
            <option value="Quinta">Quinta-Feira</option>
            <option value="Sexta">Sexta-Feira</option>
            <option value="Sabado">Sábado</option>
            <option value="Domingo">Domingo</option>
        </select>
        <br>
        <button type="submit" id="Salvar">SALVAR RESERVA</button>
    
    </form>



    <div align="center" id="mensagem" class="">

    </div>

<br>
   <a href="./crud/lista_reservas.php">Ir para as reservas</a>



                  
</body>


</html>

<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
//AJAX PARA CADASTRAR USUARIO, ACHEI MELHOR USAR O SUBMIT PARA LISTAR O USUARIO NO CADASTRO.
   $(document).ready(function(){
         /*
        $('#Cadastrar').click(function(event){
            event.preventDefault();
            
            $.ajax({
                url:"cadastrar_usuario.php",
                method: "post",
                data: $('#Cadastro_usuario').serialize(),
                dataType: "text",
                success: function(mensagem){

                    $('#mensagem1').removeClass()

                    if(mensagem == 'Cadastrado com Sucesso!!'){
                        
                        $('#mensagem1').addClass('text-success')

                        $('#nome').val('');
                        $('#telefone').val('');
                        $('#email').val('');

                        
                       

                    }else{
                        
                        $('#mensagem1').addClass('text-danger')
                    }
                    
                    $('#mensagem1').text(mensagem)

                },
                
            })
        })
        */
        $('#Salvar').click(function(event){
            event.preventDefault();
            
            $.ajax({
                url:"./crud/inserir_reserva.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem){

                    $('#mensagem').removeClass()

                    if(mensagem == 'Reservado com Sucesso!!'){
                        
                        $('#mensagem').addClass('text-success')

                       

                    }else{
                        
                        $('#mensagem').addClass('text-danger')
                    }
                    
                    $('#mensagem').text(mensagem)

                },
                
            })
        })
    })
</script>

