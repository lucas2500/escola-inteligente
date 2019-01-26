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
			<div class="panel-heading"><h4>Atualizar cadastro do professor(a)</h4></div>

			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#infosPessoais">Dados pessoais</a></li>
					<li><a data-toggle="tab" href="#documentoEndereco">Documentos / Endereço</a></li>
					<li><a data-toggle="tab" href="#ensino">Ensino / Segurança</a></li>
				</ul>

				<br />

				<form name="myForm" action="<?php echo base_url();?>cadastro/salvarProfessor" method="post">

					<div class="tab-content">

						<div class="tab-pane fade in active" id="infosPessoais">

							<div class="text-right">
								<img src="<?php echo base_url($img);?>" class="img-thumbnail" alt="fotoAluno" width="150" height="150">
							</div>

							<br />

							<div class="row">

								<div class="col-md-6">
									<input type="text" placeholder="NOME DO PROFESSOR" class="form-control" name="nome"  value="<?php echo $professores->nome ?>" required>
								</div>

								<div class="col-md-6">
									<input type="text" placeholder="FORMAÇÃO" class="form-control" name="formacao" value="<?php echo $professores->formacao ?>" required>
								</div>

							</div>

							<hr />

							<div class="row">

								<div class="col-md-6">
									<input type="text" placeholder="NATURALIDADE" class="form-control" name="naturalidade" value="<?php echo $professores->naturalidade ?>" required>
								</div>


								<div class="col-md-6">
									<input type="text" placeholder="NACIONALIDADE" class="form-control" name="nacionalidade" value="<?php echo $professores->nacionalidade ?>" required>
								</div>

							</div>

							<hr />

							<div class="row">

								<div class="col-md-6">
									<select required class="form-control" name="sexo">
										<option value="">Selecionar</option>
										<option value="MASCULINO"<?php echo ($professores->sexo == "MASCULINO" ? 'selected = "selected" ': '')?> >Masculino</option>
										<option value="FEMININO"<?php echo ($professores->sexo == "FEMININO" ? 'selected = "selected" ': '')?> >Feminino</option>
									</select>
								</div>
								
								<div class="col-md-6">
									<select required class="form-control" name="estadoCivil">
										<option value="">Selecionar</option>
										<option value="SOLTEIRO(A)"<?php echo ($professores->estadoCivil == "SOLTEIRO(A)" ? 'selected = "selected" ': '')?> >Solteiro(a)</option>
										<option value="CASADO(A)"<?php echo ($professores->estadoCivil == "CASADO(A)" ? 'selected = "selected" ': '')?> >Casado(a)</option>
										<option value="DIVORCIADO(A)" <?php echo ($professores->estadoCivil == "DIVORCIADO(A)" ? 'selected = "selected" ': '')?> >Divorciado(a)</option>
										<option value="SEPARADO(A)"<?php echo ($professores->estadoCivil == "SEPARADO(A)" ? 'selected = "selected" ': '')?> >Separado(a)</option>
										<option value="VIUVO(A)"<?php echo ($professores->estadoCivil == "VIUVO(A)" ? 'selected = "selected" ': '')?> >Viúvo(a)</option>
									</select>
								</div>
								
							</div>

							<hr />

							<div class="row">

								<div class="col-md-3">
									<input type="text" placeholder="DATA DE NASCIMENTO" class="form-control" name="dataNasc" id="dtnasc" value="<?php echo $professores->dataNasc ?>" required>
								</div>


								<div class="col-md-3">
									<input type="text" placeholder="EMAIL" class="form-control" name="email" value="<?php echo $professores->email ?>"required>
								</div>

								<div class="col-md-3">
									<input type="text" class="form-control" id="TELEFONE" placeholder="(DD) (OPCIONAL)" value="<?php echo $professores->telefone ?>" name="telefone"> 
								</div>

								<div class="col-md-3">
									<input type="text" class="form-control" id="CELULAR" placeholder="(DD) + 9 (OBRIGATÓRIO)" name="celular" value="<?php echo $professores->celular ?>" required>
								</div>
							</div>

						</div>

						<div class="tab-pane fade" id="documentoEndereco">

							<h4>Documentos</h4>

							<div class="row">
								
								<div class="col-md-6">
									<input type="text" class="form-control" id="RG" placeholder="RG" name="rg"  value="<?php echo $professores->rg ?>"required="">
								</div>

								<div class="col-md-6"> 
									<input type="text" class="form-control" id="OGPD" placeholder="ÓRGÃO EXPEDIDOR" name="orgExped" value="<?php echo $professores->orgExped ?>" required="">
								</div>

							</div>

							<hr />

							<div class="row">
								
								<div class="col-md-6">
									<input type="text" class="form-control" id="DTE" placeholder="DATA DE EXPEDIÇÃO" name="dataExped" value="<?php echo $professores->dataExped ?>" required="">
								</div>

								<div class="col-md-6">
									<input type="text" class="form-control" id="CPF" placeholder="CPF" name="cpf" value="<?php echo $professores->cpf ?>" required="">
								</div>

							</div>

							<hr />

							<h4>Endereço</h4>

							<div class="row">


								<div class="col-md-4">
									<input type="text" placeholder="RUA" name="rua" class="form-control" value="<?php echo $professores->rua ?>" required="">
								</div>

								<div class="col-md-4">  
									<input type="text" id="bairro" class="form-control" placeholder="BAIRRO" name="bairro" value="<?php echo $professores->bairro ?>" required="">
								</div>
								
								<div class="col-md-4"> 
									<input type="text" id="cidade" class="form-control" placeholder="CIDADE" name="cidade" value="<?php echo $professores->cidade ?>" required="">
								</div>

							</div>

							<hr />

							<div class="row">

								<div class="col-md-4">
									<input type="text" id="CEP" class="form-control" placeholder="CEP" name="cep" value="<?php echo $professores->cep ?>"  required="">
								</div>

								<div class="col-md-4">
									<input type="text" id="num" class="form-control" placeholder="NÚMERO" name="numero" value="<?php echo $professores->numero ?>" required="">
								</div>

								<div class="col-md-4"> 
									<input type="text" id="estado" class="form-control" placeholder="ESTADO" name="estado" value="<?php echo $professores->estado ?>" required="">
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
											<option value="ARTES"<?php echo ($professores->materia1 == "ARTES" ? 'selected = "selected" ': '')?>>Artes</option>
											<option value="CIÊNCIAS"<?php echo ($professores->materia1 == "CIÊNCIAS" ? 'selected = "selected" ': '')?>>Ciências</option>
											<option value="EDUCAÇÃO FÍSICA"<?php echo ($professores->materia1 == "EDUCAÇÃO FÍSICA" ? 'selected = "selected" ': '')?>>Educação física</option>
											<option value="ESPANHOL"<?php echo ($professores->materia1 == "ESPANHOL" ? 'selected = "selected" ': '')?>>Espanhol</option>
											<option value="GEOGRAFIA"<?php echo ($professores->materia1 == "GEOGRAFIA" ? 'selected = "selected" ': '')?>>Geografia</option>
											<option value="GRAMÁTICA"<?php echo ($professores->materia1 == "GRAMÁTICA" ? 'selected = "selected" ': '')?>>Gramática</option>
											<option value="HISTÓRIA"<?php echo ($professores->materia1 == "HISTÓRIA" ? 'selected = "selected" ': '')?>>História</option>
											<option value="INGLÊS"<?php echo ($professores->materia1 == "INGLÊS" ? 'selected = "selected" ': '')?>>Inglês</option>
											<option value="LITERATURA"<?php echo ($professores->materia1 == "LITERATURA" ? 'selected = "selected" ': '')?>>Literatura</option>
											<option value="MATEMÁTICA"<?php echo ($professores->materia1 == "MATEMÁTICA" ? 'selected = "selected" ': '')?>>Matemática</option>
											<option value="PORTUGUÊS"<?php echo ($professores->materia1 == "PORTUGUÊS" ? 'selected = "selected" ': '')?>>Português</option>
											<option value="REDAÇÃO"<?php echo ($professores->materia1 == "REDAÇÃO" ? 'selected = "selected" ': '')?>>Redação</option>
										</optgroup>
										<optgroup label="Disciplinas apenas do nível Médio">
											<option value="BIOLOGIA"<?php echo ($professores->materia1 == "BIOLOGIA" ? 'selected = "selected" ': '')?>>Biologia</option>
											<option value="FILOSOFIA"<?php echo ($professores->materia1 == "FILOSOFIA" ? 'selected = "selected" ': '')?>>Filosofia</option>
											<option value="FÍSICA"<?php echo ($professores->materia1 == "FÍSICA" ? 'selected = "selected" ': '')?>>Física</option>
											<option value="QUÍMICA"<?php echo ($professores->materia1 == "QUÍMICA" ? 'selected = "selected" ': '')?>>Química</option>
											<option value="SOCIOLOGIA"<?php echo ($professores->materia1 == "SOCIOLOGIA" ? 'selected = "selected" ': '')?>>Sociologia</option>
										</optgroup>
									</select>
								</div>

								<div class="col-md-4">
									<select class="form-control" name="materia2">
										<option value="">Disciplina 2</option>
										<optgroup label="Todas as disciplinas">
											<option value="ARTES"<?php echo ($professores->materia2 == "ARTES" ? 'selected = "selected" ': '')?>>Artes</option>
											<option value="CIÊNCIAS"<?php echo ($professores->materia2 == "CIÊNCIAS" ? 'selected = "selected" ': '')?>>Ciências</option>
											<option value="EDUCAÇÃO FÍSICA"<?php echo ($professores->materia2 == "EDUCAÇÃO FÍSICA" ? 'selected = "selected" ': '')?>>Educação física</option>
											<option value="ESPANHOL"<?php echo ($professores->materia2 == "ESPANHOL" ? 'selected = "selected" ': '')?>>Epanhol</option>
											<option value="GEOGRAFIA"<?php echo ($professores->materia2 == "GEOGRAFIA" ? 'selected = "selected" ': '')?>>Geografia</option>
											<option value="GRAMÁTICA"<?php echo ($professores->materia2 == "GRAMÁTICA" ? 'selected = "selected" ': '')?>>Gramática</option>
											<option value="HISTÓRIA"<?php echo ($professores->materia2 == "HISTÓRIA" ? 'selected = "selected" ': '')?>>História</option>
											<option value="INGLÊS"<?php echo ($professores->materia2 == "INGLÊS" ? 'selected = "selected" ': '')?>>Inglês</option>
											<option value="LITERATURA"<?php echo ($professores->materia2 == "LITERATURA" ? 'selected = "selected" ': '')?>>Literatura</option>
											<option value="MATEMÁTICA"<?php echo ($professores->materia2 == "MATEMÁTICA" ? 'selected = "selected" ': '')?>>Matemática</option>
											<option value="PORTUGUÊS"<?php echo ($professores->materia2 == "PORTUGUÊS" ? 'selected = "selected" ': '')?>>Português</option>
											<option value="REDAÇÃO"<?php echo ($professores->materia2 == "REDAÇÃO" ? 'selected = "selected" ': '')?>>Redação</option>
										</optgroup>
										<optgroup label="Disciplinas apenas do nível médio">
											<option value="BIOLOGIA"<?php echo ($professores->materia2 == "BIOLOGIA" ? 'selected = "selected" ': '')?>>Biologia</option>
											<option value="FILOSOFIA"<?php echo ($professores->materia2 == "FILOSOFIA" ? 'selected = "selected" ': '')?>>Filosofia</option>
											<option value="FÍSICA"<?php echo ($professores->materia2 == "FÍSICA" ? 'selected = "selected" ': '')?>>Física</option>
											<option value="QUÍMICA"<?php echo ($professores->materia2 == "QUÍMICA" ? 'selected = "selected" ': '')?>>Química</option>
											<option value="SOCIOLOGIA"<?php echo ($professores->materia2 == "SOCIOLOGIA" ? 'selected = "selected" ': '')?>>Sociologia</option>
										</optgroup>
									</select>
								</div>

								<div class="col-md-4">
									<select class="form-control" name="materia3">
										<option value="">Disciplina 3</option>
										<optgroup label="Todas as disciplinas">
											<option value="ARTES"<?php echo ($professores->materia3 == "ARTES" ? 'selected = "selected" ': '')?>>Artes</option>
											<option value="CIÊNCIAS"<?php echo ($professores->materia3 == "CIÊNCIAS" ? 'selected = "selected" ': '')?>>Ciências</option>
											<option value="EDUCAÇÃO FÍSICA"<?php echo ($professores->materia3 == "EDUCAÇÃO FÍSICA" ? 'selected = "selected" ': '')?>>Educação física</option>
											<option value="ESPANHOL"<?php echo ($professores->materia3 == "ESPANHOL" ? 'selected = "selected" ': '')?>>Espanhol</option>
											<option value="GEOGRAFIA"<?php echo ($professores->materia3 == "GEOGRAFIA" ? 'selected = "selected" ': '')?>>Geografia</option>
											<option value="GRAMÁTICA"<?php echo ($professores->materia3 == "GRAMÁTICA" ? 'selected = "selected" ': '')?>>Gramática</option>
											<option value="HISTÓRIA"<?php echo ($professores->materia3 == "HISTÓRIA" ? 'selected = "selected" ': '')?>>História</option>
											<option value="INGLÊS"<?php echo ($professores->materia3 == "INGLÊS" ? 'selected = "selected" ': '')?>>Inglês</option>
											<option value="LITERATURA"<?php echo ($professores->materia3 == "LITERATURA" ? 'selected = "selected" ': '')?>>Literatura</option>
											<option value="MATEMÁTICA"<?php echo ($professores->materia3 == "MATEMÁTICA" ? 'selected = "selected" ': '')?>>Matemática</option>
											<option value="PORTUGUÊS"<?php echo ($professores->materia3 == "PORTUGUÊS" ? 'selected = "selected" ': '')?>>Português</option>
											<option value="REDAÇÃO"<?php echo ($professores->materia3 == "REDAÇÃO" ? 'selected = "selected" ': '')?>>Redação</option>
										</optgroup>
										<optgroup label="Disciplinas apenas do nível médio">
											<option value="BIOLOGIA"<?php echo ($professores->materia3 == "BIOLOGIA" ? 'selected = "selected" ': '')?>>Biologia</option>
											<option value="FILOSOFIA"<?php echo ($professores->materia3 == "FILOSOFIA" ? 'selected = "selected" ': '')?>>Filosofia</option>
											<option value="FÍSICA"<?php echo ($professores->materia3 == "FÍSICA" ? 'selected = "selected" ': '')?>>Física</option>
											<option value="QUÍMICA"<?php echo ($professores->materia3 == "QUÍMICA" ? 'selected = "selected" ': '')?>>Química</option>
											<option value="SOCIOLOGIA"<?php echo ($professores->materia3 == "SOCIOLOGIA" ? 'selected = "selected" ': '')?>>Sociologia</option>
										</optgroup>
									</select>
								</div>

							</div>

							<hr />

							<h4>Observações</h4>

							<div class="row">

								<div class="col-md-12">
									<textarea class="form-control" rows="5" id="comment"  placeholder="CAMPO OPCIONAL" name="observacoes"><?php echo $professores->observacoes ?></textarea>
								</div>

							</div>

							<div>
								<input type="hidden" placeholder="MATRÍCULA" class="form-control" required name="MATRICULA" value="<?php echo $professores->MATRICULA ?>" id="mat" readonly>

								<input type="hidden" name="ID" value="<?php echo $professores->MATRICULA ?>">
							</div>

							<div class="text-center">

								<button type="submit" class="button2">Atualizar registro</button>

							</div>

						</div>

					</div>

				</div>

			</form>

		</div>

	</div>
	
</body>
</html>