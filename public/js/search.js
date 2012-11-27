$(document).ready(function() {
	$('.ontology').hide();	
	
	$('#ontology-select').change(function() {
		var id = '#' + $(this).val();
		$('.ontology').hide();
		$(id).show(200);
	})
})
