<?php

namespace doana\owlform;

$vendor_location = dirname(dirname(__FILE__)) . '/../../../vendor/';
$autoload_path = $vendor_location . 'autoload.php';
require $autoload_path;

use PFBC\Form;

require_once $vendor_location . "/owllib/owllib/OWLLib.php";
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
	
	/*
	 * If necessary, read the ontology in and cache the content for later use.  
	 */
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
		$start = strrpos($this->filename, '/') + 1;		
		$name = substr($this->filename, $start, strlen($this->filename));
		$name = substr($name, 0, strrpos($name, '.'));
		return $name;	
	}
	
	/*
	 * Using the loaded OWL file, generate a form that has corresponding inputs 
	 * for the OWL classes and properties.
	 * 
	 */
	public function getForm() {
		
		$classes = array('');
		$classes = $classes + $this->getTypes();		
		$properties = $this->getProperties();
		
		/*
		 * $_SERVER['DOCUTMENT_ROOT'] is necessary because PFBC\Form assumes 
		 * that it is running in a web server.
		 */
		$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__);
		$form = new Form("Ontology");	
		
		$form->configure(array(
				"prevent" => array("bootstrap", "jQuery", "focus")
		));
		
		$form->addElement(new \PFBC\Element\Select("Type:", $this->getName() . "_type", $classes));
		
		//Iterate through the properties and add one select box for each property.
		foreach ($properties["object"] as $property) {
			$name = $property['property'];
			$domain = array('');
			$domain = $domain + $property['domain'];
						
			$form->addElement(new \PFBC\Element\Select($name . ":", $this->getName() . '_' . $name, $domain));
		}
		
		$rendered_form = $form->render(TRUE);
		
		$rendered_form_content = $this->getFormContents($rendered_form);
		
		return $rendered_form_content;
		
	}
	
	/*
	 * Returns the usable content of the generated form. 
	 * 
	 * For our purposes, we don't need the <form> tags. 
	 * We also want to add an id and a class to the fieldset string that we 
	 * can target with javascript on the client side.
	 */
	function getFormContents($form) {
	
		//Remove the <form> tags:
		$content = '';
		$matches = array();
		if(preg_match('/<form.*>.*<\/form>/', $form, $matches) > 0) {
			$form_start = strpos($matches[0], '>') + 1;
			$form_end = strlen('</form>') * -1;
			$content = substr($matches[0], $form_start, $form_end);
		}
		
		//Add an id (the ontology name) and class ('ontology') to the fieldset.
		$fieldset_str = '<fieldset id="' . $this->getName() . '" class="ontology">';
		$content = preg_replace('/<fieldset>/', $fieldset_str,  $content, 1);
	
		return $content;
	}
	
}