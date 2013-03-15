<?php 

class Attribute extends Eloquent {

	/**
	 * Get distinct attribute names that belong to a given ontology.
	 * 
	 * @param 	string 	$ontology 
	 * @return 	array 	List of attribute names.
	 */
	public static function getAttributeNamesByOntology($ontology) {
		$query = DB::table('attributes')
			->where('name', 'LIKE', $ontology . '_%');

		return $query->distinct()->get(array('name'));
	}

	/**
	 * Get distinct attribute names.
	 * 
	 * @param 	string 	$ontology 
	 * @return 	array 	List of attribute names.
	 */
	public static function getAttributeNames() {
		$query = DB::table('attributes');
		return $query->distinct()->get(array('name'));
	}
}