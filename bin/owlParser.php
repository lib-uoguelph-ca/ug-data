<?php
	
	require '../vendor/autoload.php';

	use Doana\OwlForm\OwlForm;
	$of = new OwlForm('geopolitical.owl');
	//$of = new OwlForm('human_activities.owl');
	$form = $of->getForm();
	print getFormContents($form);
	
	
	function getFormContents($form) {
		
		$content = '';
		$matches = array();
		if(preg_match('/<form.*>.*<\/form>/', $form, $matches) > 0) {
			var_dump($matches);
			$form_start = strpos($matches[0], '>') + 1;
			$form_end = strlen('</form>') * -1;
			$content = substr($matches[0], $form_start, $form_end);
		}
		
		return $content;
	}
	
?>