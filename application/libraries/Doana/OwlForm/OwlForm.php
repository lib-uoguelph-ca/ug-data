<?php

namespace doana\owlform;
require '../vendor/autoload.php';

require_once "../vendor/owllib/owllib/OWLLib.php";
require_once "$OWLLIB_ROOT/reader/OWLReader.php";
require_once "$OWLLIB_ROOT/memory/OWLMemoryOntology.php";

class OwlForm {
	private $filename = NULL;
	private $ontology = NULL;
	
	public function __construct($filename = NULL) {
		$this->filename = $filename;
		
		if($filename != NULL) {
			$this->readOntology();
		}
	}
	
	/*
	 * Returns an array of classes that are used in this ontology.
	 */
	public function getTypes() {
		
		$namespace =  $this->ontology->getNamespace();
		
		//Get classes for the type dropdown.
		$qualified_classes = $this->ontology->getClasses();
		$classes = array();
		foreach ($qualified_classes as $qc_key => $qc ) {
			$class = str_replace($namespace, '', $qc_key);
			$classes[] = $class;
		}
		
		return $classes;
	}
	
	/*
	 * Returns an associative array of properties in the form, 
	 * broken up by object properties and data properties: 
	 * 
	 * array(
	 * 	 'data' => array('Data property 1', 'Data property 2', ...),
	 * 	 'object' => array(
	 * 		array(
	 * 			'property' => 'property', 
	 * 			'domain' => array('domain 1', 'domain 2', ...)
	 * 		)
	 * 	 ),
	 * )
	 * 
	 */
	public function getProperties() {
		
		$namespace =  $this->ontology->getNamespace();
		$qualified_properties = $this->ontology->getAllProperties();
		
		$properties = array();
		foreach ($qualified_properties as $qp){
			$model = $qp->model;
		
			$propdata = $this->ontology->getPropertyData($qp->id);
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
		
		return $properties;
	}
	
	private function readOntology() {
		if($this->ontology != NULL) {
			return $this->ontology;
		}
		else {

			
			$reader = new \OWLReader();
			$ontology = new \OWLMemoryOntology();
			$reader->readFromFile($this->filename, $ontology);
			
			$this->ontology = $ontology;

			return $ontology;
		}
	
	}
	
	public function getName() {
		return substr($this->filename, 0, strrpos($this->filename, '.'));	
	}
	
	public function getForm() {
		
		$classes = $this->getTypes();
		var_dump($classes);
		$properties = $this->getProperties();
		var_dump($properties); 
		
		/*
		$form = '';
		
		$form .= '<fieldset id="' . $this->getName() . '" class="ontology">';
		
		$form .= '<select name="type" id="' . $this->getName() . '-type">';
		
		$form .= '</fieldset>';
		*/
	}
	
}