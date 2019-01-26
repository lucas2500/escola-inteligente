$(document).ready(function () { 
	var $seuCampoCpf = $("#CPF");
	$seuCampoCpf.mask('000.000.000-00', {reverse: false});

	var $seuCampoCpf2 = $("#DTE");
	$seuCampoCpf2.mask('00/00/0000', {reverse: false});

	var $seuCampoCpf3 = $("#dtnasc");
	$seuCampoCpf3.mask('00/00/0000', {reverse: false});

	var $seuCampoCpf5 = $("#TELEFONE");
	$seuCampoCpf5.mask('(00) 0000-0000', {reverse: false});

	var $seuCampoCpf6 = $("#CELULAR");
	$seuCampoCpf6.mask('(00) 00000-0000', {reverse: false});

	var $seuCampoCpf7 = $("#CELULAR2");
	$seuCampoCpf7.mask('(00) 00000-0000', {reverse: false});

	var $seuCampoCpf8 = $("#CEP");
	$seuCampoCpf8.mask('00000-000', {reverse: false});
});