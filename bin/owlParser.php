<?php
	
	$vendor_location = dirname(dirname(__FILE__));
	$autoload_path = $vendor_location . '/vendor/autoload.php';
	require $autoload_path;

	use Doana\OwlForm\OwlForm;
	$of = new OwlForm('geopolitical.owl');
	//$of = new OwlForm('human_activities.owl');
	$form = $of->getForm();
	//print $form;
	
	
	
	
?>