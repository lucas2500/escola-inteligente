
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Enviar arquivos</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
	
	<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/tableFilter.js');?>"></script>
</head>
<body>
	<div class="well well-lg">
		<div class="container" align="left">
			<h3 align="center">Arquivos recebidos</h3>
			<br />
			<table class="table table-striped table-bordered" id="tableRegistros">
				<thead>
					<tr>
						<th><span class="glyphicon glyphicon-folder-open"></span></th>
						<th><span class="glyphicon glyphicon-user"></span></th>
						<th>Baixar</span></th>
						<th>Excluir</span></th>	
					</tr>
				</thead>
				<tbody>		
					<?php 
					foreach($arquivo as $ARQUIVO){

						echo "<tr>";
						echo "<td>".$ARQUIVO->nome."</td>";
						echo "<td>".$ARQUIVO->proprietario."</td>";
						echo  '<td><a href = "/arquivos/baixarArquivo/'.$ARQUIVO->ID.'" <button class="btn btn-primary"><span class="glyphicon glyphicon-download"></span></button></a>';
						echo  '<td><a href = "/arquivos/deleteArquivo/'.$ARQUIVO->ID.'" <button class="btn btn-danger" onclick="return apagarArquivo()"><span class="glyphicon glyphicon-trash"></span></button></a>';
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<script type="text/javascript">
		
		function apagarArquivo(){

			var x = confirm("Deseja realmente apagar este arquivo?");

			if(x){

				return x;

			} else{

				return false;
			}

		}
	</script>
</body>
</html>
