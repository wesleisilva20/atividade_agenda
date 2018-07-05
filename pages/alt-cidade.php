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

    // Cria a sentença SQL para buscar as cidades
    $sql = "select * from tbl_cidades where id=$id";
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
					Cadastro de Cidades
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle">Forneça os dados abaixo</p>
			</div>

			<!-- Formulário de cadastramento de cidades -->
			<form action="altera-cidade.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $row[0]; ?>" >
				<!-- nome da cidade -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[1]; ?>"
						name="nome_cidade" required placeholder="Nome da Cidade"
						aria-describedby="input-nome_cidade">
				</div>
				<br>

				<!-- Estado -->
				<div class="input-group">
					<span class="input-group-addon" id="input-password">
						<span class="fas fa-building"></span>
					</span>
                    <select name="estado" class="form-control">
                        <option value="SP" <?php if($row[2] == "SP") echo "selected"; ?> >São Paulo</option>
                        <option value="RJ" <?php if($row[2] == "RJ") echo "selected"; ?> >Rio de Janeiro</option>
                        <option value="MG" <?php if($row[2] == "MG") echo "selected"; ?> >Minas Gerais</option>
                        <option value="RS" <?php if($row[2] == "RS") echo "selected"; ?> >Rio Grande do Sul</option>
                    </select>
				</div>
				<br>

				<!-- Botão de envio -->
				<div class="row" style="margin-bottom:10px">
					<div class="col-xs-12">
						<button type="submit"
							class="btn btn-primary btn-block btn-flat">
							Inserir <span class="fas fa-chevron-circle-right"></span>
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