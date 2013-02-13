<?php
	
	$vendor_location = dirname(dirname(__FILE__)) . '/vendor/';
	$autoload_path = $vendor_location . 'autoload.php';
	require $autoload_path;

	use Doana\OwlForm\OwlForm;
	$of = new OwlForm('/var/www/ug-data/bin/geopolitical.owl');
	//$of = new OwlForm('human_activities.owl');
	$form = $of->getForm();
	//print $form;
	
	
	
	
?>