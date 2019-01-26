<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Menu principal</title>
</head>
<body>
	<?php
	if(!empty($nome)){

		echo  '<div class="container-fluid" align="left">
		<h6 style="font-family: arial; font-size: 15px; color:#000000; padding: 1px; Text-transform: uppercase; ">Usuário: '.$nome->nome.' / '.$nome->matricula. '</h6>
		</div>';

	} else{

		echo "<div align = 'center'><h3>Um erro ocorreu, por favor realize o login novamente!</h3></div>";
		$this->session->unset_userdata('matricula');

	}
	?>
	<div class="well well-lg">
		<hr />
		<table class="table table-striped">
			<thead>
				<tr>
					<th><a href="<?php echo base_url();?>principal/cadastrarProfessores">Cadastrar professores</a></th>
					<th><a href="<?php echo base_url();?>principal/cadastrarAlunos">Cadastrar alunos</a></th>
					<th><a href="" data-toggle="modal" data-target="#modalTurma">Gerenciar turmas</a></th>
				</tr>
				<tr>
					<th><a href="<?php echo base_url();?>principal/avisoCoordenacao">Postar avisos</a></th>
					<th><a href="<?php echo base_url();?>principal/mensagemCoordenacao">Central de mensagens</a></th>
					<th><a href="<?php echo base_url();?>principal/turmasCoordenacao">Visualizar turmas</a></th>
				</tr>
			</thead>
		</table>
		<hr />
	</div>

	<div class="modal fade" id="modalTurma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<br />
					<div class="form-group" align="center">
						<a href="<?php echo base_url();?>principal/montarFundamental"><button type="button" class="btn btn-success" style="margin: 10px;">Fundamental</button></a>
						<a href="<?php echo base_url();?>principal/montarMedio"><button type="button" class="btn btn-danger">Médio</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>