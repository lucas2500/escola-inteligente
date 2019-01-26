<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Central de mensagens</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

	<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/deleteMSG.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/tableFilter.js');?>"></script>
	<style type="text/css">

	.button2 {
		background-color: #4CAF50;
		color: white;
		padding: 6px 20px;
		margin: 7px 0;
		border: 2px solid;
		border-radius: 25px;
		cursor: pointer;
		width: 80%;
	}

</style>

</head>
<body>
	<div class="container">
		<div class="well well-lg">
			<br/>			 
			<div class="" align="center">        
				<h3>Mensagens recebidas</h3>
			</div>
			<hr />

			<div align="left">
				<small id="emailHelp" class="form-text text-muted">Dica: apague suas mensagens mais antigas</small>
			</div>

			<br />

			<table class="table table-bordered">
				<thead>
					<tr>
						<th><span class="glyphicon glyphicon-user" style="color: #87CEEB;"></span></th>
						<th><span class="glyphicon glyphicon-comment"></span></th>
						<th><span class="glyphicon glyphicon-time" style="color: red;"></span></th>
						<th><span class="glyphicon glyphicon-remove"></span></th>
					</tr>
				</thead>

				<tbody>
					<?php 
					foreach($mensagem as $MSG){

						echo "<tr>";
						echo "<td style='text-transform: uppercase;'>".$MSG->usuario."</td>";
						echo "<td>".$MSG->mensagem."</td>";
						echo "<td>".$MSG->dataEnvio."</td>";
						echo  '<td><a href = "/deletar/deleteMSGProf/'.$MSG->ID.'"  <button class="btn btn-danger" onclick="return apagarMensagem()"><span class="glyphicon glyphicon-trash"></span></button></a>'; 
						echo "</tr>";

					}
					?>
				</tbody>	
			</table>
			<br/>

			<!-- Eviar menssagens -->

			<div class="" align="center">        
				<h3>Enviar mensagens</h3>
			</div>
			<div align="left">
				<small id="emailHelp" class="form-text text-muted">Dica: Use a matrícula dos usuários para enviar mensagens a eles.</small>
			</div>

			<div align="right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#friends"><span class="glyphicon glyphicon-user"></span></button>
			</div>

			<br />

			<form action="<?php echo base_url();?>cadastro/enviarMSGProf" method="post">
				<h4 style="color: green;"><?php echo $msg; ?></h4>
				<div class="form-group">
					<input type="text" class="form-control" id="usr" required  placeholder="Destinatário" name="destinatario">
				</div>

				<div class="form-group">
					<textarea class="form-control" rows="5" id="comment" required placeholder="Mensagem" name="mensagem"></textarea>
				</div>

				<div align="center">
					<button type="submit" class="button2">Enviar</button>
				</div>
			</form>
		</div>
	</div>

	<!-- MODAL COM OS CONTATOS -->

	<div class="modal fade" id="friends" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<br />
					<h4>Coordenação</h4>
					<br />
					<table class="table table-bordered" id="fundManha">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Matrícula</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($usuarios as $USERS){
								echo "<tr>";
								echo "<td style='text-transform: uppercase;'>".$USERS->nome."</td>";
								echo "<td>".$USERS->matricula."</td>";
								echo "</tr>";
							}
							?>
						</tbody>	
					</table>
					<hr />
					<h4>Professores</h4>
					<br />
					<table class="table table-bordered" id="fundTarde">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Matrícula</th>

							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($funcionarios as $FUNC){
								echo "<tr>";
								echo "<td style='text-transform: uppercase;'>".$FUNC->nome."</td>";
								echo "<td>".$FUNC->MATRICULA."</td>";
								echo "</tr>";
							}
							?>
						</tbody>	
					</table>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>