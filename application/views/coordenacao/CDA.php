<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de alunos</title>
	<!-- <script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.js');?>"></script> -->
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/mascaras/maskCDA.js');?>"></script>
	<meta charset="utf-8">
</head>
<body>
	
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Cadastrar aluno(a)</h4></div>

			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#infosPessoais">Dados pessoais e acadêmicos</a></li>
					<li><a data-toggle="tab" href="#documentoEndereco">Documentos / Endereço</a></li>
					<li><a data-toggle="tab" href="#OBSseguranca">Observações / Segurança</a></li>
				</ul>

				<br />

				<form name="myForm" action="<?php echo base_url();?>cadastro/salvarAluno" method="post" enctype="multipart/form-data">

					<div class="tab-content">

						<div class="tab-pane fade in active" id="infosPessoais">

							<div class="text-left">
								<!-- EXIBE A MSG DE SUCESSO -->
								<?php echo $msg; ?>
								<img src="<?php echo base_url('assets/img/alunoPic.png');?>" class="img-thumbnail" alt="fotoAluno" width="150" height="150">
								<input type="file" name="fotoAluno" id="fotoAluno"  accept=".png, .jpg">
								<small>Foto do aluno (OPCIONAL) | </small>
								<small>Formatos suportados: png, jpg | </small>
								<small>Tamanho máximo: 5mb</small>
							</div>
							<br />


							<div class="row">

								<div class="col-md-6">
									<input type="text" placeholder="NOME DO ALUNO(A)" class="form-control" name="nome" required>
								</div>

								<div class="col-md-6">
									<input type="text" placeholder="DATA DE NASCIMENTO" class="form-control" name="dataNasc" id="dtnasc" required>
								</div>

							</div>

							<hr />

							<div class="row">

								<div class="col-md-6">
									<input type="text" placeholder="NATURALIDADE" class="form-control" name="naturalidade" required>
								</div>


								<div class="col-md-6">
									<input type="text" placeholder="NACIONALIDADE" class="form-control" name="nacionalidade" required>
								</div>

							</div>

							<hr />

							<div class="row">

								<div class="col-md-6">
									<input type="text" placeholder="NOME DA MÃE" class="form-control" name="nomeMae" required>
								</div>

								<div class="col-md-6">
									<input type="text" placeholder="NOME DO PAI" class="form-control" name="nomePai" required>
								</div>
							</div>

							<hr />

							<div class="row">

								<div class="col-md-4">
									<select required class="form-control" name="sexo">
										<option value="">SEXO</option>
										<option value="FEMININO">Feminino</option>
										<option value="MASCULINO">Masculino</option>
									</select>
								</div>
								
								<div class="col-md-4">
									<select required class="form-control" name="nivel">
										<option value="">NÍVEL</option>
										<option value="FUNDAMENTAL">Fundamental</option>
										<option value="MÉDIO">Médio</option>
									</select>
								</div>

								<div class="col-md-4">
									<select required class="form-control" name="turno">
										<option value="">TURNO</option>
										<option value="MANHÃ">Manhã</option>
										<option value="TARDE">Tarde</option>
									</select>
								</div>
								
							</div>

							<hr />

							<div class="row">

								<div class="col-md-3">
									<input type="text" class="form-control" id="TELEFONE" placeholder="FIXO (DD) OPCIONAL" name="telefone">
								</div>


								<div class="col-md-3">
									<input type="text" class="form-control" id="CELULAR" placeholder="CEL 1 (DD) + 9 (OBRIGATÓRIO)" required name="celular">
								</div>

								<div class="col-md-3">
									<input type="text" class="form-control" id="CELULAR2" placeholder="CEL 2 (DD) + 9 OPCIONAL" name="celular2">
								</div>

								<div class="col-md-3">
									<input type="text" placeholder="EMAIL (OPCIONAL)" class="form-control" name="email">
								</div>
							</div>

						</div>

						<div class="tab-pane fade" id="documentoEndereco">

							<h4>Documentos</h4>

							<div class="row">
								
								<div class="col-md-6">
									<input type="text" class="form-control" id="RG" placeholder="RG" name="rg">
								</div>

								<div class="col-md-6"> 
									<input type="text" class="form-control" id="OGPD" placeholder="ÓRGÃO EXPEDIDOR" name="orgExped">
								</div>

							</div>

							<hr />

							<div class="row">
								
								<div class="col-md-6">
									<input type="text" class="form-control" id="DTE" placeholder="DATA DE EXPEDIÇÃO" name="dataExped">
								</div>

								<div class="col-md-6">
									<input type="text" class="form-control" id="CPF" placeholder="CPF" name="cpf">
								</div>

							</div>

							<hr />

							<h4>Endereço</h4>

							<div class="row">


								<div class="col-md-4">
									<input type="text" placeholder="RUA" class="form-control" name="rua" required="">
								</div>

								<div class="col-md-4">  
									<input type="text" id="bairro" class="form-control" placeholder="BAIRRO" name="bairro" required="">
								</div>
								
								<div class="col-md-4"> 
									<input type="text" id="cidade" class="form-control" placeholder="CIDADE" name="cidade" required="">
								</div>

							</div>

							<hr />

							<div class="row">

								<div class="col-md-4">
									<input type="text" id="CEP" class="form-control" placeholder="CEP" name="cep" required="">
								</div>

								<div class="col-md-4">
									<input type="text" id="num" class="form-control" placeholder="NÚMERO" name="numero" required="">
								</div>

								<div class="col-md-4"> 
									<input type="text" id="estado" class="form-control" placeholder="ESTADO" name="estado" required="">
								</div>

							</div>

						</div>


						<div class="tab-pane fade" id="OBSseguranca">

							<h4>Observações</h4>

							<div class="row">

								<div class="col-md-12">
									<textarea class="form-control" rows="5" id="comment"  placeholder="CAMPO OPCIONAL" name="observacoes"></textarea>
								</div>

							</div>

							<hr />

							<h4>Segurança</h4>

							<div align="right">
								<button type="button" class="btn btn-primary" onclick="gerarMatricula()">Gerar matrícula</button>
							</div>

							<br />

							<div class="col-md-12">
								<input type="text" placeholder="MATRÍCULA" class="form-control" name="Matricula" id="mat" readonly>
							</div>

							<input type="hidden" placeholder="Senha do professor" class="field" value="123456" required name="senha" readonly="">

							<div class="row text-center">

								<button type="submit" onclick="return validateForm()" class="button2">Cadastrar</button>

							</div>

						</div>

					</div>

				</div>

			</form>

		</div>

	</div>


	<script type="text/javascript">

		function gerarMatricula() {
			var x = Math.floor((Math.random() * 1000000) + 1);
			document.getElementById("mat").value = x;

		}

		function validateForm() {

			var matricula = $('#mat').val();

			if(matricula == ""){

				alert('pressione o botão "Gerar matrícula"');
				return false;
			}

		}

		var uploadField = document.getElementById("fotoAluno");

		uploadField.onchange = function() {
			if(this.files[0].size > 5000000){
				alert("A foto selecionada é muito grande!");
				this.value = "";
			};
		};
	</script>
</body>
</html>