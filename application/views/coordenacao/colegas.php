<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Meus colegas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
	<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/tableFilter.js');?>"></script>
	<style type="text/css">

	body{

		overflow-x: hidden;
		overflow-y: scroll;
	}
</style>
</head>
<body>
	<div class="container"> 
		<div class="well well-lg">
			<div class="" align="center">        
				<h3>Usuários cadastrados no sistema</h3>
			</div>

			<br />

			<div align="center">
				<button class="btn btn-success"  data-toggle="modal" data-target="#alunosFundamental"><span class="glyphicon glyphicon-education"> Fundamental</span></button> <button class="btn btn-warning"  data-toggle="modal" data-target="#alunosMedio" style="margin: 1%;"><span class="glyphicon glyphicon-education"> Médio</span></button> <button class="btn btn-primary"  data-toggle="modal" data-target="#usuariosCoord"><span class="glyphicon glyphicon-book"> Professores</span></button>
			</div>

			<!-- EXIBE A MSG DE SUCESSO -->
			<?php echo $msg; ?>

			<hr />

			<h4>Usuários - coordenação</h4>
			<table class="table table-bordered" id="tableRegistros">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Matrícula</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$user = 0;
					foreach ($usuarios as $USUARIOS){
						echo '<tr>';
						echo '<td style ="text-transform: uppercase;">'.$USUARIOS->nome.'</td>'; 
						echo '<td>'.$USUARIOS->matricula.'</td>'; 
						echo '<td><a href = "/deletar/deleteUser/'.$USUARIOS->matricula.'" <button class = "btn btn-danger" onclick="return apagarUsuario()"><span class="glyphicon glyphicon-trash"></span></button></a>';
						echo '</td>'; 
						echo '</tr>';

						$user++;
					}
					?>
				</tbody>    
			</table>
			<br />
			<div align="right"><strong>Total de usuários: <?php echo $user; ?></strong></div>
		</div>
	</div>

	<!-- MODAL ALUNOS FUNDAMENTAL -->

	<div class="modal fade" id="alunosFundamental" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<h4 align="left">Alunos - Nível Fundamental - Manhã</h4>
					<br />
					<table  class="table table-striped table-bordered" id="fundManha">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Matrícula</th>
								<th>Ficha</th>
								<th>Transferir</th>
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody id="fundamental">
							<?php
							$aluno1 = 0;
							foreach ($alunos as $ALUNOS){
								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$ALUNOS->nome.'</td>'; 
								echo '<td>'.$ALUNOS->Matricula.'</td>';
								echo '<td><a href="/arquivos/fichaAlunoFund/'.$ALUNOS->Matricula.'" <button class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span></button></a></td>'; 
								echo  '<td><a href = "/editar/transfFund/'.$ALUNOS->Matricula.'"  <button class="btn btn-warning"><span class="glyphicon glyphicon-retweet"></span></button></a>';
								echo  '<td><a href = "/editar/EditAlunoFund/'.$ALUNOS->Matricula.'"  <button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button></a>'; 
								echo '<td><a href = "/deletar/deleteAlunoFundManha/'.$ALUNOS->Matricula.'" <button class = "btn btn-danger" onclick="return apagarUsuario()"><span class="glyphicon glyphicon-trash"></span></button></a>';
								echo '</td>'; 
								echo '</tr>';

								$aluno1++;
							}
							?>
						</tbody>
					</table>
					<br />
					<div align="right"><strong>Total de alunos: <?php echo $aluno1;  ?></strong></div>

					<hr />

					<h4 align="left">Alunos - Nível Fundamental - Tarde</h4>
					<br />
					<table  class="table table-striped table-bordered" id="fundTarde">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Matrícula</th>
								<th>Ficha</th>
								<th>Transferir</th>
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$aluno2 = 0;
							foreach ($alunos2 as $ALUNOS2){

								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$ALUNOS2->nome.'</td>'; 
								echo '<td>'.$ALUNOS2->Matricula.'</td>';
								echo '<td><a href="/arquivos/fichaAlunoFund/'.$ALUNOS2->Matricula.'" <button class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span></button></a></td>'; 
								echo  '<td><a href = "/editar/transfFund/'.$ALUNOS2->Matricula.'"  <button class="btn btn-warning"><span class="glyphicon glyphicon-retweet"></span></button></a>';   
								echo  '<td><a href = "/editar/EditAlunoFund/'.$ALUNOS2->Matricula.'"  <button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button></a>'; 
								echo '<td><a href = "/deletar/deleteAlunoFundTarde/'.$ALUNOS2->Matricula.'" <button class = "btn btn-danger" onclick="return apagarUsuario()"><span class="glyphicon glyphicon-trash"></span></button></a>';
								echo '</td>'; 
								echo '</tr>';

								$aluno2++;
							}
							?>
						</tbody>
					</table>
					<br />
					<div align="right"><strong>Total de alunos: <?php echo $aluno2; ?></strong></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>


	<!-- FIM DO MODAL -->

	<!-- MODAL ALUNOS MÉDIO -->

	<div class="modal fade" id="alunosMedio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<h4 align="left">Alunos - Nível Médio - Manhã</h4>
					<br />
					<table class="table table-striped table-bordered" id="medManha">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Matrícula</th>
								<th>Ficha</th>
								<th>Transferir</th>
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$aluno3 = 0;
							foreach ($alunosMed as $ALUNOSMED){
								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$ALUNOSMED->nome.'</td>'; 
								echo '<td>'.$ALUNOSMED->Matricula.'</td>';
								echo '<td><a href="/arquivos/fichaAlunoMed/'.$ALUNOSMED->Matricula.'" <button class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span></button></a></td>'; 
								echo  '<td><a href = "/editar/transfMed/'.$ALUNOSMED->Matricula.'"  <button class="btn btn-warning"><span class="glyphicon glyphicon-retweet"></span></button></a>';  
								echo  '<td><a href = "/editar/EditAlunoMed/'.$ALUNOSMED->Matricula.'"  <button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button></a>'; 
								echo '<td><a href = "/deletar/deleteAlunoMedManha/'.$ALUNOSMED->Matricula.'" <button class = "btn btn-danger" onclick="return apagarUsuario()"><span class="glyphicon glyphicon-trash"></span></button></a>';
								echo '</td>'; 
								echo '</tr>';

								$aluno3++;
							}
							?>
						</tbody>
					</table>
					<br />
					<div align="right"><strong>Total de alunos: <?php echo $aluno3; ?></strong></div>

					<hr />

					<h4 align="left">Alunos - Nível Médio - Tarde</h4>
					<br />
					<table class="table table-striped table-bordered" id="medTarde">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Matrícula</th>
								<th>Ficha</th>
								<th>Transferir</th>
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$aluno4 = 0;
							foreach ($alunosMed2 as $ALUNOSMED2){      
								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$ALUNOSMED2->nome.'</td>'; 
								echo '<td>'.$ALUNOSMED2->Matricula.'</td>';
								echo '<td><a href="/arquivos/fichaAlunoMed/'.$ALUNOSMED2->Matricula.'" <button class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span></button></a></td>'; 
								echo  '<td><a href = "/editar/transfMed/'.$ALUNOSMED2->Matricula.'"  <button class="btn btn-warning"><span class="glyphicon glyphicon-retweet"></span></button></a>';   
								echo  '<td><a href = "/editar/EditAlunoMed/'.$ALUNOSMED2->Matricula.'"  <button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button></a>'; 
								echo '<td><a href = "/deletar/deleteAlunoMedTarde/'.$ALUNOSMED2->Matricula.'" <button class = "btn btn-danger" onclick="return apagarUsuario()"><span class="glyphicon glyphicon-trash"></span></button></a>';
								echo '</td>'; 
								echo '</tr>';

								$aluno4++;
							}
							?>
						</tbody>
					</table>
					<br />
					<div align="right"><strong>Total de alunos: <?php echo $aluno4; ?></strong></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- MODAL COM OS PROFESSORES -->


	<div class="modal fade" id="usuariosCoord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<h4 align="left">Professores</h4>
					<br />
					<table  class="table table-striped table-bordered" id="prof">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Matrícula</th>
								<th>Ficha</th>
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$prof = 0;
							foreach ($funcionarios as $funcionario){
								echo '<tr>';
								echo '<td style ="text-transform: uppercase;">'.$funcionario->nome.'</td>';
								echo '<td>'.$funcionario->MATRICULA.'</td>'; 
								echo '<td><a href="/arquivos/fichaProfessor/'.$funcionario->MATRICULA.'" <button class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span></button></a></td>'; 
								echo  '<td><a href = "/editar/EditProfessor/'.$funcionario->MATRICULA.'"  <button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button></a>'; 
								echo '<td><a href = "/deletar/deleteProfessor/'.$funcionario->MATRICULA.'" <button class = "btn btn-danger" onclick="return apagarUsuario()"><span class="glyphicon glyphicon-trash"></span></button></a>';
								echo '</td>'; 
								echo '</tr>';

								$prof++;
							}
							?>
						</tbody>
					</table>
					<br />
					<div align="right"><strong>Total de professores: <?php echo $prof; ?></strong></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<script type="text/javascript">

		function apagarUsuario(){

			var r = confirm("Você deseja realmente excluir este usuário?");

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