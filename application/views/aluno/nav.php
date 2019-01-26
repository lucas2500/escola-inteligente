
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
	<script type="text/javascript" src="<?php echo base_url('assets/pdf/jspdf.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/pdf/pdfFromHTML.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/tableFilter.js');?>"></script>

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

	.declaracao{

		font-size: 135%;
		margin-top: 10%;
	}

	.head{

		font-size: 85%;
		font-family: times;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-inverse" style="background-color: #083CE4; border-color: #083CE4;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#" style="font-family: Times; font-size: 20px; color: white;">Menu principal</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#eiNav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>	
				</button>
			</div>
			<div class="collapse navbar-collapse" id="eiNav">
				<ul class="nav navbar-nav">
					<li><a href="" data-toggle="modal" data-target="#RedefinirSenha" style="font-family: times; color: white;"><span class="glyphicon glyphicon-lock"></span> Alterar senha</a></li>
					<li><a href="#" data-toggle="modal" data-target="#declaracao" style="font-family: times; color: white;"> <span class="glyphicon glyphicon-file"></span> Emitir declaração</a></li>
					<li><a href="#" data-toggle="modal" data-target="#arquivosLancados" style="font-family: times; color: white;"> <span class="glyphicon glyphicon-folder-open"></span> Visualizar anexos</a></li>
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
							<input type="text" placeholder="NOME" name="nome" class="form-control"  required="">
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



	<!-- MODAL COM A DECLARAÇÃO DO ALUNO -->
	<div class="modal fade" id="declaracao" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<br />

				<div class="container" align="left" onclick="Declaracao()"><button class="btn btn-danger"><span class="glyphicon glyphicon-print"></span></button></div>

				<br />
				<div class="container-fluid">
					<div id="Declaracao">
						<div align="center">
							<img style="width: 500px;" src="<?php echo base_url('assets/img/logo.png');?>">
						</div>

						<h3 align="center">Declaração escolar</h3>

						<div class="declaracao" align="center">
							Declaro para os devidos fins, que o aluno(a) <?php echo "<strong style = 'text-transform: uppercase;'>".$usuario->nome."</strong>" ?>, 
							matrícula Nº <?php echo "<strong>".$usuario->Matricula."</strong>" ?>, é devidamente 
							matriculado(a) na escola <strong>Colibri Colégio e Curso</strong>, 
							estando atualmente cursando o ensino <?php echo "<strong>".$usuario->nivel."</strong>" ?>.
						</div>
						<strong><p align="left" style="font-size: 100%; margin-top: 20%;" id="data"></p></strong>
						<strong><p align="left" style="font-size: 100%;" id="codigo"></p></strong>

						<p class="head" style="margin-top: 70%;"><strong>Rua Sete de Setembro - Nº 65 - Bairro dos Estudantes - Itapororoca - Paraíba - 58275-000 - 09.027.767/0001-89</strong></p>
						<p class="head"><strong>(83) 3294-1058 / colibricolegio@gmail.com</strong></p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
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

		$(document).ready(function(){

			var data = new Date();

			var dia = data.getDate();
			var mes = data.getMonth() + 1;
			var ano = data.getFullYear();

			if(dia<10) {
				dia = '0'+dia
			} 

			if(mes<10) {
				mes = '0'+mes
			}

			data = "Data de emissão: " + dia + '/' + mes + '/' + ano + " - Este documento é válido por 30 dias";

			$('#data').html(data);

			var x_ramdom = Math.floor(Math.random() * (100000)+1);

			var x_round = Math.round(x_ramdom);

			$('#codigo').html('Código de segurança: '+ x_round);

		});
	</script>
</body>
</html>