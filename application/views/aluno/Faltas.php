<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Notas e faltas</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="<?php echo base_url('assets/pdf/jspdf.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/pdf/pdfFromHTML.js');?>"></script>

	<style type="text/css">
	
	.head{

		font-size: 100%;
		text-transform: uppercase;

	}

	.boletim{

		margin-top: 4%;

	}

	.nota{

		margin-top: 3%;

	}
</style>
</head>
<body>
	<div class="well well-lg" align="center">
		<button class="btn btn-primary"  data-toggle="modal" data-target="#1ºBi">1º Bimestre</button> <button class="btn btn-warning"  data-toggle="modal" data-target="#2ºBi" style="margin: 1%;">2º Bimestre</button>  <button class="btn btn-danger"  data-toggle="modal" data-target="#3ºBi">3º Bimestre</button> <button class="btn btn-success"  data-toggle="modal" data-target="#4ºBi" style="margin: 1%;">4º Bimestre</button>

		<hr />

		<div class="container">
			<h4 align="left">SITUAÇÃO DO ALUNO(A)</h4>
			<div align="right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#frequencia"><span class="glyphicon glyphicon-calendar"></span></button> <button class="btn btn-danger" data-toggle="modal" data-target="#final"><span class="glyphicon glyphicon-list-alt"></span></button>	
			</div>
			<br />
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>DISCIPLINA</th>
						<th>SITUAÇÃO</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach($situacao as $SITUACAO){
						echo "<tr>";
						echo "<td>".$SITUACAO->disciplina."</td>";
						echo "<td style = 'text-transform: uppercase;'>".$SITUACAO->situacao."</td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>


	<!-- MODAL NOTAS DO 1º BIMESTRE -->
	<div class="modal fade" id="1ºBi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<button class="btn btn-danger" onclick="Boletim1()"><span class="glyphicon glyphicon-print"></span></button>
				</div>
				<div class="container-fluid" id="boletim1">
					<div align="center">
						<img style="width: 440px;" src="<?php echo base_url('assets/img/logo.png');?>">
					</div>
					<div align="left" class="head">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>NOME</th>
									<th>MATRÍCULA</th>
									<th>NÍVEL</th>
									<th>TURNO</th>	
								</tr>	
							</thead>

							<tbody>
								<tr>
									<td><?php echo $nome->nome; ?></td>
									<td><?php echo $nome->Matricula; ?></td>
									<td><?php echo $nome->nivel; ?></td>
									<td><?php echo $nome->turno; ?></td>
								</tr>
							</tbody>
						</table>	
					</div>

					<h4 align="left" class="boletim">BOLETIM 1º BIMESTRE</h4>

					<hr />

					<h4 align="left" class="nota">AVALIAÇÃO 1</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($nota as $NOTA){
								if($NOTA->bimestre == "1BI" && $NOTA->avaliacao == "P1"){
									echo "<tr>";
									echo "<td>".$NOTA->disciplina."</td>";
									echo "<td>".$NOTA->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />
					<h4 align="left">AVALIAÇÃO 2</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($nota as $NOTA){
								if($NOTA->bimestre == "1BI" && $NOTA->avaliacao == "P2"){
									echo "<tr>";
									echo "<td>".$NOTA->disciplina."</td>";
									echo "<td>".$NOTA->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />
					<h4 align="left">MÉDIA BIMESTRAL</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($nota as $NOTA){
								if($NOTA->bimestre == "1BI" && $NOTA->avaliacao == "meBi"){
									echo "<tr>";
									echo "<td>".$NOTA->disciplina."</td>";
									echo "<td>".$NOTA->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />

					<div class="form-group" align="center">
						<h4 align="left">RECUPERAÇÃO BIMESTRAL</h4>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>DISCIPLINA</th>
									<th>NOTA</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($nota as $NOTA){
									if($NOTA->bimestre == "1BI" && $NOTA->avaliacao == "recB"){
										echo "<tr>";
										echo "<td>".$NOTA->disciplina."</td>";
										echo "<td>".$NOTA->nota."</td>";
										echo "</tr>";
									}
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

	<!-- MODAL NOTAS DO 2º BIMESTRE -->

	<div class="modal fade" id="2ºBi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>					
					<button class="btn btn-danger" onclick="Boletim2()"><span class="glyphicon glyphicon-print"></span></button>
				</div>
				<div class="container-fluid" id="boletim2">
					<div align="center">
						<img style="width: 440px;" src="<?php echo base_url('assets/img/logo.png');?>">
					</div>
					<div align="left" class="head">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Matrícula</th>
									<th>Nível</th>
									<th>Turno</th>	
								</tr>	
							</thead>

							<tbody>
								<tr>
									<td><?php echo $nome->nome; ?></td>
									<td><?php echo $nome->Matricula; ?></td>
									<td><?php echo $nome->nivel; ?></td>
									<td><?php echo $nome->turno; ?></td>
								</tr>
							</tbody>
						</table>	
					</div>

					<h4 align="left" class="boletim">BOLETIM 2º BIMESTRE</h4>

					<hr />

					<h4 align="left" class="nota">AVALIAÇÃO 1</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($nota as $NOTA2){
								if($NOTA2->bimestre == "2BI" && $NOTA2->avaliacao == "P1"){
									echo "<tr>";
									echo "<td>".$NOTA2->disciplina."</td>";
									echo "<td>".$NOTA2->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />
					<h4 align="left">AVALIAÇÃO 2</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($nota as $NOTA2){
								if($NOTA2->bimestre == "2BI" && $NOTA2->avaliacao == "P2"){
									echo "<tr>";
									echo "<td>".$NOTA2->disciplina."</td>";
									echo "<td>".$NOTA2->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />
					<h4 align="left">MÉDIA BIMESTRAL</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($nota as $NOTA2){
								if($NOTA2->bimestre == "2BI" && $NOTA2->avaliacao == "meBi"){
									echo "<tr>";
									echo "<td>".$NOTA2->disciplina."</td>";
									echo "<td>".$NOTA2->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />
					<div class="form-group" align="center">
						<h4 align="left">RECUPERAÇÃO BIMESTRAL</h4>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>DISCIPLINA</th>
									<th>NOTA</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach($nota as $NOTA2){
									if($NOTA2->bimestre == "2BI" && $NOTA2->avaliacao == "recB"){
										echo "<tr>";
										echo "<td>".$NOTA2->disciplina."</td>";
										echo "<td>".$NOTA2->nota."</td>";
										echo "</tr>";
									}
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

	<!-- MODAL 3º BIMESTRE -->

	<div class="modal fade" id="3ºBi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<button class="btn btn-danger" onclick="Boletim3()"><span class="glyphicon glyphicon-print"></span></button>
				</div>
				<div class="container-fluid" id="boletim3">
					<div align="center">
						<img style="width: 440px;" src="<?php echo base_url('assets/img/logo.png');?>">
					</div>
					<div align="left" class="head">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Matrícula</th>
									<th>Nível</th>
									<th>Turno</th>	
								</tr>	
							</thead>

							<tbody>
								<tr>
									<td><?php echo $nome->nome; ?></td>
									<td><?php echo $nome->Matricula; ?></td>
									<td><?php echo $nome->nivel; ?></td>
									<td><?php echo $nome->turno; ?></td>
								</tr>
							</tbody>
						</table>		
					</div>

					<h4 align="left" class="boletim">BOLETIM 3º BIMESTRE</h4>

					<hr />

					<h4 align="left" class="nota">AVALIAÇÃO 1</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($nota as $NOTA3){
								if($NOTA3->bimestre == "3BI" && $NOTA3->avaliacao == "P1"){
									echo "<tr>";
									echo "<td>".$NOTA3->disciplina."</td>";
									echo "<td>".$NOTA3->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />
					<h4 align="left">AVALIAÇÃO 2</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($nota as $NOTA3){
								if($NOTA3->bimestre == "3BI" && $NOTA3->avaliacao == "P2"){
									echo "<tr>";
									echo "<td>".$NOTA3->disciplina."</td>";
									echo "<td>".$NOTA3->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />
					<h4 align="left">MÉDIA BIMESTRAL</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($nota as $NOTA3){
								if($NOTA3->bimestre == "3BI" && $NOTA3->avaliacao == "meBi"){
									echo "<tr>";
									echo "<td>".$NOTA3->disciplina."</td>";
									echo "<td>".$NOTA3->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />
					<div class="form-group" align="center">
						<h4 align="left">RECUPERAÇÃO BIMESTRAL</h4>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>DISCIPLINA</th>
									<th>NOTA</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($nota as $NOTA3){
									if($NOTA3->bimestre == "3BI" && $NOTA3->avaliacao == "recB"){
										echo "<tr>";
										echo "<td>".$NOTA3->disciplina."</td>";
										echo "<td>".$NOTA3->nota."</td>";
										echo "</tr>";
									}
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

	<!-- MODAL 4º BIMESTRE -->

	<div class="modal fade" id="4ºBi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<button class="btn btn-danger" onclick="Boletim4()"><span class="glyphicon glyphicon-print"></span></button>
				</div>
				<div class="container-fluid" id="boletim4">
					<div align="center">
						<img style="width: 440px;" src="<?php echo base_url('assets/img/logo.png');?>">
					</div>
					<div align="left" class="head">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Matrícula</th>
									<th>Nível</th>
									<th>Turno</th>	
								</tr>	
							</thead>

							<tbody>
								<tr>
									<td><?php echo $nome->nome; ?></td>
									<td><?php echo $nome->Matricula; ?></td>
									<td><?php echo $nome->nivel; ?></td>
									<td><?php echo $nome->turno; ?></td>
								</tr>
							</tbody>
						</table>	
					</div>

					<h4 align="left" class="boletim">BOLETIM 4º BIMESTRE</h4>

					<hr />

					<h4 align="left" class="nota">AVALIAÇÃO 1</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($nota as $NOTA4){
								if($NOTA4->bimestre == "4BI" && $NOTA4->avaliacao == "P1"){
									echo "<tr>";
									echo "<td>".$NOTA4->disciplina."</td>";
									echo "<td>".$NOTA4->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />
					<h4 align="left">AVALIAÇÃO 2</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($nota as $NOTA4){
								if($NOTA4->bimestre == "4BI" && $NOTA4->avaliacao == "P2"){
									echo "<tr>";
									echo "<td>".$NOTA4->disciplina."</td>";
									echo "<td>".$NOTA4->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />
					<h4 align="left">MÉDIA BIMESTRAL</h4>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($nota as $NOTA4){
								if($NOTA4->bimestre == "4BI" && $NOTA4->avaliacao == "meBi"){
									echo "<tr>";
									echo "<td>".$NOTA4->disciplina."</td>";
									echo "<td>".$NOTA4->nota."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
					<br />
					<div class="form-group" align="center">
						<h4 align="left">RECUPERAÇÃO BIMESTRAL</h4>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>DISCIPLINA</th>
									<th>NOTA</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($nota as $NOTA4){
									if($NOTA4->bimestre == "4BI" && $NOTA4->avaliacao == "recB"){
										echo "<tr>";
										echo "<td>".$NOTA4->disciplina."</td>";
										echo "<td>".$NOTA4->nota."</td>";
										echo "</tr>";
									}
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

	<!-- MODAL EXAME FINAL -->

	<div class="modal fade" id="final" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 align="left">EXAME FINAL</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>DISCIPLINA</th>
								<th>NOTA</th>
								<th>RESULTADO FINAL</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($resultado as $RESULT){
								echo "<tr>";
								echo "<td>".$RESULT->disciplina."</td>";
								echo "<td>".$RESULT->notaFinal."</td>";
								echo "<td style = 'text-transform: uppercase;'>".$RESULT->resultadoFinal."</td>";
								echo "</tr>";
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


	<!-- FIM DO MODAL -->

	<!-- MODAL COM A FREQUÊNCIA DO ALUNO -->

	<div id="frequencia" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">FREQUÊNCIA - FALTAS</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Disciplina</th>
								<th>Dia</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$cont=0;
							foreach($falta as $FT){
								echo "<tr>";
								echo "<td>".$FT->disciplina."</td>";
								echo "<td>".$FT->dataRegistro."</td>";
								echo "</tr>";
								$cont++;
							}
							?>
						</tbody>
					</table>
					<div align="left"><strong>Total de faltas: </strong><?php echo $cont; ?></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO MODAL -->

</body>
</html>