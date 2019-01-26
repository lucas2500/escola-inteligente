
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">

	.button {
		background-color: #4CAF50;
		color: white;
		padding: 6px 20px;
		margin: 7px 0;
		border: 2px solid;
		border-radius: 25px;
		cursor: pointer;
		width: 100%;
	}	

	button:hover {
		opacity: 0.8;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-inverse" style="background-color: #083CE4; border-color: #083CE4;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url();?>principal/menuAluno" style="font-family: Times; font-size: 20px; color: white;">Menu principal</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#eiNav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>	
				</button>
			</div>
			<div class="collapse navbar-collapse" id="eiNav">
				<ul class="nav navbar-nav">
					<li><a href="" data-toggle="modal" data-target="#RedefinirSenha" style="font-family: times; color: white;"><span class="glyphicon glyphicon-lock"></span> Alterar senha</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url(); ?>sair/logoutAluno" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
				</ul>
			</div>
		</div>
	</nav>


	<!-- MODAL PARA REDEFINIR SENHA -->
	<div class="modal fade" id="RedefinirSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<h4 align="center">Redefinir senha</h4>
					<div align="left">
						<small style="color: red;">*Após alterar a senha, você terá que efetuar o login novamente</small>
					</div>
					<form action="<?php echo base_url();?>professor/alterarSenhaAluno" method="post">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" placeholder="NOME" name="nome" class="form-control" required="">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
							<input type="text" placeholder="MATRÍCULA" name="Matricula"  id="matricula" class="form-control" required="">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" placeholder="NOVA SENHA" name="senha" id="senha" class="form-control" required="">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
							<input type="password" placeholder="REPITA A SENHA" name="novaSenha" id="confirmar_senha" class="form-control" required="">
						</div>
						<button type="submit" class="button">Redefinir</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<script type="text/javascript">

		var password = document.getElementById("senha")
		, confirm_password = document.getElementById("confirmar_senha");

		function validatePassword(){
			if(password.value != confirm_password.value) {
				confirm_password.setCustomValidity("As senhas não coincidem");
			} else {
				confirm_password.setCustomValidity('');
			}
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
	</script>
</body>
</html>