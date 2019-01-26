
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Enviar arquivos</title>

	<style type="text/css">

	.button {
		background-color: #4CAF50;
		color: white;
		padding: 6px 20px;
		margin: 7px 0;
		border: 2px solid;
		border-radius: 25px;
		cursor: pointer;
		width: 50%;
	}
</style>
</head>

<body>
	<div class="well well-lg" align="center">
		<div class="well well-lg">
			<h3>Carregar arquivos</h3>
			<br />
			<h4 style="color: green;"><?php echo $msg; ?></h4>
			<div class="container">
				<div class="row">
					<div class="container-fluid" align="center">
						<form action="<?php echo base_url();?>principal/Upload" method="post" enctype="multipart/form-data">
							<div class="input-group">
								<input type="file" name="arquivo" class="form-control" required="" id="arquivo"  accept=".zip,.rar, .doc, .docx, .pptx,.xls,.xlsx, .pdf">
								<span class="input-group-addon"><i class="glyphicon glyphicon-folder-open"></i></span>
							</div>
							<br/>
							<button type="submit" class="button" style="margin: 1%;">Enviar</button> 
						</form>
					</div>
				</div>
			</div>
		</div>

		<div align="left">
			<small  class="form-text text-muted">Tipos de arquivos suportados: pdf, doc, docx, pptx, xls, xlsx, zip, rar.</small>
			<br />
			<small class="form-text text-muted">Tamanho máximo: 5mb.</small>
		</div>
	</div>

	<script type="text/javascript">
		
		var uploadField = document.getElementById("arquivo");

		uploadField.onchange = function() {
			if(this.files[0].size > 5000000){
				alert("O arquivo selecionado é muito grande!");
				this.value = "";
			};
		};
	</script>	
</body>
</html>
