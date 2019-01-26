<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">

	<style type="text/css">
	
	.Nome[type=text] {
		width: 60%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	.button2 {
		background-color: #4CAF50;
		color: white;
		padding: 6px 20px;
		margin: 7px 0;
		border: 2px solid;
		border-radius: 25px;
		cursor: pointer;
		width: 80%;
	}

	button:hover {
		opacity: 0.8;
	}

</style>
</head>
<body>
	<div class="well well-lg">
		<form action="<?php echo base_url();?>cadastro_turmas/salvarHorario" method="post">
			<div class="form-inline" align="center">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-blackboard"></i></span>
					<select class="form-control" name="codigoTurma" required="">
						<option value="">Selecionar turma</option>
						<optgroup label="Fundamental manhã">
							<?php 
							foreach($turmas as $TM){
								echo "<option value=".$TM->codigo.">".$TM->nome."</option>";	
							}
							?>
						</optgroup>
						<optgroup label="Fundamental tarde">
							<?php 
							foreach($turmas2 as $TM2){
								echo "<option value=".$TM2->codigo.">".$TM2->nome."</option>";	
							}
							?>
						</optgroup>
						<optgroup label="Médio manhã">
							<?php 
							foreach($turmas3 as $TM3){
								echo "<option value=".$TM3->codigo.">".$TM3->nome."</option>";
							}
							?>
						</optgroup>
						<optgroup label="Médio tarde">
							<?php
							foreach($turmas4 as $TM4){
								echo "<option value=".$TM4->codigo.">".$TM4->nome."</option>";
							} 
							?>
						</optgroup>
					</select>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
					<select class="form-control" name="turno" required="">
						<option value="">Selecionar turno</option>
						<option value="MANHÃ">Manhã</option>
						<option value="TARDE">Tarde</option>
					</select>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
					<select class="form-control" name="nivel" required="">
						<option value="">Selecionar nível</option>
						<option value="FUNDAMENTAL">Fundamental</option>
						<option value="MÉDIO">Médio</option>
					</select>
				</div>
			</div>

			<br />

			<?php echo $msg ;?>
			<div class="container-fluid">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Segunda-Feira</th>
							<th>Terça-Feira</th>
							<th>Quarta-Feira</th>
							<th>Quinta-Feira</th>
							<th>Sexta-Feira</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th><input type="text" name="A1segunda" placeholder="1ª AULA" class="Nome" required></th>
							<th><input type="text" name="A1terca" placeholder="1ª AULA" class="Nome" required></th>
							<th><input type="text" name="A1quarta" placeholder="1ª AULA" class="Nome" required></th>
							<th><input type="text" name="A1quinta" placeholder="1ª AULA" class="Nome" required></th>
							<th><input type="text" name="A1sexta" placeholder="1ª AULA" class="Nome" required=></th>
						</tr>
						<tr>
							<th><input type="text" name="A2segunda" placeholder="2ª AULA" class="Nome" required></th>
							<th><input type="text" name="A2terca" placeholder="2ª AULA" class="Nome" required></th>
							<th><input type="text" name="A2quarta" placeholder="2ª AULA" class="Nome" required></th>
							<th><input type="text" name="A2quinta" placeholder="2ª AULA" class="Nome" required></th>
							<th><input type="text" name="A2sexta" placeholder="2ª AULA" class="Nome" required></th>
						</tr>
						<tr>
							<th><input type="text" name="A3segunda" placeholder="3ª AULA" class="Nome" required></th>
							<th><input type="text" name="A3terca" placeholder="3ª AULA" class="Nome" required></th>
							<th><input type="text" name="A3quarta" placeholder="3ª AULA" class="Nome" required></th>
							<th><input type="text" name="A3quinta" placeholder="3ª AULA" class="Nome" required></th>
							<th><input type="text" name="A3sexta" placeholder="3ª Aula" class="Nome" required></th>
						</tr>
						<tr>
							<th><input type="text" name="A4segunda" placeholder="4ª AULA" class="Nome" required></th>
							<th><input type="text" name="A4terca" placeholder="4ª AULA" class="Nome" required></th>
							<th><input type="text" name="A4quarta" placeholder="4ª AULA" class="Nome" required></th>
							<th><input type="text" name="A4quinta" placeholder="4ª AULA" class="Nome" required></th>
							<th><input type="text" name="A4sexta" placeholder="4ª AULA" class="Nome" required></th>
						</tr>
						<tr>
							<th><input type="text" name="A5segunda" placeholder="5ª AULA" class="Nome" required></th>
							<th><input type="text" name="A5terca" placeholder="5ª AULA" class="Nome" required></th>
							<th><input type="text" name="A5quarta" placeholder="5ª AULA" class="Nome" required></th>
							<th><input type="text" name="A5quinta" placeholder="5ª AULA" class="Nome" required></th>
							<th><input type="text" name="A5sexta" placeholder="5ª AULA" class="Nome" required></th>
						</tr>
						<tr>
							<th><input type="text" name="A6segunda" placeholder="6ª AULA" class="Nome" required></th>
							<th><input type="text" name="A6terca" placeholder="6ª AULA" class="Nome" required></th>
							<th><input type="text" name="A6quarta" placeholder="6ª AULA" class="Nome" required></th>
							<th><input type="text" name="A6quinta" placeholder="6ª AULA" class="Nome" required></th>
							<th><input type="text" name="A6sexta" placeholder="6ª AULA" class="Nome" required></th>
						</tr>
					</tbody>	
				</table>
			</div>
			<br />
			<div align="center">
				<button type="submit" class="button2">Cadastrar</button>
			</div>
		</form>
	</div>

	<!-- FIM DO MODAL -->
</body>
</html>