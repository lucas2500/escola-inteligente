<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(!empty($usuario)){

		echo  '<div class="container-fluid" align="left">
		<h6 style="font-family: arial; font-size: 15px; color:#000000; padding: 1px; Text-transform: uppercase; ">Usuário: '.$usuario->nome.' / '.$usuario->MATRICULA. '</h6>
		</div>';

	} else{

		echo "<div align = 'center'><h3>Um erro ocorreu, por favor realize o login novamente!</h3></div>";
		$this->session->unset_userdata('MATRICULA');

	}
	?>
	<div class="well well-lg">
		<hr />
		<table class="table table-striped">
			<thead>
				<tr>
					<th><a href="<?php echo base_url();?>principal/notas">Caderneta virtual</a></th>
					<th><a href="<?php echo base_url();?>principal/Mensagens">Central de mensagens</a></th>
					<th><a href="<?php echo base_url();?>principal/Avisos">Avisos</a></th>
				</tr>
			</thead>
		</table>
	</div>
</body>
</html>