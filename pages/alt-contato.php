<?php
    $id = $_GET['id'];

    // Parametriza a conexão com o banco de dados
    $host     = "localhost:3306";
    $user     = "root";
    $password = "";
    $database = "agenda";

    // Faz a conexão com o servidor MySQL
    $con = mysqli_connect($host, $user, $password);

    // Verifica se ocorreu erro de conexão
    if (!$con) {
        // Se sim, então encerra o programa com uma mensagem de erro
        die("Erro de conexão com o servidor do BD");
    }

    // Determina qual banco de dados que será utilizado
    $db = mysqli_select_db($con, $database);

    // Verifica se ocorreu erro na seleção
    if (!$db) {
        // Se sim, então encerra o programa com uma mensagem de erro
        die("Erro ao selecionar o banco de dados.");
    }

    // Cria a sentença SQL para buscar as contatos
    $sql = "select * from tbl_contatos where id=$id";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once('header.php'); ?>
</head>

<body class="back-register">
	<?php include_once('nav-dashboard.php'); ?>

	<div class="register-box">
		<div class="register-box-body">
			<div class="row" style="text-align: center">
				<span class="register-title">
					Cadastro de Contatos
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle">Forneça os dados abaixo</p>
			</div>

			<!-- Formulário de cadastramento de contatos-->
			<form action="altera-contato.php" method="post" autocomplete="off">
			<input type="hidden" name="id" value="<?php echo $row[0]; ?>" >
				<!-- nome Contato -->
				<div class="input-group">
					<span class="input-group-addon" id="input-nome">
						<span class="fas fa-address-book"></span>
					</span>
					<input type="text" class="form-control"
						name="nome" required placeholder="Nome Completo"
						aria-describedby="input-nome_contato"
						value="<?php echo $row[1]; ?>">
				</div>
				<br>

                <!-- Endereço -->
				<div class="input-group">
					<span class="input-group-addon" id="input-endereco">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control"
						name="endereco" required placeholder="Endereço"
						aria-describedby="input-endereco_contato"
						value="<?php echo $row[2]; ?>">
				</div>
				<br>

                <!-- nro endereço -->
				<div class="input-group">
					<span class="input-group-addon" id="input-nro-endereco">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control"
						name="nro_endereco" required placeholder="Numero"
						aria-describedby="input-nro_endreco_contato"
						value="<?php echo $row[3]; ?>">
				</div>
				<br>

                <!-- Complemento -->
				<div class="input-group">
					<span class="input-group-addon" id="input-complemento">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control"
						name="complemento" required placeholder="Complemento"
						aria-describedby="input-complemento_contato"
						value="<?php echo $row[4]; ?>">
				</div>
				<br>

                <!-- Bairro -->
				<div class="input-group">
					<span class="input-group-addon" id="input-bairro">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control"
						name="bairro" required placeholder="Bairro"
						aria-describedby="input-bairro_contato"
						value="<?php echo $row[5]; ?>">
				</div>
				<br>

				<!-- CEP -->
				<div class="input-group">
					<span class="input-group-addon" id="input-cep">
						<span class="fas fa-globe"></span>
						</span>
					<input type="text" class="form-control"
						name="cep" required placeholder="CEP"
						aria-describedby="input-cep_contato"
						value="<?php echo $row[7]; ?>">
				</div>
				<br>

				<!-- Cidade -->
				<div class="input-group">
					<?php 
					
					// Parametriza a conexão com o banco de dados
					$host_ci     = "localhost:3306";
					$user_ci     = "root";
					$password_ci = "";
					$database_ci = "agenda";

					// Faz a conexão com o servidor MySQL
					$con_ci = mysqli_connect($host_ci, $user_ci, $password_ci);

					// Verifica se ocorreu erro de conexão
					if (!$con_ci) {
						// Se sim, então encerra o programa com uma mensagem de erro
						die("Erro de conexão com o servidor do BD");
					}

					// Determina qual banco de dados que será utilizado
					$db_ci = mysqli_select_db($con_ci, $database_ci);

					// Verifica se ocorreu erro na seleção
					if (!$db_ci) {
						// Se sim, então encerra o programa com uma mensagem de erro
						die("Erro ao selecionar o banco de dados.");
					}

					// Cria a sentença SQL para buscar as cidades
					$sql_ci = "select * from tbl_cidades where id=$row[6]";
					$result_ci = mysqli_query($con_ci, $sql_ci);
					
					$row_ci = mysqli_fetch_array($result_ci);
           
                    // Cria a sentença SQL para buscar as cidades
                            $sql_ci = "select * from tbl_cidades order by nome_cidade";
                            $result_ci = mysqli_query($con_ci, $sql_ci);

							echo " 
							<div class=\"input-group\">
							<span class=\"input-group-addon\" id=\"input-cidade_id\">
							<span class=\"fas fa-building\"></span>
							</span>
							<select name=\"cidade_id\" class=\"form-control\">
							";while($row_ci = mysqli_fetch_array($result_ci)){
								echo"
                                    <option value=\"$row_ci[0]\">".utf8_encode($row_ci[1])."</option>
									";
								}; echo "
								</select>
                            </div>
                                ";

                            ?>
				</div> 
				<br>




				<!-- Botão de envio -->
				<div class="row" style="margin-bottom:10px">
					<div class="col-xs-12">
						<button type="submit"
							class="btn btn-primary btn-block btn-flat">
							Atualizar<span class="fas fa-chevron-circle-right"></span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
	include_once('footer.php');
	include_once('js.php');
?>
</body>
</html>