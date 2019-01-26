<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alunos</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
	<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/tableFilter.js');?>"></script>
</style>
</head>
<body>
	<div class="container">
		<div class="well well-lg">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#alunos">Visão geral da turma</a></li>
			</ul>
			<br />
			<div class="tab-content">
				<div id="alunos" class="tab-pane fade in active">
					<div class="" align="right">
						<button class="btn btn-primary" data-toggle="modal" data-target="#comunicar"><span class="glyphicon glyphicon-envelope"></span></button>
					</div>
					<br />
					<div class="text-left">
						<button class="btn btn-danger" data-toggle="modal" data-target="#registroAulas">Visualizar registros de aulas</button>
						<button class="btn btn-primary" data-toggle="modal", data-target="#arquivosAnexados">Visualizar arquivos anexados</button>
					</div>
					<br />
					<table class="table table-bordered" id="fundManha">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Matrícula</th>
								<th>Desempenho do aluno</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$contador = 0;
							if(!empty($turmas)){
								foreach ($turmas as $TURMAS){
									echo '<tr>';
									echo '<td style ="text-transform: uppercase;">'.$TURMAS->nome.'</td>'; 
									echo '<td>'.$TURMAS->matricula.'</td>';
									echo  '<td><a href = "/professor/verNotasCoordenacao/'.$TURMAS->matricula.'"<button class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button></a></td>';
									echo '<td><button class = "btn btn-danger" id="matricula" name="matricula" value="'.$TURMAS->matricula.'" onclick="return apagarAluno(this)"><span class="glyphicon glyphicon-trash"></span></button></td>'; 
									echo '</tr>';

									$contador++;
								}

							} else {

								echo "
								<div align = 'center'><h3>Nenhum aluno matriculado nesta turma</h3></div>
								";
							}
							?>
						</tbody>
					</table>
					<br />
					<div align="right"><strong>Total de alunos na turma: <?php echo $contador; ?></strong></div>
				</div>

			</div>
		</div>
	</div>

	<!-- MODAL PARA ENVIAR MENSAGENS -->

	<div class="modal fade" id="comunicar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<br />
					<br />
					<div class="form-group">
						<div align="center">
							<form action="" method="">
								<div align="left">
									<small style="color: red;">*Use esta ferramenta para enviar recados aos alunos.</small>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="destinatario" required placeholder="Matrícula do aluno" name="destinatario">
								</div>
								<div class="form-group">
									<textarea class="form-control" rows="5" id="mensagem" required="" placeholder="Mensagem" name="mensagem"></textarea>
								</div>
								<div align="center">
									<button type="button" onclick="return enviarRecado()" class="button">Enviar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

	<!-- MODAL COM OS REGISTROS DE AULAS -->
	<div id="registroAulas" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Registros de aulas</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<table id="tableRegistros" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Professor</th>
									<th>Disciplina</th>
									<th>Dia</th>
									<th>Conteúdo</th>
									<th>Atividade</th>
								</tr>
							</thead>
							<?php
							foreach($registro as $REG){

								echo "<tr>";
								echo "<td>".$REG->professor."</td>";
								echo "<td>".$REG->disciplina."</td>";
								echo "<td>".$REG->dataRegistro."</td>";
								echo "<td>".$REG->conteudo."</td>";
								echo "<td>".$REG->atividade."</td>";
								echo "</tr>";
							} 

							?>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- FIM DO MODAL -->


	<!-- MODAL COM OS ARQUIVOS ANEXADOS DE AULAS -->
	<div id="arquivosAnexados" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Arquivos anexados</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<table id="anexos" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Disciplina</th>
									<th>Arquivo</th>
									<th>Baixar</th>
								</tr>
							</thead>
							<?php
							foreach($anexo as $AX){
								echo "<tr>";
								echo "<td>".$AX->discArquivo."</td>";
								echo "<td>".$AX->anexoArquivo."</td>";
								echo "<td><a href = '/arquivos/baixarAnexo/".$AX->ID."'<button class='btn btn-primary'><span class='glyphicon glyphicon-download'></span></button></a></td>";
								echo "</tr>";
							}
							?>
						</table>
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

		function apagarAluno(objButton){

			var r = confirm("Você deseja realmente excluir este aluno desta turma?");

			if(r){

				var matricula = (objButton.value);

				var dados = 'matricula='+matricula;

				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>deletar/deleteAlunoTurmaFundamental',
					data: dados,
					cache: false
				});

				setTimeout('location.reload();', 0500);

			}

			else {

				return false;
			}

		}

		function enviarRecado(){

			var mat = $('#destinatario').val();
			var msg = $('#mensagem').val();

			if(mat != "" && msg != ""){

				var dados = 'destinatario='+mat + '&mensagem='+msg;

				$.ajax({

					type: 'post',
					url: '<?php echo base_url();?>cadastro/enviarRecado',
					data: dados,
					cache: false

				});

				$('#destinatario').val("");
				$('#mensagem').val("");


			} else{

				alert("Nenhum campo pode ficar vázio!!");

			}
		}
	</script>
</body>
</html>