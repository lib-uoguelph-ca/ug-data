<?php

	$vendor_location = dirname(dirname(__FILE__)) . '/vendor/';
	$autoload_path = $vendor_location . 'autoload.php';
	require $autoload_path;
	
	use CHH\Optparse;
	
	$parser = new Optparse\Parser("Parses an OWL file and produces a form.");
	
	function usage_and_exit()
	{
		global $parser;
		fwrite(STDERR, "{$parser->usage()}\n");
		exit(1);
	}
	
	$parser->addFlag("help", array("alias" => "-h"), "usage_and_exit");
	$parser->addArgument("input file", array("alias" => "i", "required" => true));
	$parser->addArgument("output directory", array("alias" => "o", "required" => false));
	
	try {
		$parser->parse();
	} catch (Optparse\Exception $e) {
		throw
		usage_and_exit();
	}
	
	$output_dir = $parser->arg("output directory");
	if (empty($output_dir)) {
		$output_dir = dirname(dirname(__FILE__)) . '/application/views/search/';
	}

	//Parse our OWL file and generate the form content.
	$input_file = $parser->arg("input file");
	use UGData\OwlForm\OwlForm;
	$of = new OwlForm($input_file);
	$form = $of->getForm();
	
	//Write the form content to the output directory. The filename used is <ontology_name>.blade.php
	$output_file_name = $of->getName() . ".blade.php";
	$output_file = $output_dir . $output_file_name;
	
	try {
		$fp = fopen($output_file, 'w');
		fwrite($fp, $form);
		fclose($fp);
	} catch (Exception $e) {
		echo "Output file write error. Check the permisssions on the output directory?";	
	}
	
	echo "Success! Output file written to " . $output_file . PHP_EOL . PHP_EOL;
	echo "Great, now add the following line to application/views/search/index.blade.php:" . PHP_EOL;
	echo "{{ View::make('search." . $of->getName() . "')->render() }}" . PHP_EOL . PHP_EOL;
	echo "Also, add an option to the ontology select list:" . PHP_EOL;
	echo '<option value="' . $of->getName() . '">' . $of->getName() . '</option>' . PHP_EOL;
	
?>