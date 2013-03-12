<?php

class Solr {
	protected $client;

	public function __construct() {

	}

	public function getClient() {
		if(is_null($this->client)) {
			$this->client = $this->connect();	
		}
		return $this->client;
	}

	protected function connect($config = NULL) {

		if(is_null($config)) {
			$config = array(
				'endpoint' => array(
					'localhost' => array(
						'host' => '10.0.2.2',
						'port' => '8983',
						'path' => '/solr/ug_data'
					),
				),
			);
		}

		$this->client = new Solarium\Client($config);
	}

	protected function getUpdate() {
		if(is_null($this->client)) {
			$this->connect();
		}

		return $this->client->createUpdate();
	}

	public function getDoc() {
		$update = $this->getUpdate();
		
		return $update->createDocument();
	}

	public function add($d) {
		$this->connect();
		$update = $this->getUpdate();

		if(is_array($d)) {
			$update->addDocuments($d);
		}
		else {
			$update->addDocument($d);
		}

		$update->addCommit();

		$this->client->update($update);
	}

	public function query($q) {
		$select = $this->client->createSelect();
		$select->setQuery($q);

		$results = $this->client->select($select);
		return $results;
	}


}