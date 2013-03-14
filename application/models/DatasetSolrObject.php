<?php

/**
 * DatasetSolrObject
 *
 * This class is designed to aid in creating a solr document object representing a Dataset.
 *
 * @author adam
 *
 */
class DatasetSolrObject {

	protected $output;

	public function __construct(Dataset $ds) {
		//Parse through the dataset object and it's attributes and build an array.

		//Core attributes
		$this->add(array('name' => 'id', 'value' => $ds->id));
		$this->add(array('name' => 'name', 'value' => $ds->name));
		$this->add(array('name' => 'url', 'value' => $ds->url));
		$this->add(array('name' => 'description', 'value' => htmlspecialchars(strip_tags($ds->description))));

		//Secondary attributes
		foreach ($ds->getSecondaryAttributes() as $attrib) {
			$this->add($attrib);
		}
	}

	public function __toString() {
		return (string)print_r($this->output, TRUE);
	}

	public function build() {
		$solr = new Solr();
		$doc = $solr->getDoc();

		foreach($this->output as $key => $val) {
			$doc->$key = $val;
		}
		
		//$doc->fulltext = $this->getFullText($this->output);
				
		return $doc;
	}

	/**
	 * Add an attribute to the output array.
	 *
	 * @param	array	$attrib		This argument must be an array in
	 * 								the form array('name' => 'foo', 'value' => 'bar')
	 */
	protected function add(array $attrib) {
		if(!isset($this->output[$attrib['name']])) {
			$this->output[$attrib['name']] = $attrib['value'];
		}
		else {
			if(is_string($this->output[$attrib['name']])) {
				$current_value = $this->output[$attrib['name']];
				$this->output[$attrib['name']] = array($current_value, $attrib['value']);
			}
			else if(is_array($this->output[$attrib['name']])) {
				$this->output[$attrib['name']][] = $attrib['value'];
			}	
		}
	}
	
	protected function getFullText($values) {
		$ret = "";
		foreach($values as $key => $val) {
			if(is_array($val)) {
				$ret .= " " . $this->getFullText($val);				
			}
			else {
				$ret .= " " . $val;
			}
		}
		return $ret;
	}
}