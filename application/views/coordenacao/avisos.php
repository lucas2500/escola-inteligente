<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Avisos</title>
	<meta charset="utf-8">
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
				<h3>Quadro de avisos</h3>
				<div align="right">
					<button class="btn btn-primary" data-toggle="modal" data-target="#avisoAlunos"><span class="glyphicon glyphicon-pushpin"></span></button>
				</div>
				<hr />
				<table class="table table-bordered">
					<thead>
						<tr>
							<th><span class="glyphicon glyphicon-user" style="color: #87CEEB;"></span></th>
							<th><span class="glyphicon glyphicon-pushpin"></span></th>
							<th><span class="glyphicon glyphicon-time" style="color: red;"></span></th>
							<th><span class="glyphicon glyphicon-remove"></span></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($avisos as $AVISOS){
							if($AVISOS->dest == "professor"){
								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$AVISOS->usuario.'</td>'; 
								echo '<td>'.$AVISOS->aviso.'</td>'; 
								echo '<td>'.$AVISOS->dataEnvio.'</td>';
								echo  '<td><a href = "/deletar/deleteAviso/'.$AVISOS->ID.'"  <button class="btn btn-danger" onclick="return apagarAviso()"><span class="glyphicon glyphicon-trash"></span></button></a>';  
								echo '</td>'; 
								echo '</tr>';
							}
						}
						?>
					</tbody>		
				</table>

				<hr />

				<div class="" align="center">        
					<h3>Postar avisos</h3>
				</div>

				<br />

				<form action="<?php echo base_url();?>cadastro/enviarAviso" method="post">
					<div class="form-group">
						<label class="radio-inline"><input type="radio" name="dest" value="professor" required="">Professores</label>
						<label class="radio-inline"><input type="radio" name="dest" value="aluno" required="">Alunos</label>
					</div>

					<div class="text-left">
						<!-- EXIBE A MSG DE SUCESSO -->
						<?php echo $msg; ?>
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="5" id="comment" required="" placeholder="Aviso" name="aviso"></textarea>
					</div>
					<div align="center">
						<button type="submit" class="button2">Enviar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- MODAL COM OS AVISOS DOS ALUNOS -->

	<div class="container">
		<div class="modal fade" id="avisoAlunos" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Quadro de avisos - alunos</h4>
					</div>
					<div class="modal-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th><span class="glyphicon glyphicon-user" style="color: #87CEEB;"></span></th>
									<th><span class="glyphicon glyphicon-pushpin"></span></th>
									<th><span class="glyphicon glyphicon-time" style="color: red;"></span></th>
									<th><span class="glyphicon glyphicon-remove"></span></th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($avisos as $AVISOal){
									if($AVISOal->dest == "aluno"){
										echo '<tr>';
										echo '<td style ="text-transform: uppercase;">'.$AVISOal->usuario.'</td>'; 
										echo '<td>'.$AVISOal->aviso.'</td>'; 
										echo '<td>'.$AVISOal->dataEnvio.'</td>';
										echo  '<td><a href = "/deletar/deleteAviso/'.$AVISOal->ID.'"  <button class="btn btn-danger" onclick="return apagarAviso()"><span class="glyphicon glyphicon-trash"></span></button></a>';  
										echo '</tr>';
									}
								}
								?>
							</tbody>	
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<script type="text/javascript">

		function apagarAviso(){

			var r = confirm("Você deseja realmente excluir este aviso?");

			if(r){

				return r;
			}

			else {

				return false;
			}
		}
	</script>
</body>
</html>