$(document).ready(function() {	
	$('#search_ontology').change(function() {
		$('#advancedSearch').removeClass('hidden');
		var id = '#' + $(this).val();
		$('.ontology').addClass('hidden');
		$(id).removeClass('hidden');
	})

	console.log($('#search_ontology').val());
	if($('#search_ontology').val() != "") {
		$('#advancedSearch').removeClass('hidden');
		var id = '#' + $(this).val();
		$(id).removeClass('hidden');
	}
})
