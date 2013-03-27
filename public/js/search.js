$(document).ready(function() {	
	$('#search_ontology').change(function() {
		$('#advancedSearch').removeClass('hidden');
		var id = '#' + $('#search_ontology').val();
		$('.ontology').addClass('hidden');
		$(id).removeClass('hidden');
	})

	if($('#search_ontology').val() != "") {
		$('.ontology').addClass('hidden');
		$('#advancedSearch').removeClass('hidden');
		var id = '#' + $('#search_ontology').val();
		$(id).removeClass('hidden');
	}
})
