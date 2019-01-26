<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Horário</title>
	<meta charset="utf-8">
	<!-- <script type="text/javascript" src="<?php echo base_url('assets/msg.js');?>"></script> -->
	<script type="text/javascript" src="<?php echo base_url('assets/pdf/jspdf.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/pdf/pdfFromHTML.js');?>"></script>

	<style type="text/css">

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

	.upperCase{

		text-transform: uppercase;

	}
</style>
</head>
<body>
	<div class="container">
		<div class="well well-lg">
			<hr / id="printPageButton">

			<?php if(!empty($horarios)){

				foreach($horarios as $nomeTurma){

					echo '<h4 class ="upperCase">'.$nomeTurma->nomeTurma.'</h4>'; 

				}

			} 
			?>

			<div align="right">
				<button class="btn btn-danger" onclick="printHorario()" id="printPageButton"><span class="glyphicon glyphicon-print"></span></button>
			</div>

			<br />

			<div id="pdf" align="center" class="container-fluid">
				<img style="width: 450px;" src="<?php echo base_url('assets/img/logo.png');?>">
				<br />
				<h2 align="center">Horário de aulas</h2>
				<br />
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
						if(!empty($horarios)){
							foreach ($horarios as $HORARIOS)
							{        
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

						} else {


							echo "

							<div align = 'center'><h3>Esta turma ainda não teve um horário cadastrado</h3></div>


							";
						}
						?>
					</tbody>	
				</table>
			</div>	
		</div>
	</div>
</body>
</html>