$(document).ready(function() {	
	$('#ontology-select').change(function() {
		$('#advancedSearch').show();
		var id = '#' + $(this).val();
		$('.ontology').hide();
		$('#advancedSearch select').val("");
		$('#advancedSearch input').val("");
		$(id).show(400);
	})
})
