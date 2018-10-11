$(document).ready(function() {
    $('.select2').select2({
    	width: '100%',
	    height: '100%',
	    selectOnClose: true,
    });

    $('#error').modal('show');

    $('.data-table').DataTable({
    	language: {
    		'url': 'http://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
    	}
    });
});