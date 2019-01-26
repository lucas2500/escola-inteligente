<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Avisos</title>
	<meta charset="utf-8">
</head>
<body>
	<div class="container">
		<div class="well well-lg">
			<div class="container">
				<div class="row">
					<div align="left">	
					</div>
				</div>
			</div>
			<br/> 
			<div class="" align="center">        
				<h3>Quadro de avisos</h3>
				<hr />

				<table class="table table-bordered">

					<thead>
						<tr>
							<th><span class="glyphicon glyphicon-user" style="color: #87CEEB;"></th>
							<th><span class="glyphicon glyphicon-pushpin"></th>
							<th><span class="glyphicon glyphicon-time" style="color: red;"></th>
						</tr>
					</thead>
					<?php 

					foreach($avisos as $AVISOS){

						if($AVISOS->dest == "professor"){

							echo "<tr>";
							echo "<td style='text-transform: uppercase;'>".$AVISOS->usuario."</td>";
							echo "<td>".$AVISOS->aviso."</td>";
							echo "<td>".$AVISOS->dataEnvio."</td>";
							echo "</tr>";

						}
					}
					?>
				</table>
				<hr />
			</div>
		</div>
	</div>
</body>
</html>