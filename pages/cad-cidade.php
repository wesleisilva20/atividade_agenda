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
			<form action="grava-cidade.php" method="post" autocomplete="off">

				<!-- nome da cidade -->
				<div class="input-group">
					<span class="input-group-addon" id="input-user-name">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control"
						name="nome_cidade" required placeholder="Nome da Cidade"
						aria-describedby="input-nome_cidade">
				</div>
				<br>

				<!-- Estado -->
				<div class="input-group">
					<span class="input-group-addon" id="input-cidade">
						<span class="fas fa-building"></span>
					</span>
                    <select name="estado" class="form-control">
                        <option value="SP">São Paulo</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="RS">Rio Grande do Sul</option>
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