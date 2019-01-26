<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Enviar notas</title>



	<style type="text/css">

	.select{

		width: 20%;
		margin: 1%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	.Nota[type=text] {
		width: 15%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	.select2{

		width: 30%;
		margin: 1%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}



</style>
</head>
<body>
	<div class="container">  
		<div class="well well-lg">
			<div class="container">
				<div class="row">
					<div align="left">
					</div>
				</div>
			</div>
			<br/>         
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Matrícula</th>
						<th>Turma</th>
						<th>Notas e faltas</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>LUCAS RAFAEL DE OLIVEIRA BARBOSA</td>
						<td>16201675</td>
						<td>3º B</td>
						<td><button  class="btn btn-primary" data-toggle="modal" data-target="#Notas">Acessar</button></td>
					</tr>
				</tbody>
			</table>

			<hr />

			<div align="left">
				<h4>Enviar notas</h4>

			</div>

			<div align="center">

				<form action="" method="">


					<br />

					<select required class="select" name="materia">
						<option value="">Matéria</option>
						<option value="PORTUGUÊS">Português</option>
						<option value="MATEMÁTICA">Matemática</option>
						<option value="HISTÓRIA">História</option>
						<option value="GEOGRÁFIA">Geográfia</option>
						<option value="QUIMICA">Quimica</option>
						<option value="FÍSICA">Física</option>
						<option value="SOCIOLOGIA">Sociologia</option>
						<option value="FILOSOFIA">Filosofia</option>
						<option value="EDUCAÇÃO FÍSICA">Educação física</option>
					</select>

					<select required class="select" name="bimestre">

						<option value="">Bimestre</option>
						<option value="1BI">1º Bimestre</option>
						<option value="2BI">2º Bimestre</option>
						<option value="3BI">3º Bimestre</option>
						<option value="4BI">4º Bimestre</option>

					</select>

					<select required class="select" name="notas">

						<option value="">Nota</option>
						<option value="N1">Nota 1</option>
						<option value="N2">Nota 2</option>
						<option value="N3">Nota 3</option>
						<option value="media">Média</option>
						<option value="REC1">Recuperação nota 1</option>
						<option value="REC2">Recuperação nota 2</option>
						<option value="REC3">Recuperação nota 3</option>


					</select>

					<br />

					<input type="text" name="" placeholder="Nota" required="" class="Nota"> <button type="submit" class="btn btn-success" style="margin: 1%;">Enviar</button>

				</form>

				<hr />

			</div>

			<div align="center">
				<button class="btn btn-primary" data-toggle="modal" data-target="#alunoSituacao" style="margin: 1%;">Situação do aluno</button> <button class="btn btn-danger"  data-toggle="modal" data-target="#exameFinal">Exame final</button>
			</div>

		</div>
	</div>	

	<!-- MODAL COM AS NOTAS -->
	<div class="modal fade" id="Notas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<br />

					<div class="form-group" align="center">

						<form action="" method="">
							<select required class="select2" name="materia">
								<option value="">Matéria</option>
								<option value="1BI">Português</option>
								<option value="2BI">Matemática</option>
								<option value="3BI">História</option>
								<option value="4BI">Geográfia</option>
								<option value="Final">Quimica</option>
								<option value="Final">Física</option>
								<option value="Final">Sociologia</option>
								<option value="Final">Filosofia</option>
								<option value="Final">Educação física</option>
							</select>

							<div align="center">
								<input type="text" name="buscarAluno" placeholder="Matrícula" style=" text-transform: uppercase;" required>
								<br />
								<button type="submit" class="btn btn-success">Buscar</button>
							</div>

						</form>

						<!-- tabela do 1º bimestre -->
						<table class="table table-bordered">
							<thead>
								<div align="left" style="font-family: arial; font-size: 15px">
									<h5>1º Bimestre</h5>
								</div>
								<tr>
									<th>Nota 1</th>
									<th>Recuperação</th>
									<th>Nota 2</th>
									<th>Recuperação</th>
									<th>Nota 3</th>
									<th>Recuperação</th>
									<th>Média</th>

								</tr>

							</thead>

							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>

								</tr>

							</tbody>

						</table>

						<!-- tabela do 2º bimestre -->
						<table class="table table-bordered">
							<thead>
								<div align="left" style="font-family: arial; font-size: 15px">
									<h5>2º Bimestre</h5>
								</div>
								<tr>
									<th>Nota 1</th>
									<th>Recuperação</th>
									<th>Nota 2</th>
									<th>Recuperação</th>
									<th>Nota 3</th>
									<th>Recuperação</th>
									<th>Média</th>

								</tr>
							</thead>

							<tbody>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>

							</tbody>

						</table>

						<!-- tabela do 3º bimestre -->
						<table class="table table-bordered">
							<thead>
								<div align="left" style="font-family: arial; font-size: 15px">
									<h5>3º Bimestre</h5>
								</div>
								<tr>
									<th>Nota 1</th>
									<th>Recuperação</th>
									<th>Nota 2</th>
									<th>Recuperação</th>
									<th>Nota 3</th>
									<th>Recuperação</th>
									<th>Média</th>

								</tr>
							</thead>

							<tbody>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>

								</tr>

							</tbody>

						</table>

						<!-- tabela do 4º bimestre -->
						<table class="table table-bordered">
							<thead>
								<div align="left" style="font-family: arial; font-size: 15px">
									<h5>4º Bimestre</h5>
								</div>
								<tr>
									<th>Nota 1</th>
									<th>Recuperação</th>
									<th>Nota 2</th>
									<th>Recuperação</th>
									<th>Nota 3</th>
									<th>Recuperação</th>
									<th>Média</th>

								</tr>
							</thead>

							<tbody>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>

								</tr>

							</tbody>

						</table>

						<table class="table table-bordered">

							<div align="left" style="font-family: arial; font-size: 15px">
								<h5>Resultado</h5>
							</div>

							<thead>

								<tr>
									<th>Situação</th>
								</tr>

							</thead>

							<tbody>

								<tr>

									<td></td>

								</tr>

							</tbody>

						</table>

						<hr />

						<!-- tabela do exame final -->
						<table class="table table-bordered">
							<div align="left" style="font-family: arial; font-size: 15px">
								<h5>Exame final</h5>
							</div>

							<thead>
								<tr>
									<th>Nota da prova final</th>
									<th>Resultado final</th>

								</tr>
							</thead>

							<tbody>
								<tr>

									<td></td>
									<td></td>

								</tr>
							</tbody>
						</table>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->





	<!-- MODAL SITUAÇÃO DO ALUNO -->

	<div class="modal fade" id="alunoSituacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<br />
					<br />

					<div class="form-group">
						<div align="center">
							<form action="" method="">

								<select required class="select2" name="materia">
									<option value="">Matéria</option>
									<option value="PORTUGUÊS">Português</option>
									<option value="MATEMÁTICA">Matemática</option>
									<option value="HISTÓRIA">História</option>
									<option value="GEOGRÁFIA">Geográfia</option>
									<option value="QUIMICA">Quimica</option>
									<option value="FÍSICA">Física</option>
									<option value="SOCIOLOGIA">Sociologia</option>
									<option value="FILOSOFIA">Filosofia</option>
									<option value="EDUCAÇÃO FÍSICA">Educação física</option>
								</select>

								<select required class="select2" name="notas" required="">
									<option value="">Selecionar</option>
									<option value="Aprovado(a)">Aprovado(a) por média</option>
									<option value="Prova final">Prova final</option>
								</select>

								<br />

								<button type="submit" class="btn btn-success">Enviar</button>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->


	<!-- MODAL EXAME FINAL -->

	<div class="modal fade" id="exameFinal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<br />
					<br />
					
					<div class="form-group">
						<div align="center">
							<form action="" method="">

								<input type="text" name="" placeholder="Nota" required="" class="Nota" style="margin: 1%;">
								<select required class="select2" name="materia">
									<option value="">Matéria</option>
									<option value="PORTUGUÊS">Português</option>
									<option value="MATEMÁTICA">Matemática</option>
									<option value="HISTÓRIA">História</option>
									<option value="GEOGRÁFIA">Geográfia</option>
									<option value="QUIMICA">Quimica</option>
									<option value="FÍSICA">Física</option>
									<option value="SOCIOLOGIA">Sociologia</option>
									<option value="FILOSOFIA">Filosofia</option>
									<option value="EDUCAÇÃO FÍSICA">Educação física</option>
								</select>


								<select required class="select2" name="notas" required="">
									<option value="">Resultado</option>
									<option value="Aprovado(a)">Aprovado(a)</option>
									<option value="Reprovado(a)">Reprovado(a)</option>
								</select>

								<br />

								<button type="submit" class="btn btn-success" style="margin: 1%;">Enviar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

</body>
</html>