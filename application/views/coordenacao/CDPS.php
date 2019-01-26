<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de professores</title>
	<!-- <script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.js');?>"></script> -->
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.mask.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/mascaras/maskCPDS.js');?>"></script>
	<meta charset="utf-8">
</head>
<body>

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Cadastrar professor(a)</h4></div>

			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#infosPessoais">Dados pessoais</a></li>
					<li><a data-toggle="tab" href="#documentoEndereco">Documentos / Endereço</a></li>
					<li><a data-toggle="tab" href="#ensino">Ensino / Segurança</a></li>
				</ul>

				<br />

				<form name="myForm" action="<?php echo base_url();?>cadastro/salvarProfessor" method="post" enctype="multipart/form-data">

					<div class="tab-content">

						<div class="tab-pane fade in active" id="infosPessoais">

							<div class="text-left">
								<!-- EXIBE A MSG DE SUCESSO -->
								<?php echo $msg; ?>
								<img src="<?php echo base_url('assets/img/alunoPic.png');?>" class="img-thumbnail" alt="fotoAluno" width="150" height="150">
								<input type="file" name="fotoProfessor" id="fotoProfessor" accept=".png, .jpg">
								<small>Foto do professor (OPCIONAL) | </small>
								<small>Formatos suportados: png, jpg | </small>
								<small>Tamanho máximo: 5mb</small>
							</div>
							<br />


							<div class="row">

								<div class="col-md-6">
									<input type="text" placeholder="NOME DO PROFESSOR" class="form-control" name="nome" required>
								</div>

								<div class="col-md-6">
									<input type="text" placeholder="FORMAÇÃO" class="form-control" name="formacao" required>
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
									<select required class="form-control" name="sexo">
										<option value="">SEXO</option>
										<option value="FEMININO">Feminino</option>
										<option value="MASCULINO">Masculino</option>
									</select>
								</div>
								
								<div class="col-md-6">
									<select required class="form-control" name="estadoCivil">
										<option value="">ESTADO CIVIL</option>
										<option value="SOLTEIRO(A)">Solteiro(a)</option>
										<option value="CASADO(A)">Casado(a)</option>
										<option value="DIVORCIADO(A)">Divorciado(a)</option>
										<option value="SEPARADO(A)">Separado(a)</option>
										<option value="VIUVO(A)">Viúvo(a)</option>
									</select>
								</div>
								
							</div>

							<hr />

							<div class="row">

								<div class="col-md-3">
									<input type="text" placeholder="DATA DE NASCIMENTO" class="form-control" name="dataNasc" id="dtnasc" required>
								</div>


								<div class="col-md-3">
									<input type="text" placeholder="EMAIL" class="form-control" name="email"  required>
								</div>

								<div class="col-md-3">
									<input type="text" class="form-control" id="TELEFONE" placeholder="(DD) (OPCIONAL)" name="telefone"> 
								</div>

								<div class="col-md-3">
									<input type="text" class="form-control" id="CELULAR" placeholder="(DD) + 9 (OBRIGATÓRIO)" name="celular" required>
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
									<input type="text" placeholder="RUA" name="rua" class="form-control" required="">
								</div>

								<div class="col-md-4">  
									<input type="text" id="bairro" class="form-control" placeholder="BAIRRO" name="bairro" required>
								</div>
								
								<div class="col-md-4"> 
									<input type="text" id="cidade" class="form-control" placeholder="CIDADE" name="cidade" required>
								</div>

							</div>

							<hr />

							<div class="row">

								<div class="col-md-4">
									<input type="text" id="CEP" class="form-control" placeholder="CEP" name="cep" required>
								</div>

								<div class="col-md-4">
									<input type="text" id="num" class="form-control" placeholder="NÚMERO" name="numero" required>
								</div>

								<div class="col-md-4"> 
									<input type="text" id="estado" class="form-control" placeholder="ESTADO" name="estado" required>
								</div>

							</div>

						</div>


						<div class="tab-pane fade" id="ensino">

							<h4>Disciplinas</h4>

							<div class="row">

								<div class="col-md-4">
									<select required class="form-control" name="materia1">
										<option value="">Disciplina 1</option>
										<optgroup label="Todas as disciplinas">
											<option value="ARTES">Artes</option>
											<option value="CIÊNCIAS">Ciências</option>
											<option value="EDUCAÇÃO FÍSICA">Educação física</option>
											<option value="ESPANHOL">Espanhol</option>
											<option value="GEOGRAFIA">Geografia</option>
											<option value="GRAMÁTICA">Gramática</option>
											<option value="HISTÓRIA">História</option>
											<option value="INGLÊS">Inglês</option>
											<option value="LITERATURA">Literatura</option>
											<option value="MATEMÁTICA">Matemática</option>
											<option value="PORTUGUÊS">Português</option>
											<option value="REDAÇÃO">Redação</option>
										</optgroup>
										<optgroup label="Disciplinas apenas do nível Médio">
											<option value="BIOLOGIA">Biologia</option>
											<option value="FILOSOFIA">Filosofia</option>
											<option value="FÍSICA">Física</option>
											<option value="QUÍMICA">Química</option>
											<option value="SOCIOLOGIA">Sociologia</option>
										</optgroup>
									</select>
								</div>

								<div class="col-md-4">
									<select class="form-control" name="materia2">
										<option value="">Disciplina 2</option>
										<optgroup label="Todas as disciplinas">
											<option value="ARTES">Artes</option>
											<option value="CIÊNCIAS">Ciências</option>
											<option value="EDUCAÇÃO FÍSICA">Educação física</option>
											<option value="ESPANHOL">Espanhol</option>
											<option value="GEOGRAFIA">Geografia</option>
											<option value="GRAMÁTICA">Gramática</option>
											<option value="HISTÓRIA">História</option>
											<option value="INGLÊS">Inglês</option>
											<option value="LITERATURA">Literatura</option>
											<option value="MATEMÁTICA">Matemática</option>
											<option value="PORTUGUÊS">Português</option>
											<option value="REDAÇÃO">Redação</option>
										</optgroup>
										<optgroup label="Disciplinas apenas do nível médio">
											<option value="BIOLOGIA">Biologia</option>
											<option value="FILOSOFIA">Filosofia</option>
											<option value="FÍSICA">Física</option>
											<option value="QUÍMICA">Química</option>
											<option value="SOCIOLOGIA">Sociologia</option>
										</optgroup>
									</select>
								</div>

								<div class="col-md-4">
									<select class="form-control" name="materia3">
										<option value="">Disciplina 3</option>
										<optgroup label="Todas as disciplinas">
											<option value="ARTES">Artes</option>
											<option value="CIÊNCIAS">Ciências</option>
											<option value="EDUCAÇÃO FÍSICA">Educação física</option>
											<option value="ESPANHOL">Espanhol</option>
											<option value="GEOGRAFIA">Geografia</option>
											<option value="GRAMÁTICA">Gramática</option>
											<option value="HISTÓRIA">História</option>
											<option value="INGLÊS">Inglês</option>
											<option value="LITERATURA">Literatura</option>
											<option value="MATEMÁTICA">Matemática</option>
											<option value="PORTUGUÊS">Português</option>
											<option value="REDAÇÃO">Redação</option>
										</optgroup>
										<optgroup label="Disciplinas apenas do nível médio">
											<option value="BIOLOGIA">Biologia</option>
											<option value="FILOSOFIA">Filosofia</option>
											<option value="FÍSICA">Física</option>
											<option value="QUÍMICA">Química</option>
											<option value="SOCIOLOGIA">Sociologia</option>
										</optgroup>
									</select>
								</div>

							</div>

							<hr />

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
								<input type="text" placeholder="MATRÍCULA" class="form-control" required name="MATRICULA" id="mat" readonly>
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

				alert('Pressione o botão "Gerar matrícula"');
				return false;
			}
		}

		var uploadField = document.getElementById("fotoProfessor");

		uploadField.onchange = function() {
			if(this.files[0].size > 5000000){
				alert("A foto selecionada é muito grande!");
				this.value = "";
			};
		};
	</script>
</body>
</html>