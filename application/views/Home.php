
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<title>Escola Inteligente</title>


	<link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">


	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>


	<link href="<?php echo base_url('assets/css/agency.min.css');?>" rel="stylesheet">

	<style type="text/css">

	input[type=text] {
		width: 35%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	.button{

		width: 25%;
		color: #FF8C00;
		background-color: white;
		/*padding: 6px 20px;*/
		margin: 7px 0;
		border-radius: 25px;
		cursor: pointer;

	}


	.button:hover{

		background-color: #00FA9A;
		color: white;
	}

	@media (max-width: 990px) {

		input[type=text] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		textarea{

			width: 100%;

		}

		.footer{

			margin-left: 8%;
			margin-top: 5%;
			font-size: 90%;
		}

	}

	@media (min-width: 768px) {

		input[type=text] {
			width: 35.5%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		textarea{

			width: 71.5%;

		}

	}

	@media (max-width: 500px){

		.footer{

			margin-left: 10%;
			margin-top: 8%;
			font-size: 90%;
		}

	}
}

</style>

</head>

<body id="page-top">
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top">Fly Softwares</a>
		</button>
	</div>
</nav>


<header class="masthead">
	<div class="container">
		<div class="intro-text">
			<div class="intro-heading" style="color: blue;">Escola Inteligente</div>
			<a class="btn btn-xl js-scroll-trigger" href="#services">Acessar meu portal</a>
		</div>
	</div>
</header>


<section id="services">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-4">
				<span class="fa-stack fa-4x">
					<!-- <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
					<a href="principal/Coordenacao"><img src="<?php echo base_url ('assets/img/coord.png');?>" width="130"></a>
				</span>
				<h4 class="service-heading">Coordenação</h4>
				<p class="text-muted">O portal do coordenador torna a vida dos dirigentes muito mais fácil, com todas as ferramentas disponíveis, é possível ter o total controle das atividades realizadas durante o ano letivo.</p>
			</div>
			<div class="col-md-4">
				<span class="fa-stack fa-4x">
					<!-- <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
					<a href="principal/Professor"><img src="<?php echo base_url ('assets/img/teacher.png');?>" width="130"></a>
				</span>
				<h4 class="service-heading">Professor</h4>
				<p class="text-muted">O portal do professor permite o total controle das atividades realizadas em aula, as ferramentas presentes neste módulo possibilitam a interação com outros professores e membros da coordenação.</p>
			</div>
			<div class="col-md-4">
				<span class="fa-stack fa-4x">
					<!-- <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
					<a href="principal/loginAluno"><img src="<?php echo base_url ('assets/img/std2.png');?>" width="130"></a>
				</span>
				<h4 class="service-heading">Aluno</h4>
				<p class="text-muted">O Módulo do aluno permite que os pais tenham total conhecimento da vida acadêmica dos seus filhos, sendo possível acompanhar a frequência, notas, médias e o desempenho geral em cada matéria.</p>
			</div>
		</div>
	</div>
</section>


<div class="container" style="background-color: #FF8C00; ">
	<div class="container-fluid">
		<div class="form-group" align="left">
			<br />
			<label style="color: white;">Contate-nos:</label>
			<br />
			<form id="contatoForm" action="" method="">
				<br />
				<input type="text" name="nome" id="nome" placeholder="Nome" required="">
				<input type="text" name="email" id="email" placeholder="Email" required="">
				<input type="text" name="telefone" id="telefone" placeholder="Telefone" required="">
				<input type="text" name="assunto" id="assunto" placeholder="Assunto" required="">
				<textarea cols="82" rows="5" name="msg" id="msg" placeholder=" Mensagem" style="margin-bottom: 3%;" required=""></textarea>
				<input class="button" type="button" onclick="return envirEmail()" id="enviar" value="Enviar" style="float: right; margin-right: 1%;">
			</form>
		</div>  
	</div>
</div>


<br />

<div align="center" class="footer" style="color: blue;">
	<a target="_blank" href="https://www.facebook.com/fly.softwares"><span class="fa" style="color: blue; font-size: 30px;">&#xf230;</span></a>
	<a target="_blank" href="https://www.instagram.com/flysoftwares/"><span class="fa" style="color: #C71585; font-size: 30px; margin-left: 1%;">&#xf16d;</span></a>
	<br />
	<br />
	<span class="copright">FLY Softwares 2018 - Todos os direitos reservados - <a style="color: blue; text-decoration: underline;" target="_blank" href="http://flysoftwares.com/">flysoftwares.com</span></a>
</div>



<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendor/popper/popper.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
<script src="<?php echo base_url('assets/agency.min.js');?>"></script>

<script type="text/javascript">

	function envirEmail(){

		var contato = document.forms['contatoForm'];

		for(var i=0; i<contato.length; i++){

			if(contato.elements[i].value == ""){

				alert("Por favor preencha todos os campos");
				return false;

			}

		}

		var nome = $('#nome').val();
		var email = $('#email').val();
		var msg = $('#msg').val();
		var tel = $('#telefone').val();
		var assunto = $('#assunto').val();


		var dados = 'nome='+nome + '&email='+email + '&msg='+msg + '&telefone='+tel + '&assunto='+assunto;

		$.ajax({

			type:'post',
			url: '<?php echo base_url();?>professor/email',
			data: dados,
			cache: false,
		});

		$('#nome').val("");
		$('#email').val("");
		$('#msg').val("");
		$('#telefone').val("");
		$('#assunto').val("");

		alert("Enviado com sucesso!!");

	}
</script>
</body>
</html>
