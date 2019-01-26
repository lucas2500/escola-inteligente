<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Avisos</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="<?php echo base_url('assets/deleteMSG.js');?>"></script>
</head>
<body>
	<div class="container">
		<div class="well well-lg">
			<br/> 
			<div class="" align="center">        
				<h3>Quadro de avisos</h3>
				<hr />
				<h4 style="color: green;" align="left"><?php echo $recado; ?></h4>
				<div align="right">
					<button class="btn btn-primary" data-toggle="modal" data-target="#MSG"><span class="glyphicon glyphicon-envelope"></span></button>
				</div>
				<br />
				<table class="table table-bordered">
					<thead>
						<tr>
							<th><span class="glyphicon glyphicon-user" style="color: #87CEEB;"></span></th>
							<th><span class="glyphicon glyphicon-pushpin"></span></th>
							<th><span class="glyphicon glyphicon-time" style="color: red;"></span></th>
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
								echo '</tr>';
							}
						}
						?>
					</tbody>	
				</table>
				<hr />
			</div>
		</div>
	</div>

	<!-- MODAL COM AS MENSAGENS -->

	<div class="modal fade" id="MSG" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Mensagens recebidas</h4>
				</div>
				<div class="modal-body">
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
							foreach($msg as $MSG){
								echo "<tr>";
								echo "<td style ='text-transform: uppercase;'>".$MSG->usuario."</td>";
								echo "<td>".$MSG->mensagem."</td>";
								echo "<td>".$MSG->dataEnvio."</td>";
								echo  '<td><a href = "/deletar/deleteMSGAluno/'.$MSG->ID.'"<button class="btn btn-danger" onclick="return apagarMensagem()"><span class="glyphicon glyphicon-trash"></span></button></a>';
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
</body>
</html>