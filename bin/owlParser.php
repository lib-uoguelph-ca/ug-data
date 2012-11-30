<?php
	
	require '../vendor/autoload.php';
	
	/*
	 
	require_once "../vendor/owllib/OWLLib.php";
	require_once "$OWLLIB_ROOT/reader/OWLReader.php";
	require_once "$OWLLIB_ROOT/memory/OWLMemoryOntology.php";
	
	$filename = 'geopolitical.owl';
	//$filename = 'base.owl';
	
	$reader = new OWLReader();
	$ontology = new OWLMemoryOntology();
	$reader->readFromFile($filename, $ontology);
	
	ini_set('xdebug.var_display_max_depth', '10');
	
	$namespace =  $ontology->getNamespace();
	
	//Get classes for the type dropdown.
	$qualified_classes = $ontology->getClasses();
	$classes = array();
	foreach ($qualified_classes as $qc_key => $qc ) {
		$class = str_replace($namespace, '', $qc_key); 
		$classes[] = $class;
	}

	echo "<h2>Classes</h2>";
	var_dump($classes);
	
	//Get the properties and their range for the relation section.
	$qualified_properties = $ontology->getAllProperties();
	
	$properties = array();
	foreach ($qualified_properties as $qp){
		$model = $qp->model;
		
		$propdata = $ontology->getPropertyData($qp->id);
		$datatype = $propdata['isdatatype'];
		
		if($datatype) {
			$properties['data'][] = str_replace($namespace, '', $qp->id);
		}
		else {
			$qualified_domains = $model->owl_data['classes'];
			$qualified_domains += $model->owl_data['subclasses'];
			
			$domain = array();
			foreach ($qualified_domains as $qd_key => $qd) {
				$domain[] = str_replace($namespace, '', $qd_key); 
			}
			
			$property = str_replace($namespace, '', $qp->id);
			$properties['object'][] = array('property' => $property, 'domain' => $domain);
		} 
	}
	
	echo "<h2>Properties</h2>";
	var_dump($properties);
	*/
	use Doana\OwlForm\OwlForm;
	$of = new OwlForm('geopolitical.owl');
	
	echo $of->getName();
	$form = $of->getForm();
	/*
	$types = $of->getTypes();
	var_dump($types);
	$properties = $of->getProperties();
	var_dump($properties);
	*/
?>