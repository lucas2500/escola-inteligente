<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
	<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/tableAluno.js');?>"></script>
	<style type="text/css">

	.upperCase{
		text-transform: uppercase;
	}
</style>
</head>
<body>
	<?php

	if(!empty($usuario)){


		echo  '<div class="container-fluid" align="left">
		<h6 style="font-family: arial; font-size: 15px; color:#000000; padding: 1px; Text-transform: uppercase; ">Usuário: '.$usuario->nome.' / '.$usuario->Matricula. ' / '.$usuario->nivel. '</h6>
		</div>';

	} else{

		echo "<div align = 'center'><h3>Um erro ocorreu, por favor realize o login novamente!</h3></div>";
		$this->session->unset_userdata('Matricula');

	}

	if(!empty($aluno)){

		echo '<div class="container-fluid" align="left">
		<h6 style="font-family: arial; font-size: 15px; color:#000000; padding: 1px; Text-transform: uppercase; ">Turma: '.$aluno->nomeTurma.' / '.$aluno->turno. '</h6>
		</div>';

	}
	?>
	<div class="well well-lg">
		<hr />
		<table class="table table-striped">
			<thead>
				<tr>
					<?php
					if(!empty($usuario)){ 

						echo '<th><a href="/professor/verNotasAluno/'.$usuario->Matricula.'">Meu desempenho</a></th>';
					}
					?>
					<th><a href="#" data-toggle="modal" data-target="#horario">Horário de aulas</a></th>
					<th><a href="<?php echo base_url();?>principal/avisosAluno">Recados</a></th>
				</tr>
			</thead>
		</table>
	</div>
	

	<!-- MODAL COM O HORÁRIO -->

	<div class="modal fade" id="horario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body" align="left">
					<div align="left">
						<button class="btn btn-danger" onclick="printHorario()" id="printPageButton"><span class="glyphicon glyphicon-print"></span></button>
					</div>
					<div id="pdf" align="center" class="container-fluid">
						<img style="width: 450px;" src="<?php echo base_url('assets/img/logo.png');?>">
						<br />
						<h2 align="center">Horário de aulas</h2>
						<br />
						<div id="table" align="left">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Segunda</th>
										<th>Terça</th>
										<th>Quarta</th>
										<th>Quinta</th>
										<th>Sexta</th>
									</tr>
								</thead>
								<tbody>
									<?php

									if(!empty($horario)){
										foreach ($horario as $HORARIOS)
										{
											echo "<label align='left' style='text-transform: uppercase;'>".$HORARIOS->nomeTurma. "</label>";

											echo '<tr>';
											echo '<td class ="upperCase">'.$HORARIOS->A1segunda.'</td>'; 
											echo '<td class ="upperCase">'.$HORARIOS->A1terca.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A1quarta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A1quinta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A1sexta.'</td>'; 
											echo '</tr>';

											echo '<tr>';
											echo '<td class ="upperCase">'.$HORARIOS->A2segunda.'</td>'; 
											echo '<td class ="upperCase">'.$HORARIOS->A2terca.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A2quarta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A2quinta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A2sexta.'</td>'; 
											echo '</tr>';

											echo '<tr>';
											echo '<td class ="upperCase">'.$HORARIOS->A3segunda.'</td>'; 
											echo '<td class ="upperCase">'.$HORARIOS->A3terca.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A3quarta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A3quinta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A3sexta.'</td>'; 
											echo '</tr>';

											echo '<tr>';
											echo '<td class ="upperCase">'.$HORARIOS->A4segunda.'</td>'; 
											echo '<td class ="upperCase">'.$HORARIOS->A4terca.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A4quarta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A4quinta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A4sexta.'</td>'; 
											echo '</tr>';

											echo '<tr>';
											echo '<td class ="upperCase">'.$HORARIOS->A5segunda.'</td>'; 
											echo '<td class ="upperCase">'.$HORARIOS->A5terca.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A5quarta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A5quinta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A5sexta.'</td>'; 
											echo '</tr>';

											echo '<tr>';
											echo '<td class ="upperCase">'.$HORARIOS->A6segunda.'</td>'; 
											echo '<td class ="upperCase">'.$HORARIOS->A6terca.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A6quarta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A6quinta.'</td>';
											echo '<td class ="upperCase">'.$HORARIOS->A6sexta.'</td>'; 
											echo '</tr>';
										}
									} 
									?>		
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- FIM DO MODAL -->


	<!-- MODAL COM OS ANEXOS -->
	<div id="arquivosLancados" class="modal fade" role="dialog">
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
								</tr>
							</thead>

							<tbody>
								<?php 
								if(!empty($anexo)){
									foreach($anexo as $AX){
										echo "<tr>";
										echo "<td>".$AX->discArquivo."</td>";
										echo "<td>".$AX->anexoArquivo."</td>";
										echo "<td><a href = '/arquivos/baixarAnexo/".$AX->ID."'<button class='btn btn-primary'><span class='glyphicon glyphicon-download'></span></button></a></td>";
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

</body>
</html>