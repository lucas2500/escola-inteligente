
$(document).ready(function() {
	$('#tableRegistros').DataTable( {
		"ordering": false,
		"language": {
			"lengthMenu": "Exibindo _MENU_ registros por página",
			"sSearch": "Pesquisar",
			"zeroRecords": "Nenhum registro encontrado",
			"info": "Exibindo página _PAGE_ de _PAGES_",
			"infoEmpty": "Nenhum registro disponível",
			"infoFiltered": "(filtrado de _MAX_ total de registros)",
			"oPaginate": {
				"sNext": "Próximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Último"
			}
		}

	} );
} );


$(document).ready(function() {
	$('#fundManha').DataTable( {
		"ordering": false,
		"language": {
			"lengthMenu": "Exibindo _MENU_ registros por página",
			"sSearch": "Pesquisar",
			"zeroRecords": "Nenhum registro encontrado",
			"info": "Exibindo página _PAGE_ de _PAGES_",
			"infoEmpty": "Nenhum registro disponível",
			"infoFiltered": "(filtrado de _MAX_ total de registros)",
			"oPaginate": {
				"sNext": "Próximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Último"
			}
		}

	} );
} );


$(document).ready(function() {
	$('#fundTarde').DataTable( {
		"ordering": false,
		"language": {
			"lengthMenu": "Exibindo _MENU_ registros por página",
			"sSearch": "Pesquisar",
			"zeroRecords": "Nenhum registro encontrado",
			"info": "Exibindo página _PAGE_ de _PAGES_",
			"infoEmpty": "Nenhum registro disponível",
			"infoFiltered": "(filtrado de _MAX_ total de registros)",
			"oPaginate": {
				"sNext": "Próximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Último"
			}
		}

	} );
} );

$(document).ready(function() {
	$('#medManha').DataTable( {
		"ordering": false,
		"language": {
			"lengthMenu": "Exibindo _MENU_ registros por página",
			"sSearch": "Pesquisar",
			"zeroRecords": "Nenhum registro encontrado",
			"info": "Exibindo página _PAGE_ de _PAGES_",
			"infoEmpty": "Nenhum registro disponível",
			"infoFiltered": "(filtrado de _MAX_ total de registros)",
			"oPaginate": {
				"sNext": "Próximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Último"
			}
		}

	} );
} );

$(document).ready(function() {
	$('#medTarde').DataTable( {
		"ordering": false,
		"language": {
			"lengthMenu": "Exibindo _MENU_ registros por página",
			"sSearch": "Pesquisar",
			"zeroRecords": "Nenhum registro encontrado",
			"info": "Exibindo página _PAGE_ de _PAGES_",
			"infoEmpty": "Nenhum registro disponível",
			"infoFiltered": "(filtrado de _MAX_ total de registros)",
			"oPaginate": {
				"sNext": "Próximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Último"
			}
		}

	} );
} );

$(document).ready(function() {
	$('#prof').DataTable( {
		"ordering": false,
		"language": {
			"lengthMenu": "Exibindo _MENU_ registros por página",
			"sSearch": "Pesquisar",
			"zeroRecords": "Nenhum registro encontrado",
			"info": "Exibindo página _PAGE_ de _PAGES_",
			"infoEmpty": "Nenhum registro disponível",
			"infoFiltered": "(filtrado de _MAX_ total de registros)",
			"oPaginate": {
				"sNext": "Próximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Último"
			}
		}

	} );
} );


$(document).ready(function() {
	$('#anexos').DataTable( {
		"ordering": false,
		"language": {
			"lengthMenu": "Exibindo _MENU_ registros por página",
			"sSearch": "Pesquisar",
			"zeroRecords": "Nenhum registro encontrado",
			"info": "Exibindo página _PAGE_ de _PAGES_",
			"infoEmpty": "Nenhum registro disponível",
			"infoFiltered": "(filtrado de _MAX_ total de registros)",
			"oPaginate": {
				"sNext": "Próximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Último"
			}
		}

	} );
} );


function provaFinal(){

	$('#alunoSituation').collapse('hide');
	$('#pFinal').collapse('show');

}

function situacaoAluno(){

	$('#alunoSituation').collapse('show');
	$('#pFinal').collapse('hide');

}

