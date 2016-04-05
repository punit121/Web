$(document).ready(function() {
	
	//------------- Data tables -------------//
	$('#dataTable').dataTable( {
		"sDom": "<'row'<'col-lg-9'l><'col-lg-2'f>r>t<'row'<'col-lg-9'i><'col-lg-3'p>>",
		"sPaginationType": "bootstrap",
		"bJQueryUI": false,
		"bAutoWidth": false,
		"oLanguage": {
			"sSearch": "<span>Filter:</span> _INPUT_",
			"sLengthMenu": "<span>_MENU_ entries</span>",
			"oPaginate": { "sFirst": "First", "sLast": "Last" }
		}
	});

	$('.dataTables_length select').uniform();
	$('.dataTables_paginate > ul').addClass('pagination');
});