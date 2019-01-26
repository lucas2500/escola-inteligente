
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sweetalert2.css');?>">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/sweetalert2.js');?>"></script>
	<title>Portal do professor</title>

	<style type="text/css">

	.button2 {
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

	.cancelbtn {
		width: auto;
		padding: 10px 18px;
		background-color: #f44336;
	}

	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
	}

	img.avatar {
		width: 10%;
		border-radius: 50%;
	}

	.container {
		padding: 16px;
	}

	span.psw {
		float: right;
		padding-top: 16px;
	}

	@media (max-width: 990px) {

		img.avatar {
			width: 20%;
			border-radius: 50%;
		}

	}
</style>
</head>
<body>

	<div align="center">
		<h3 style="padding: 1%;">Bem-vindo ao Escola Inteligente</h3>
	</div>

	<hr />

	<form action="<?php echo base_url();?>principal/menuProf" method="post">
		<div class="imgcontainer">
			<img src="<?php echo base_url('assets/img/img_avatar2.png');?>" alt="Avatar" class="avatar">
		</div>

		<div class="container">
			<small style="color: red;"><?php echo $msg; ?></small>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
				<input type="text" placeholder="MATRÍCULA" name="MATRICULA" class="form-control input-lg" required>
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" placeholder="SENHA" name="senha" class="form-control input-lg" required>
			</div>
			<button type="submit" class="button2">Entrar</button>
		</div>
	</form>

	<hr />

	<div  class="container">
		<a href="" data-toggle="modal" data-target="#RedefinirSenha"><small>Esqueceu sua senha?</small></a>
	</div>

	<!-- MODAL -->

	<div class="modal fade" id="RedefinirSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<h4 align="center">Redefinir senha</h4>
					<div align="left" style="color: red;"><small>*Solicite seu token para alterar sua senha</small></div>
					<form action="" method="">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="email" name="codigo" id="emailCodigo" placeholder="INSIRA SEU EMAIL" class="form-control" required="">
						</div>
						<br />
						<div align="right"><button type="submit" onclick="return redefinirSenha()" class="btn btn-primary">Enviar meu token</button></div>
					</form>
					<hr />
					<h4 align="center">Insira suas informações</h4>
					<form action="<?php echo base_url();?>configuracao/alterarSenha2" method="post">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" placeholder="NOME" name="nome" id="nome" class="form-control" required>
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="text" placeholder="EMAIL" name="email" id="mail" class="form-control" required>
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" placeholder="NOVA SENHA" name="senha" id="senha" class="form-control" required>
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
							<input type="password" placeholder="REPITA A SENHA" name="segundaSenha" id="confirmar_senha" class="form-control" required>
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
							<input type="password" name="codigo" class="form-control" id="codigo" placeholder="INSIRA SEU TOKEN" required="">
						</div>
						<button type="submit" class="button2">Redefinir</button>
					</form>
				</div>
			</div>
		</div>
	</div>

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


		function redefinirSenha(){

			var email = $('#emailCodigo').val();

			if(email != ""){

				$.ajax({

					type: 'post',
					url: '<?php echo base_url();?>configuracao/enviarToken2',
					data: 'email='+email,
					cache: false,
					beforeSend: function(){
						swal({
							title: 'Aguarde...',
							onOpen: () => {
								swal.showLoading()
							}
						})
					},
					success: function(resultado){

						swal(resultado)
					}
				});

				return false;
			}
		}
	</script>
</body>
</html>