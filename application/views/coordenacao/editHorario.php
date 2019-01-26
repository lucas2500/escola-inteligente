<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Redefinir senha</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="<?php echo base_url('assets/montarHorario.js');?>"></script>
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

	#turno, #nivel{

		background: #ffffff; 
		pointer-events: none;
		touch-action: none;
	}
</style>
</head>
<body>
	<div class="well well-lg">
		<form action="<?php echo base_url();?>cadastro_turmas/salvarHorario" method="post">
			<div class="form-inline" align="center">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
					<input type="text" class="form-control" readonly name="codigoTurma" placeholder="CÓDIGO DA TURMA" value="<?php echo $horarios->codigoTurma ?>">
				</div>

				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
					<select class="form-control" name="turno" id="turno">
						<option value="">Turno</option>
						<option value="MANHÃ"<?php echo ($horarios->turno == "MANHÃ" ? 'selected = "selected" ': '')?> >Manhã</option>
						<option value="TARDE"<?php echo ($horarios->turno == "TARDE" ? 'selected = "selected" ': '')?> >Tarde</option>
					</select>
				</div>

				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
					<select class="form-control" name="nivel" id="nivel">
						<option value="">Nível</option>
						<option value="FUNDAMENTAL" <?php echo ($horarios->nivel == "FUNDAMENTAL" ? 'selected = "selected" ': '')?> >Fundamental</option>
						<option value="MÉDIO"<?php echo ($horarios->nivel == "MÉDIO" ? 'selected = "selected" ': '')?> >Médio</option>
					</select>
				</div>
			</div>

			<br />

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
							<th><input type="text" value="<?php echo $horarios->A1segunda ?>" name="A1segunda" placeholder="1ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A1terca ?>" name="A1terca" placeholder="1ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A1quarta ?>" name="A1quarta" placeholder="1ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A1quinta ?>" name="A1quinta" placeholder="1ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A1sexta ?>" name="A1sexta" placeholder="1ª AULA" class="Nome" required=></th>
						</tr>
						<tr>
							<th><input type="text" value="<?php echo $horarios->A2segunda ?>" name="A2segunda" placeholder="2ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A2terca ?>" name="A2terca" placeholder="2ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A2quarta ?>" name="A2quarta" placeholder="2ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A2quinta ?>" name="A2quinta" placeholder="2ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A2sexta ?>" name="A2sexta" placeholder="2ª AULA" class="Nome" required></th>
						</tr>
						<tr>
							<th><input type="text" value="<?php echo $horarios->A3segunda ?>" name="A3segunda" placeholder="3ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A3terca ?>" name="A3terca" placeholder="3ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A3quarta ?>" name="A3quarta" placeholder="3ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A3quinta ?>" name="A3quinta" placeholder="3ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A3sexta ?>" name="A3sexta" placeholder="3ª AULA" class="Nome" required></th>
						</tr>
						<tr>
							<th><input type="text" value="<?php echo $horarios->A4segunda ?>" name="A4segunda" placeholder="4ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A4terca ?>" name="A4terca" placeholder="4ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A4quarta ?>" name="A4quarta" placeholder="4ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A4quinta ?>" name="A4quinta" placeholder="4ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A4sexta ?>" name="A4sexta" placeholder="4ª AULA" class="Nome" required></th>
						</tr>
						<tr>
							<th><input type="text" value="<?php echo $horarios->A5segunda ?>" name="A5segunda" placeholder="5ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A5terca ?>" name="A5terca" placeholder="5ª Aula" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A5quarta ?>" name="A5quarta" placeholder="5ª Aula" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A5quinta ?>" name="A5quinta" placeholder="5ª Aula" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A5sexta ?>" name="A5sexta" placeholder="5ª Aula" class="Nome" required></th>
						</tr>
						<tr>
							<th><input type="text" value="<?php echo $horarios->A6segunda ?>" name="A6segunda" placeholder="6ª AULA" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A6terca ?>" name="A6terca" placeholder="6ª Aula" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A6quarta ?>" name="A6quarta" placeholder="6ª Aula" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A6quinta ?>" name="A6quinta" placeholder="6ª Aula" class="Nome" required></th>
							<th><input type="text" value="<?php echo $horarios->A6sexta ?>" name="A6sexta" placeholder="6ª Aula" class="Nome" required></th>
						</tr>
					</tbody>
				</table>
			</div>
			<input type="hidden" name="ID" value="<?php echo $horarios->codigoTurma ?>">
			<br />
			<div align="center">
				<button type="submit" class="button2">Atualizar horário</button>
			</div>
		</form>
	</div>

</body>
</html>