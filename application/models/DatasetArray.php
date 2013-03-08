<?php

/**
 * DatasetArray
 *
 * This class is designed to aid in creating an associative array representation of a Dataset.
 * This array can then can be used to populate a form.
 *
 * @author adam
 *
 */
class DatasetArray {

	protected $output;

	public function __construct(Dataset $ds) {
		//Parse through the dataset object and it's attributes and build an array.

		//Core attributes
		$this->add(array('name' => 'dataset_name', 'value' => $ds->name));
		$this->add(array('name' => 'dataset_url', 'value' => $ds->url));
		$this->add(array('name' => 'dataset_description', 'value' => $ds->description));

		//Secondary attributes
		foreach ($ds->getSecondaryAttributes() as $attrib) {
			$this->add($attrib);
		}
	}

	public function __toString() {
		return var_export($this->output);
	}

	public function build() {
		return $this->output;
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
}