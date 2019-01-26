<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alterar nota</title>
</head>
<body>
	<div class="container">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Disciplina</th>
					<th>Bimestre</th>
					<th>Avaliação</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php echo $nota->disciplina; ?></td>
					<td><?php echo $nota->bimestre; ?></td>
					<td><?php echo $nota->avaliacao; ?></td>
				</tr>
			</tbody>
		</table>
		<form action="<?php echo base_url();?>professor/atualizarNota" method="post">
			<div class="input-group">
				<span class='input-group-addon'><i class='glyphicon glyphicon-list-alt'></i></span>
				<input type="text" name="nota" value="<?php echo $nota->nota; ?>" class="form-control" required="">
				<input type="hidden" name="ID" value="<?php echo $nota->ID; ?>">
			</div>

			<br />

			<div class="text-right">
				<button type="submit" class="btn btn-success">Alterar nota</button>
			</div>
		</form>
	</div>
</body>
</html>