<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Boletim virtual</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-datepicker.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sweetalert2.css');?>">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

	<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-datepicker.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-datepicker.pt-BR.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/sweetalert2.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/tableFilter.js');?>"></script>
</head>
<body>
	<div class="container"> 
		<div class="well well-lg">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#registroFaltas">Registro de frequência</a></li>
				<li><a data-toggle="tab" href="#registroAulas">Registro de aulas</a></li>
				<li><a data-toggle="tab" href="#registroNotas">Registro de notas</a></li>
				<li><a data-toggle="tab" href="#situacaoAluno">Situação do aluno</a></li>
				<li><a data-toggle="tab" href="#anexarArquivo">Anexar arquivos</a></li>
			</ul>
			<br />
			<div class="tab-content">
				<div class="tab-pane fade in active" id="registroFaltas">
					<!-- <div align="right">
						<button class="btn btn-primary" data-toggle="modal" data-target="#comunicar"><span class="glyphicon glyphicon-envelope"></span></button>
					</div> -->
					<form action="" method="">
						<div class="form-inline" align="center">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
								<select class="form-control" name="disciplina" id="discF" required="">
									<option value="">Disciplina</option>
									<?php 
									if(!empty($materia->materia1)){
										echo "<option value='".$materia->materia1."'>".$materia->materia1."</option>";	
									}

									if(!empty($materia->materia2)){
										echo "<option value='".$materia->materia2."'>".$materia->materia2."</option>";	
									}

									if(!empty($materia->materia3)){
										echo "<option value='".$materia->materia3."'>".$materia->materia3."</option>";	
									}
									?>
								</select>
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" name="dataRegistro" id="dtFreq" class="form-control" placeholder="Data da aula" required="">
							</div>
						</div>
						<hr />
						<!-- REGISTRO DE FREQUÊNCIA -->
						<table class="table table-bordered" id="fundTarde">
							<thead>
								<tr>
									<th>Aluno</th>
									<th>Matrícula</th>
									<th>Lançar falta</th>
									<th>Remover falta</th>
									<th>Frequência do aluno</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$contador = 0;
								if(!empty($turmas)){
									foreach($turmas as $TURMAS){
										echo "<tr>";
										echo "<td>".$TURMAS->nome."</td>";
										echo "<td>".$TURMAS->matricula."</td>";
										echo "<td><button type='submit' class='btn btn-danger' name='matricula' value='".$TURMAS->matricula."' onclick='return lancarFalta(this)'><span class='glyphicon glyphicon-remove'></span></button></td>";
										echo "<td><button type='submit' class='btn btn-success' name='matricula' value='".$TURMAS->matricula."' onclick='return removerFalta(this)'><span class='glyphicon glyphicon-ok'></span></button></td>";
										echo "<td><button name='matricula' value='".$TURMAS->matricula."' onclick='return consultarFalta(this)' class='btn btn-primary'><span class='glyphicon glyphicon-eye-open'></span></button></td>";	
										echo "</tr>";

										$contador++;
									}

								} else{

									echo "
									<div align = 'center'><h3>Nenhum aluno matriculado nesta turma</h3></div>
									";
								}
								?>
							</tbody>
						</table>
					</form>
					<br />
					<div align="right"><strong>Total de alunos na turma: <?php echo $contador; ?></strong></div>
				</div>

				<!-- REGISTRO DE NOTAS -->
				<div class="tab-pane fade" id="registroNotas">
					<form action="" method="">
						<div class="form-inline" align="center">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
								<select class="form-control" required="" name="disciplina" id="discNota">
									<option value="">Disciplina</option>
									<?php 
									if(!empty($materia->materia1)){
										echo "<option value='".$materia->materia1."'>".$materia->materia1."</option>";	
									}

									if(!empty($materia->materia2)){
										echo "<option value='".$materia->materia2."'>".$materia->materia2."</option>";	
									}

									if(!empty($materia->materia3)){
										echo "<option value='".$materia->materia3."'>".$materia->materia3."</option>";	
									}
									?>
								</select>
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<select class="form-control" required="" name="bimestre" id="biNota">
									<option value="">Bimestre</option>
									<option value="1BI">1º Bimestre</option>
									<option value="2BI">2º Bimestre</option>
									<option value="3BI">3º Bimestre</option>
									<option value="4BI">4º Bimestre</option>
								</select>
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
								<select class="form-control" required="" name="avaliacao" id="provaNota">
									<option value="">Atividade</option>
									<option value="P1">Prova 1</option>
									<option value="P2">Prova 2</option>
									<option value="meBi">Média bimestral</option>
									<option value="recB">Recuperação bimestral</option>
								</select>
							</div>
							<div class='input-group'>
								<span class='input-group-addon'><i class='glyphicon glyphicon-list-alt'></i></span>
								<input type='text' class='form-control input-sm' placeholder="Inserir nota" name='nota' id='lNota' required=''>
							</div>
						</div>

						<div class="text-right">
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#corrigirNota">Corrigir nota</button>
						</div>

						<hr />
						<table class="table table-bordered" id="fundManha">
							<thead>
								<tr>
									<th>Aluno</th>
									<th>Enviar</th>
									<th>Desempenho do aluno</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(!empty($turmas)){
									foreach($turmas as $TURMAS){
										echo "<tr>";
										echo "<td>".$TURMAS->nome."</td>";
										echo "<td><button type='submit' class='btn btn-success' name='matricula' onclick='return lancarNotas(this)' value='".$TURMAS->matricula."'><span class='glyphicon glyphicon-arrow-right'></span></button></td>";
										echo "<td><button type='submit' class='btn btn-primary' name='matricula' onclick='return verNotas(this)' value='".$TURMAS->matricula."'><span class='glyphicon glyphicon-eye-open'></span></button></td>";
										echo "</tr>";
									}

								} else{

									echo "
									<div align = 'center'><h3>Nenhum aluno matriculado nesta turma</h3></div>
									";
								}
								?>
							</tbody>
						</table>
					</form>
				</div>

				<!-- REGISTRO DE AULAS -->
				<div class="tab-pane fade" id="registroAulas">

					<div align="right"><button class="btn btn-danger" data-toggle="modal" data-target="#minhasAulas">Visualizar meu registros de aulas</button></div>
					<br />
					<div class="container-fluid">
						<form action="" method="">
							<div class="form-inline" align="center">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
									<select class="form-control" required="" name="disciplina" id="selDis">
										<option value="">Disciplina</option>
										<?php 
										if(!empty($materia->materia1)){
											echo "<option value='".$materia->materia1."'>".$materia->materia1."</option>";	
										}

										if(!empty($materia->materia2)){
											echo "<option value='".$materia->materia2."'>".$materia->materia2."</option>";	
										}

										if(!empty($materia->materia3)){
											echo "<option value='".$materia->materia3."'>".$materia->materia3."</option>";	
										}
										?>
									</select>
								</div>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-text-size"></i></span>
									<select class="form-control" required="" name="turma" id="selTurma">
										<option value="">Turma</option>
										<?php 
										foreach($turma as $TURMAS){
											echo "<option value=".$TURMAS->codigo.">".$TURMAS->nome."</option>";	
										}
										?>
									</select>
								</div>
							</div>
							<br />
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" name="" id="dtAula" class="form-control" placeholder="Data da aula" required="">
							</div>
							<br />
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-blackboard"></i></span>
								<input type="text" name="" id="conteudo" class="form-control" placeholder="Conteúdo ministrado" required="">
							</div>
							<br />
							<div class="form-group">
								<textarea class="form-control" rows="5" name="" id="atividadeD" placeholder="Atividade desenvolvida" required=""></textarea>
							</div>
							<div align="right">
								<button type="submit" class="btn btn-success" onclick="return lancarRegistro()">Enviar</button>
							</div>
						</form>
					</div>
				</div>

				<!-- Lançar situação do aluno -->

				<div class="tab-pane fade" id="situacaoAluno">

					<div class="collapse in" id="alunoSituation">
						<div align="right"><button class="btn btn-danger" onclick="provaFinal()">Exame final</button></div>
						<form action="" method="">
							<div class="form-inline" align="center">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
									<select class="form-control" name="disciplina" id="discSit" required="">
										<option value="">Disciplina</option>
										<?php 
										if(!empty($materia->materia1)){
											echo "<option value='".$materia->materia1."'>".$materia->materia1."</option>";	
										}

										if(!empty($materia->materia2)){
											echo "<option value='".$materia->materia2."'>".$materia->materia2."</option>";	
										}

										if(!empty($materia->materia3)){
											echo "<option value='".$materia->materia3."'>".$materia->materia3."</option>";	
										}
										?>
									</select>
								</div>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
									<select class="form-control" name="situacao" id="lSituacao" required="">
										<option value="">Selecionar situação</option>
										<option value="APROVADO(A) POR MÉDIA">Aprovado por média</option>
										<option value="PROVA FINAL">Prova final</option>
									</select>
								</div>
							</div>
							<hr />
							<table class="table table-bordered" id="medManha">
								<thead>
									<tr>
										<th>Aluno</th>
										<th>Enviar</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(!empty($turmas)){
										foreach($turmas as $TURMAS){
											echo "<tr>";
											echo "<td>".$TURMAS->nome."</td>";
											echo "<td><button type='submit' class='btn btn-success' name='matricula' onclick='return lancarSituacao(this)' value='".$TURMAS->matricula."'><span class='glyphicon glyphicon-arrow-right'></span></button></td>";
											echo "</tr>";
										}

									} else{

										echo "
										<div align = 'center'><h3>Nenhum aluno matriculado nesta turma</h3></div>
										";
									}
									?>
								</tbody>
							</table>
						</form>
					</div>

					<!-- EXAME FINAL -->
					<div class="collapse" id="pFinal">
						<div align="right"><button class="btn btn-primary" onclick="situacaoAluno()">Situação do aluno</button></div>

						<form action="" method="">
							<div class="form-inline" align="center">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
									<select class="form-control" name="disciplina" id="discFinal" required="">
										<option value="">Disciplina</option>
										<?php 
										if(!empty($materia->materia1)){
											echo "<option value='".$materia->materia1."'>".$materia->materia1."</option>";	
										}

										if(!empty($materia->materia2)){
											echo "<option value='".$materia->materia2."'>".$materia->materia2."</option>";	
										}

										if(!empty($materia->materia3)){
											echo "<option value='".$materia->materia3."'>".$materia->materia3."</option>";	
										}
										?>
									</select>
								</div>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i></span>
									<select class="form-control" name="resultadoFinal" id="resultFinal" required="">
										<option value="">Resultado final</option>
										<option value="APROVADO(A)">Aprovado(a)</option>
										<option value="REPROVADO(A)">Reprovado(a)</option>
									</select>
								</div>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
									<input type="text" name="notaFinal" id="notaFinal" placeholder="Inserir nota da prova final" class="form-control" required="">
								</div>
							</div>
							<hr />
							<table class="table table-bordered" id="medTarde">
								<thead>
									<tr>
										<th>Aluno</th>
										<th>Enviar</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(!empty($turmas)){
										foreach($turmas as $TURMAS){
											echo "<tr>";
											echo "<td>".$TURMAS->nome."</td>";
											echo "<td><button type='submit' class='btn btn-success' name='matricula' onclick='return exameFinal(this)' value='".$TURMAS->matricula."'><span class='glyphicon glyphicon-arrow-right'></span></button></td>";
											echo "</tr>";
										}

									} else{

										echo "
										<div align = 'center'><h3>Nenhum aluno matriculado nesta turma</h3></div>
										";
									}
									?>
								</tbody>
							</table>
						</form>
					</div>
				</div>

				<!-- ANEXAR ARQUIVOS NA TURMA -->
				<div class="tab-pane fade"  id="anexarArquivo">
					<div class="text-right"><button class="btn btn-danger" data-toggle="modal" data-target="#meusArquivos">Visualizar arquivos anexados</button></div>
					<br />
					<form action="<?php echo base_url();?>arquivos/anexarArquivo" method="post" enctype="multipart/form-data">
						<div class="form-inline text-center">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
								<select class="form-control" name="discArquivo" required="">
									<option value="">Disciplina</option>
									<?php 
									if(!empty($materia->materia1)){
										echo "<option value='".$materia->materia1."'>".$materia->materia1."</option>";	
									}

									if(!empty($materia->materia2)){
										echo "<option value='".$materia->materia2."'>".$materia->materia2."</option>";	
									}

									if(!empty($materia->materia3)){
										echo "<option value='".$materia->materia3."'>".$materia->materia3."</option>";	
									}
									?>
								</select>
							</div>

							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-text-size"></i></span>
								<select class="form-control" required="" name="turmaArquivo">
									<option value="">Turma</option>
									<?php 
									foreach($turma as $TURMAS){
										echo "<option value=".$TURMAS->codigo.">".$TURMAS->nome."</option>";	
									}
									?>
								</select>
							</div>
						</div>
						<br />
						<div class="input-group">
							<input type="file" name="anexoAluno" id="anexoAluno" required="" accept=".pdf, .doc, .docx, .rar, .zip, pptx" class="form-control">
							<span class="input-group-addon"><i class="glyphicon glyphicon-folder-open"></i></span>
						</div>
						<small  class="form-text text-muted">Tipos de arquivos suportados: pdf, doc, docx, pptx, rar, zip.</small>
						<br />
						<small class="form-text text-muted">Tamanho máximo: 10mb.</small>
						<br />
						<div class="text-right">
							<button type="submit" class="btn btn-success">Enviar</button>
						</div>
					</form>
				</div>
				<!-- FIM -->

			</div>
		</div>
	</div>


	<!-- MODAL COM OS REGISTROS DE AULA -->
	<div id="minhasAulas" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Meus registros de aulas</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<table class="table table-bordered" id="tableRegistros">
							<thead>
								<tr>
									<th>Disciplina</th>
									<th>Dia</th>
									<th>Conteúdo</th>
									<th>Atividade</th>
									<th>Excluir</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach($registro as $REG){
									echo "<tr>";
									echo "<td>".$REG->disciplina."</td>";
									echo "<td>".$REG->dataRegistro."</td>";
									echo "<td>".$REG->conteudo."</td>";
									echo "<td>".$REG->atividade."</td>";
									echo "<td><button class='btn btn-danger' name='ID' value=".$REG->ID." onclick='return deleteRegAula(this)'><span class='glyphicon glyphicon-trash'></span></button></td>";
									echo "</tr>";
								}
								?>
							</tbody>
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

	<!-- MODAL COM OS ARQUIVOS ANEXADOS -->
	<div id="meusArquivos" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Arquivos anexados</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<table class="table table-bordered" id="anexos">
							<thead>
								<tr>
									<th>Disciplina</th>
									<th>Arquivo</th>
									<th>Baixar</th>
									<th>Excluir</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$an=0;
								foreach($anexo as $AX){
									echo "<tr>";
									echo "<td>".$AX->discArquivo."</td>";
									echo "<td>".$AX->anexoArquivo."</td>";
									echo "<td><a href = '/arquivos/baixarAnexo/".$AX->ID."'<button class='btn btn-primary'><span class='glyphicon glyphicon-download'></span></button></a></td>";
									echo "<td><a href='/arquivos/deletarAnexo/".$AX->ID."'<button class='btn btn-danger' onclick='return deleteAnexo()'><span class='glyphicon glyphicon-trash'></span></button></td></a>";
									echo "</tr>";

									$an++;	
								}
								?>
							</tbody>
						</table>
						<div class="text-right"><strong>Total de arquivos anexados: <?php echo $an; ?></strong></div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- FIM DO MODAL  -->


	<!-- MODAL PARA CORREÇÃO DE NOTAS -->
	<div id="corrigirNota" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Insira as informações necessárias</h4>
				</div>
				<form action="<?php echo base_url();?>professor/corrigirNota" method="post">
					<div class="modal-body">
						<div class="container-fluid">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
								<select class="form-control" name="disciplina" required="">
									<option value="">Disciplina</option>
									<?php 
									if(!empty($materia->materia1)){
										echo "<option value='".$materia->materia1."'>".$materia->materia1."</option>";	
									}

									if(!empty($materia->materia2)){
										echo "<option value='".$materia->materia2."'>".$materia->materia2."</option>";	
									}

									if(!empty($materia->materia3)){
										echo "<option value='".$materia->materia3."'>".$materia->materia3."</option>";	
									}
									?>
								</select>
							</div>
							<br />
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<select class="form-control" required="" name="bimestre">
									<option value="">Bimestre</option>
									<option value="1BI">1º Bimestre</option>
									<option value="2BI">2º Bimestre</option>
									<option value="3BI">3º Bimestre</option>
									<option value="4BI">4º Bimestre</option>
								</select>
							</div>
							<br />
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
								<select class="form-control" required="" name="avaliacao">
									<option value="">Atividade</option>
									<option value="P1">Prova 1</option>
									<option value="P2">Prova 2</option>
									<option value="meBi">Média bimestral</option>
									<option value="recB">Recuperação bimestral</option>
								</select>
							</div>
							<br />
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
								<input type="text" name="matricula" class="form-control" required="" placeholder="Matrícula do aluno">
							</div>
							<small class="form-text text-muted">Disponível na aba "Registro de frequência"</small>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Buscar registro</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- FIM DO MODAL -->


	<!-- MODAL PARA ENVIAR MENSAGENS -->

	<!-- <div class="modal fade" id="comunicar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	</div> -->

	<!-- FIM DO MODAL -->

	<script type="text/javascript">

		$('#dtFreq').datepicker({	
			format: "dd/mm/yyyy",	
			language: "pt-BR",
			// startDate: '+0d',
		});

		$('#dtAula').datepicker({	
			format: "dd/mm/yyyy",	
			language: "pt-BR",
			// startDate: '+0d',
		});


		function lancarRegistro(){

			var dis = $('#selDis').val();
			var turma = $('#selTurma').val();
			var data = $('#dtAula').val();
			var cont = $('#conteudo').val();
			var atv = $('#atividadeD').val();

			if(dis != "" && turma != "" && data != "" && cont != "" && atv != ""){

				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>professor/lancarRegistroAula',
					data: 'disciplina='+dis + '&turma='+turma + '&dataRegistro='+data + '&conteudo='+cont + '&atividade='+atv,
					cache: false,
					success: function(resultado){
						swal({
							type: 'success',
							title: resultado
						});
					}
				});

				$('#selDis').val("");
				// $('#selTurma').val("");
				$('#dtAula').val("");
				$('#conteudo').val("");
				$('#atividadeD').val("");
				return false;
			}

		}


		function lancarFalta(objButton){

			var matricula = (objButton.value);
			var disc = $('#discF').val();
			var data = $('#dtFreq').val();

			if(disc != "" && data != ""){
				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>professor/lancarFalta',
					data: 'matricula='+matricula + '&disciplina='+disc + '&dataRegistro='+data,
					cache: false,
					success: function(resultado){
						swal({
							position: 'top-right',
							type: 'success',
							title: resultado,
							width: '300px',
							showConfirmButton: false,
							timer: 500
						})
					}
				});

				return false;	
			}	
		}


		function consultarFalta(objButton){

			var matricula = (objButton.value);
			var disc = $('#discF').val();

			if(disc != ""){
				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>professor/consultarFalta',
					data: 'disciplina='+disc + '&matricula='+matricula,
					cache: false,
					success: function(resultado){
						swal({
							title: 'Registro de frequência',
							html: resultado,
							width: '600px'
						});
					}
				});
				return false;
			}
		}


		function removerFalta(objButton){

			var matricula = (objButton.value);
			var disc = $('#discF').val();
			var data = $('#dtFreq').val();
			if(disc != "" && data != ""){
				$.ajax({

					type: 'post',
					url: '<?php echo base_url();?>professor/removerFalta',
					data: 'disciplina='+disc + '&matricula='+matricula + '&dataRegistro='+data,
					cache: false,
					success: function(resultado){
						swal({
							position: 'top-right',
							type: 'success',
							title: resultado,
							width: '300px',
							showConfirmButton: false,
							timer: 500
						})
					}
				});

				return false;	
			}	
		}


		function lancarNotas(objButton){

			var disc = $('#discNota').val();
			var bi = $('#biNota').val();
			var aval = $('#provaNota').val();
			var nota = $('#lNota').val();
			var matricula = (objButton.value);

			if(disc != "" && bi != "" && aval != "" && nota != ""){
				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>professor/lancarNota',
					data: 'matricula='+matricula + '&disciplina='+disc + '&bimestre='+bi + '&avaliacao='+aval + '&nota='+nota,
					cache: false
				});

				$('#lNota').val("");
				objButton.disabled=true;
				return false;
			}
		}


		function lancarSituacao(objButton){

			var matricula = (objButton.value);
			var disc = $('#discSit').val();
			var sit = $('#lSituacao').val();

			if(disc != "" && sit != ""){
				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>professor/lancarSituacao',
					data: 'matricula='+matricula + '&disciplina='+disc + '&situacao='+sit,
					cache: false
				});

				objButton.disabled=true;
				$('#lSituacao').val("");
				return false;
			}

		}


		function exameFinal(objButton){

			var matricula = (objButton.value);
			var disc = $('#discFinal').val();
			var nota = $('#notaFinal').val();
			var result = $('#resultFinal').val();
			if(disc != "" && nota != "" && result != ""){
				$.ajax({

					type: 'post',
					url: '<?php echo base_url();?>professor/exameFinal',
					data: 'matricula='+matricula +  '&disciplina='+disc + '&notaFinal='+nota + '&resultadoFinal='+result,
					cache: false
				});

				$('#notaFinal').val("");
				$('#resultFinal').val("");
				objButton.disabled=true;
				return false;
			}
		}


		function verNotas(objButton){

			var matricula = (objButton.value);
			var disc = $('#discNota').val();
			var bi = $('#biNota').val();

			if(disc != "" && bi != ""){
				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>professor/DesempenhoAluno',
					data:  'matricula='+matricula + '&disciplina='+disc + '&bimestre='+bi,
					cache: false,
					success: function(resultado){
						swal({
							title: 'Boletim do aluno',
							html: resultado,
							width: '800px'
						});
					}
				});
				return false;
			}
		}

		function deleteRegAula(objButton){

			var r = confirm("Deseja mesmo excluir este registro de aula?");

			if(r){

				var ID = (objButton.value);

				$.ajax({

					type: 'post',
					url: '<?php echo base_url();?>deletar/deleteRegistroAula',
					data: 'ID='+ID,
					cache: false,
					success: function(resultado){

						swal({
							type: 'success',
							title: resultado	
						});
					}

				});

				setTimeout('location.reload()', 1500);

			} else{

				return false;
			}
		}

		function deleteAnexo(){

			var r = confirm("Deseja mesmo excluir este arquivo?");

			if(r){

				return r;

			} else{

				return false
			}
		}

		var uploadField = document.getElementById("anexoAluno");

		uploadField.onchange = function() {
			if(this.files[0].size > 5000000){
				alert("O arquivo selecionado é muito grande!");
				this.value = "";
			};
		};
	</script>
</body>
</html>