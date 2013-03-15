<?php 

class Attribute extends Eloquent {

	public static function getAttributeNamesByOntology($ontology) {
		$query = DB::table('attributes')
			->where('name', 'LIKE', $ontology . '_%');

		return $query->distinct()->get(array('name'));
	}

	public static function getAttributeNames() {
		$query = DB::table('attributes');
		return $query->distinct()->get(array('name'));
	}
}