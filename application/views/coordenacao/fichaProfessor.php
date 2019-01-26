<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ficha do professor</title>
</head>
<body>
	<div class="well well-lg">
		<h3 class="text-center">Ficha do professor(a)</h3>
		<div class="container">
			<div class="text-right">
				<img src="<?php echo base_url($img);?>" class="img-thumbnail" alt="fotoAluno" width="150" height="150">
			</div>
			<h4 class="text-left">Dados gerais e filiação</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Data de Nascimento</th>
						<th>Sexo</th>
						<th>Formação</th>
						<th>Estado civil</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					echo "<tr>";
					echo "<td>".$prof->nome."</td>";
					echo "<td>".$prof->dataNasc."</td>";
					echo "<td>".$prof->sexo."</td>";
					echo "<td>".$prof->formacao."</td>";
					echo "<td>".$prof->estadoCivil."</td>";
					echo "</tr>";	
					?>
				</tbody>
			</table>

			<h4 class="text-left">Endereço</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Cidade</th>
						<th>Bairro</th>
						<th>Rua</th>
						<th>Número</th>
						<th>CEP</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					echo "<tr>";
					echo "<td>".$prof->cidade."</td>";
					echo "<td>".$prof->bairro."</td>";
					echo "<td>".$prof->rua."</td>";
					echo "<td>".$prof->numero."</td>";
					echo "<td>".$prof->cep."</td>";
					echo "<td>".$prof->estado."</td>";
					echo "</tr>";	
					?>
				</tbody>
			</table>

			<h4 class="text-left">Contatos</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Telefone</th>
						<th>Celular</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					echo "<tr>";
					echo "<td>".$prof->telefone."</td>";
					echo "<td>".$prof->celular."</td>";
					echo "<td>".$prof->email."</td>";
					echo "</tr>";	
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>