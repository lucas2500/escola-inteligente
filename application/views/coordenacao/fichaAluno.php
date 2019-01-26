<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ficha do aluno</title>
</head>
<body>
	<div class="well well-lg">
		<h3 class="text-center">Ficha do aluno(a)</h3>
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
						<th>Nome da mãe</th>
						<th>Nome do pai</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					echo "<tr>";
					echo "<td>".$alunos->nome."</td>";
					echo "<td>".$alunos->dataNasc."</td>";
					echo "<td>".$alunos->sexo."</td>";
					echo "<td>".$alunos->nomeMae."</td>";
					echo "<td>".$alunos->nomePai."</td>";
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
					echo "<td>".$alunos->cidade."</td>";
					echo "<td>".$alunos->bairro."</td>";
					echo "<td>".$alunos->rua."</td>";
					echo "<td>".$alunos->numero."</td>";
					echo "<td>".$alunos->cep."</td>";
					echo "<td>".$alunos->estado."</td>";
					echo "</tr>";	
					?>
				</tbody>
			</table>

			<h4 class="text-left">Contatos</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Telefone</th>
						<th>Celular 1</th>
						<th>Celular 2</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					echo "<tr>";
					echo "<td>".$alunos->telefone."</td>";
					echo "<td>".$alunos->celular."</td>";
					echo "<td>".$alunos->celular2."</td>";
					echo "<td>".$alunos->email."</td>";
					echo "</tr>";	
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>