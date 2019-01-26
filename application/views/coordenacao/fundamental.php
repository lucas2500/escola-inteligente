<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gerenciar turmas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
	<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
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
		width: 50%;
	}
</style>
</head>
<body>
	<div class="container"> 
		<div class="well well-lg">
			<div class="form-inline" align="right">
				<button class="btn btn-success" data-toggle="modal" data-target="#formarTurma"><span class="glyphicon glyphicon-plus"> Criar turmas</span></button>
				<button class="btn btn-primary" data-toggle="modal" data-target="#cadAluno"><span class="glyphicon glyphicon-share-alt"> Alocar aluno</span></button>
			</div>

			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#manha">Fundamental - manhã</a></li>
				<li><a data-toggle="tab" href="#tarde">Fundamental - tarde</a></li>
			</ul>

			<div class="text-left" style="margin-top: 1%;">
				<!-- EXIBE A MSG DE SUCESSO -->
				<?php echo $msg ;?>
			</div>

			<br />

			<div class="tab-content">
				<div class="tab-pane fade in active" id="manha">
					<h4>Fundamental manhã</h4>
					<table class="table table-bordered" id="fundManha">
						<thead>
							<tr>
								<th>Aluno</th>
								<th>Matrícula</th>
								<th>Turno de matrícula</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($alunos as $ALUNOS){
								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$ALUNOS->nome.'</td>'; 
								echo '<td>'.$ALUNOS->Matricula.'</td>'; 
								echo '<td>'.$ALUNOS->turno.'</td>'; 
								echo '</td>'; 
								echo '</tr>';
							}
							?>
						</tbody>
					</table>
				</div>

				<div class="tab-pane fade" id="tarde">
					<h4>Fundamental tarde</h4>
					<table class="table table-bordered" id="fundTarde">
						<thead>
							<tr>
								<th>Aluno</th>
								<th>Matrícula</th>
								<th>Turno de matrícula</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($alunos2 as $ALUNOS2){
								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$ALUNOS2->nome.'</td>'; 
								echo '<td>'.$ALUNOS2->Matricula.'</td>'; 
								echo '<td>'.$ALUNOS2->turno.'</td>'; 
								echo '</td>'; 
								echo '</tr>';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="formarTurma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Criar turmas</h4>
				</div>
				<form action="<?php echo base_url();?>cadastro_turmas/salvarTurmaFund" method="post">
					<div class="modal-body">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<input type="text" name="nome" class="form-control" placeholder="Nome da turma" required="">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
							<select required class="form-control" name="turno">
								<option value="">Turno</option>
								<option value="MANHÃ">Manhã</option>
								<option value="TARDE">Tarde</option>
							</select>
						</div>
						<input type="hidden" name="codigo" id="codigoT">
					</div>
					<div align="right" class="modal-footer">
						<button type="submit" onclick="gerarCodigo()" class="btn btn-success">Criar turma</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- MODAL ALOCAÇÃO DE ALUNOS -->

	<div id="cadAluno" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Alocar aluno</h4>
				</div>
				<form action="<?php echo base_url();?>cadastro/alocarAlunoFund" method="post">
					<div class="modal-body">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control" id="nomeAluno" aria-describedby="emailHelp" placeholder="NOME DO ALUNO" style="text-transform: uppercase;" required="" name="nome">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
							<input type="text" class="form-control" id="Matricula" aria-describedby="emailHelp" placeholder="MATRÍCULA" required="" name="matricula">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<select class="form-control" name="turma" required="">
								<option value="">Selecionar turma</option>
								<optgroup label="Turmas da manhã">
									<?php 
									foreach ($turmas as $TM){
										echo "<option value = ".$TM->codigo.">".$TM->nome."</option>";
									}
									?>
								</optgroup>
								<optgroup label="Turmas da tarde">
									<?php 
									foreach($turmas2 as $TM2){
										echo "<option value=".$TM2->codigo.">".$TM2->nome."</option>";
									}	
									?>
								</optgroup>
							</select>
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
							<select required class="form-control" name="turno">
								<option value="">Turno</option>
								<option value="MANHÃ">Manhã</option>
								<option value="TARDE">Tarde</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Cadastrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<script type="text/javascript">

		function gerarCodigo() {
			var x = Math.floor((Math.random() * 1000000) + 1);
			$('#codigoT').val(x);

		}
	</script>
</body>
</html>