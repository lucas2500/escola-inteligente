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

<style type="text/css">

#nivel, #turno{

	background: #ffffff; 
	pointer-events: none;
	touch-action: none;
}
</style>
<body>
	<div class="well well-lg">
		<h3 class="text-center">Dados pessoais</h3>
		<div class="text-center">
			<form name="myForm" action="<?php echo base_url();?>cadastro/salvarAluno" method="post">
				<div class="container">
					<div class="text-right">
						<img src="<?php echo base_url($img);?>" class="img-thumbnail" alt="fotoAluno" width="150" height="150">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" placeholder="NOME DO ALUNO" class="form-control" name="nome" value="<?php echo $alunos->nome ?>" required>
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="text" placeholder="DATA DE NASCIMENTO" class="form-control" name=" dataNasc" value="<?php echo $alunos->dataNasc ?>" id="dtnasc" required>
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
						<input type="text" placeholder="NATURALIDADE" class="form-control" name="naturalidade" value="<?php echo $alunos->naturalidade ?>" required>
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
						<input type="text" placeholder="NACIONALIDADE" class="form-control" name="nacionalidade" value="<?php echo $alunos->nacionalidade ?>" required>
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" placeholder="NOME DA MÃE" class="form-control" name="nomeMae" value="<?php echo $alunos->nomeMae ?>" required>
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" placeholder="NOME DO PAI" class="form-control" name="nomePai" value="<?php echo $alunos->nomePai ?>" required>
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<input type="text" placeholder="EMAIL (OPCIONAL)" class="form-control" name="email" value="<?php echo $alunos->email ?>">
					</div>
					<br />
					<div class="form-inline" align="left">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
							<input type="text" class="form-control" id="TELEFONE" placeholder="(DD) (OPCIONAL)" name="telefone"  value="<?php echo $alunos->telefone ?>">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span> 
							<input type="text" class="form-control" id="CELULAR" placeholder="(DD) + 9 (OBRIGATÓRIO)" required name="celular" value="<?php echo $alunos->celular ?>">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
							<input type="text" class="form-control" id="CELULAR2" placeholder="(DD) + 9 (OPCIONAL)" name="celular2" value="<?php echo $alunos->celular2 ?>">
						</div>
					</div>

					<hr/>

					<h4>Sexo</h4>
					<div class="form-inline">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
							<select required class="form-control" name="sexo">
								<option value="">Selecionar</option>
								<option value="MASCULINO"<?php echo ($alunos->sexo == "MASCULINO" ? 'selected = "selected" ': '')?> >Masculino</option>
								<option value="FEMININO"<?php echo ($alunos->sexo == "FEMININO" ? 'selected = "selected" ': '')?> >Feminino</option>
							</select>
						</div>
					</div>

					<hr />

					<h4>Nível</h4>
					<div class="form-inline">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-blackboard"></i></span>
							<select required class="form-control" name="nivel" id="nivel">
								<option value="">Selecionar</option>
								<option value="FUNDAMENTAL"<?php echo ($alunos->nivel == "FUNDAMENTAL" ? 'selected = "selected" ': '')?> >Fundamental</option>
								<option value="MÉDIO"<?php echo ($alunos->nivel == "MÉDIO" ? 'selected = "selected" ': '')?> >Médio</option>
							</select>
						</div>
					</div>

					<hr />

					<h4>Turno</h4>
					<div class="form-inline">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							<select required class="form-control" name="turno" id="turno">
								<option value="">Selecionar</option>
								<option value="MANHÃ"<?php echo ($alunos->turno == "MANHÃ" ? 'selected = "selected" ': '')?> >Manhã</option>
								<option value="TARDE"<?php echo ($alunos->turno == "TARDE" ? 'selected = "selected" ': '')?> >Tarde</option>
							</select>
						</div>
					</div>

					<hr />

					<h4>Documentos</h4>
					<div align="center" class="form-inline">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
							<input type="text" class="form-control" id="RG" placeholder="RG" name="rg" value="<?php echo $alunos->rg ?>">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span> 
							<input type="text" class="form-control" id="OGPD" placeholder="Órgão expedidor" name="orgExped" value="<?php echo $alunos->orgExped ?>">
						</div>
					</div>
					<br />
					<div class="form-inline">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
							<input type="text" class="form-control" id="DTE" placeholder="DATA DE EXPEDIÇÃO" name="dataExped"  value="<?php echo $alunos->dataExped?>">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>  
							<input type="text" class="form-control" id="CPF" placeholder="CPF" name="cpf" value="<?php echo $alunos->cpf ?>">
						</div>
					</div>

					<hr/>

					<h4>Endereço</h4>
					<div class="form-inline">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span> 
							<input type="text" placeholder="RUA" class="form-control" name="rua" required="" value="<?php echo $alunos->rua ?>">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>  
							<input type="text" id="bairro" class="form-control" placeholder="BAIRRO" name="bairro" value="<?php echo $alunos->bairro ?>" required="">
						</div>
					</div>
					<br />
					<div class="form-inline">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span> 
							<input type="text" id="cidade" class="form-control" placeholder="CIDADE" name="cidade" value="<?php echo $alunos->cidade ?>" required="">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-sound-5-1"></i></span> 
							<input type="text" id="CEP" class="form-control" placeholder="CEP" name="cep" value="<?php echo $alunos->cep ?>" required="">
						</div>
					</div>
					<br />
					<div class="form-inline">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>  
							<input type="text" id="num" class="form-control" placeholder="NÚMERO" name="numero" value="<?php echo $alunos->numero ?>"  required="">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>   
							<input type="text" id="estado" class="form-control" placeholder="ESTADO" name="estado" value="<?php echo $alunos->estado ?>" required="">
						</div>
					</div>
				</div>

				<hr />

				<div class="container">
					<div class="form-group">
						<textarea class="form-control" rows="5" id="comment"  placeholder="OBSERVAÇÕES (OPCIONAL)" name="observacoes"><?php echo $alunos->observacoes ?></textarea>
					</div>

					<h4>Segurança</h4>

					<br />

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
						<input type="text" placeholder="MATRÍCULA" class="form-control" name="Matricula" value="<?php echo $alunos->Matricula ?>" id="mat" readonly>
					</div>

					<input type="hidden" placeholder="Senha do aluno" class="field" value="123456" name="senha" id="pass" readonly>
					<input type="hidden" name="ID" value="<?php echo $alunos->Matricula ?>">
					<button type="submit" class="button2">Atualizar registro</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>