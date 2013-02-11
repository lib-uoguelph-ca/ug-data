<?php 

class Dataset extends Eloquent {
	public function attributes()
	{
		return $this->has_many('Attribute');
	}
	
}