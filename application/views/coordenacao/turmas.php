<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Minhas turmas</title>
	<meta charset="utf-8">
	<style type="text/css">

	img:hover {
		cursor:pointer;
	}
</style>
</head>
<body>
	<div class="container">
		<div class="well well-lg">
			<h3>Turmas cadastradas</h3>
			<hr/>
			<div class="text-left">
				<?php echo $msg; ?>
			</div>
			<div align="center">
				<h5 align="left">Nível fundamental</h5>
				<label>Manhã</label>
				<img style="width: 12%;" src="<?php echo base_url('assets/img/student.png');?>" data-toggle="modal" data-target="#fundManhã">
				<img style="width: 12%;" align="center" src="<?php echo base_url('assets/img/studentM.png');?>" data-toggle="modal" data-target="#fundTarde">
				<label> Tarde</label>
				<hr />
				<h5 align="left">Nível Médio</h5>
				<label> Manhã</label>
				<img style="width: 12%;" src="<?php echo base_url('assets/img/studentMed.png');?>" data-toggle="modal" data-target="#medManhã">
				<img style="width: 12%;" src="<?php echo base_url('assets/img/studentMed2.png');?>" data-toggle="modal" data-target="#medTarde">
				<label>Tarde</label>
			</div>
			<br />
			<div align="left">
				<small class="form-text text-muted">Dica: Clique nas figuras para acessar as turmas</small>
			</div>
		</div>
	</div>

	<!-- MODAL TURMAS FUNDAMENTAL - MANHÃ -->

	<div class="modal fade" id="fundManhã" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body" align="center">
					<h4 align="left">Fundamental - manhã</h4>
					<br />
					<table class="table table-bordered" id="fundamentalManha">
						<thead>
							<tr>
								<th>Nome da turma</th>
								<th>Código</th>
								<th>Entrar</th>
								<th>Horário</th>
								<th>Excluir turma</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$contador = 0;
							foreach ($turmas as $TURMAS){    
								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$TURMAS->nome.'</td>'; 
								echo '<td>'.$TURMAS->codigo.'</td>';
								echo  '<td><a href = "/principal/alunosCoordenacaoFundManha/'.$TURMAS->codigo.'"  <button class="btn btn-info"><span class="glyphicon glyphicon-arrow-right"></span></button></a></td>';
								echo  '<td><a href = "/principal/verHorarioFundManha/'.$TURMAS->codigo.'"  <button class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button></a></td>';
								echo  '<td><a href = "/deletar/deleteTurmaFundManha/'.$TURMAS->codigo.'"  <button class="btn btn-danger" onclick="return apagarTurma()"><span class="glyphicon glyphicon-trash"></span></button></a></td>'; 
								echo '</tr>';
								$contador++;
							}
							?>
						</tbody>
					</table>
					<div align="right"><strong>Total de turmas: <?php echo $contador; ?></strong></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- TURMAS FUNDAMENTAL - TARDE -->

	<div class="modal fade" id="fundTarde" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body" align="center">
					<h4 align="left">Fundamental - tarde</h4>
					<br />
					<table class="table table-bordered" id="fundamentalTarde">
						<thead>
							<tr>
								<th>Nome da turma</th>
								<th>Código</th>
								<th>Entrar</th>
								<th>Horário</th>
								<th>Excluir turma</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$contador2 = 0;
							foreach ($turmas2 as $TURMAS2){    
								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$TURMAS2->nome.'</td>'; 
								echo '<td>'.$TURMAS2->codigo.'</td>';
								echo  '<td><a href = "/principal/alunosCoordenacaoFundTarde/'.$TURMAS2->codigo.'"  <button class="btn btn-info"><span class="glyphicon glyphicon-arrow-right"></span></button></a></td>';
								echo  '<td><a href = "/principal/verHorarioFundTarde/'.$TURMAS2->codigo.'"  <button class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button></a></td>';
								echo  '<td><a href = "/deletar/deleteTurmaFundTarde/'.$TURMAS2->codigo.'"  <button class="btn btn-danger" onclick="return apagarTurma()"><span class="glyphicon glyphicon-trash"></span></button></a></td>'; 
								echo '</tr>';
								$contador2++;
							}
							?>
						</tbody>
					</table>
					<div align="right"><strong>Total de turmas: <?php echo $contador2; ?></strong></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- TURMAS MÉDIO - MANHÃ -->

	<div class="modal fade" id="medManhã" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body" align="center">
					<h4 align="left">Médio - manhã</h4>
					<br />
					<table class="table table-bordered" id="medioManha">
						<thead>
							<tr>
								<th>Nome da turma</th>
								<th>Código</th>
								<th>Entrar</th>
								<th>Horário</th>
								<th>Excluir turma</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$contador3 = 0;
							foreach ($turmas3 as $TURMAS3){    
								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$TURMAS3->nome.'</td>'; 
								echo '<td>'.$TURMAS3->codigo.'</td>';
								echo  '<td><a href = "/principal/alunosCoordenacaoMedManha/'.$TURMAS3->codigo.'"  <button class="btn btn-info"><span class="glyphicon glyphicon-arrow-right"></span></button></a></td>';
								echo  '<td><a href = "/principal/verHorarioMedManha/'.$TURMAS3->codigo.'"  <button class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button></a></td>';
								echo  '<td><a href = "/deletar/deleteTurmaMedManha/'.$TURMAS3->codigo.'"  <button class="btn btn-danger" onclick="apagarTurma()"><span class="glyphicon glyphicon-trash"></span></button></a></td>'; 
								echo '</tr>';
								$contador3++;
							}
							?>	
						</tbody>
					</table>
					<div align="right"><strong>Total de turmas: <?php echo $contador3; ?></strong></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>	
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- TURMAS MÉDIO - TARDE -->

	<div class="modal fade" id="medTarde" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body" align="center">
					<h4 align="left">Médio - tarde</h4>
					<br />
					<table class="table table-bordered" id="medioTarde">
						<thead>
							<tr>
								<th>Nome da turma</th>
								<th>Código</th>
								<th>Entrar</th>
								<th>Horário</th>
								<th>Excluir turma</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$contador4 = 0;
							foreach ($turmas4 as $TURMAS4){    
								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$TURMAS4->nome.'</td>'; 
								echo '<td>'.$TURMAS4->codigo.'</td>';
								echo  '<td><a href = "/principal/alunosCoordenacaoMedTarde/'.$TURMAS4->codigo.'"  <button class="btn btn-info"><span class="glyphicon glyphicon-arrow-right"></span></button></a></td>';
								echo  '<td><a href = "/principal/verHorarioMedTarde/'.$TURMAS4->codigo.'"  <button class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button></a></td>';
								echo  '<td><a href = "/deletar/deleteTurmaMedTarde/'.$TURMAS4->codigo.'"  <button class="btn btn-danger" onclick="return apagarTurma()"><span class="glyphicon glyphicon-trash"></span></button></a></td>'; 
								echo '</tr>';
								$contador4++;
							}
							?>	
						</tbody>
					</table>
					<div align="right"><strong>Total de turmas: <?php echo $contador4; ?></strong></div>
				</div> 
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div> 
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<script type="text/javascript">

		function apagarTurma(){

			var r = confirm("Você deseja realmente excluir esta turma?");

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