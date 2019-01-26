<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Transferir alunos</title>
	<meta charset="utf-8">

	<style type="text/css">

	#sexo{

		background: #ffffff; 
		pointer-events: none;
		touch-action: none;
	}
</style>
</head>
<body>
	<div class="well well-lg">
		<div align="center">
			<h3>Dados pessoais</h3>
			<div align="center">
				<form name="myForm" action="<?php echo base_url();?>cadastro_turmas/transfAluno" method="post">
					<div class="container">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" placeholder="NOME DO ALUNO" class="form-control" name="nome" value="<?php echo $alunos->nome ?>" readonly="">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="text" placeholder="DATA DE NASCIMENTO" class="form-control" name="dataNasc" id="dtnasc" value="<?php echo $alunos->dataNasc ?>" readonly="">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
							<input type="text" placeholder="NATURALIDADE" class="form-control" name="naturalidade"  value="<?php echo $alunos->naturalidade ?>" readonly="">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
							<input type="text" placeholder="NACIONALIDADE" class="form-control" name="nacionalidade" value="<?php echo $alunos->nacionalidade ?>" readonly="">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<input type="text" placeholder="NOME DAMÃE" class="form-control" name="nomeMae" value="<?php echo $alunos->nomeMae ?>" readonly="">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<input type="text" placeholder="NOME DO PAI" class="form-control" name="nomePai" value="<?php echo $alunos->nomePai ?>" readonly="">
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="text" placeholder="EMAIL" class="form-control" name="email" value="<?php echo $alunos->email ?>" readonly="">
						</div>
						<br />
						<div class="form-inline" align="left">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
								<input type="text" id="TELEFONE" placeholder="(DD) (OPCIONAL)" class="form-control" name="telefone" value="<?php echo $alunos->telefone ?>" readonly="">
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span> 
								<input type="text" id="CELULAR" placeholder="(DD) + 9 (OBRIGATÓRIO)" class="form-control" name="celular" value="<?php echo $alunos->celular ?>" readonly="">
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
								<input type="text" id="CELULAR2" placeholder="(DD) + 9 (OPCIONAL)" class="form-control" name="celular2" value="<?php echo $alunos->celular2 ?>" readonly="">
							</div>
						</div>
						<hr/>

						<h4>Sexo</h4>
						<div class="form-inline">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
								<select class="form-control" name="sexo" id="sexo">
									<option value="">Selecionar</option>
									<option value="MASCULINO"<?php echo ($alunos->sexo == "MASCULINO" ? 'selected = "selected" ': '')?> >Masculino</option>
									<option value="FEMININO"<?php echo ($alunos->sexo == "FEMININO" ? 'selected = "selected" ': '')?> >Feminino</option>
								</select>
							</div>
						</div>

						<hr />

						<small style="color: red;">*Campo editável</small>
						<h4>Nível</h4>
						<div class="form-inline">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-blackboard"></i></span>
								<select class="form-control" name="nivel" required="">
									<option value="">Selecionar</option>
									<option value="FUNDAMENTAL"<?php echo ($alunos->nivel == "FUNDAMENTAL" ? 'selected = "selected" ': '')?> >Fundamental</option>
									<option value="MÉDIO"<?php echo ($alunos->nivel == "MÉDIO" ? 'selected = "selected" ': '')?> >Médio</option>
								</select>
							</div>
						</div>

						<hr />

						<small style="color: red;">*Campo editável</small>
						<h4>Turno</h4>
						<div class="form-inline">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
								<select required class="form-control" name="turno">
									<option value="">Selecionar</option>
									<option value="MANHÃ"<?php echo ($alunos->turno == "MANHÃ" ? 'selected = "selected" ': '')?> >Manhã</option>
									<option value="TARDE"<?php echo ($alunos->turno == "TARDE" ? 'selected = "selected" ': '')?> >Tarde</option>
								</select>
							</div>
						</div>

						<hr />

						<h4>Documentos</h4>
						<div class="form-inline" align="center">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
								<input type="text" class="form-control" id="RG" placeholder="RG" name="rg" value="<?php echo $alunos->rg ?>" readonly="">
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control" id="OGPD" placeholder="Órgão expedidor" name="orgExped" value="<?php echo $alunos->orgExped ?>" readonly="">
							</div>
						</div>
						<br />
						<div class="form-inline">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>  
								<input type="text" class="form-control" id="DTE" placeholder="DATA DE EXPEDIÇÃO" name="dataExped" value="<?php echo $alunos->dataExped?>" readonly="">
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span> 
								<input type="text" class="form-control" id="CPF" placeholder="CPF" name="cpf" value="<?php echo $alunos->cpf ?>" readonly="">
							</div>
						</div>
					</div>

					<hr/>

					<h4>Endereço</h4>
					<div class="form-inline">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span> 
							<input type="text" placeholder="RUA" class="form-control" name="rua" value="<?php echo $alunos->rua ?>" readonly="">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span> 
							<input type="text" id="bairro" class="form-control" placeholder="BAIRRO" required name="bairro" value="<?php echo $alunos->bairro ?>" readonly="">
						</div>
					</div>
					<br />
					<div class="form-inline">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span> 
							<input type="text" id="cidade" class="form-control" placeholder="CIDADE" name="cidade" value="<?php echo $alunos->cidade ?>" readonly="">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-sound-5-1"></i></span> 
							<input type="text" id="CEP" class="form-control" placeholder="CEP" name="cep" value="<?php echo $alunos->cep ?>" readonly="">
						</div>
					</div>
					<br />
					<div class="form-inline">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
							<input type="text" id="num" class="form-control" placeholder="NÚMERO" name="numero" value="<?php echo $alunos->numero ?>" readonly="">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
							<input type="text" id="num" class="form-control" placeholder="Estado" required name="estado" value="<?php echo $alunos->estado ?>" readonly="">
						</div>
					</div>
				</div>

				<hr />

				<div class="container">
					<div class="form-group">
						<textarea class="form-control" rows="5" id="comment"  placeholder="OBSERVAÇÕES (OPCIONAL)" name="observacoes" readonly=""><?php echo $alunos->observacoes ?></textarea>
					</div>

					<h4>Matrícula</h4>

					<br />

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-option-horizontal"></i></span>
						<input type="text" placeholder="Matrícula" class="form-control" value="<?php echo $alunos->Matricula ?>" name="Matricula" id="mat" readonly>
					</div>
					<button type="submit" class="button2">Finalizar transferência</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>