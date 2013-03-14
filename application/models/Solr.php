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

    public function query($q, $hl_fields = NULL) {
        if(is_null($this->client)) {
            $this->connect();
        }

        $select = $this->client->createSelect();
        $select->setQuery($q);

        if(!empty($hl_fields)) {
            $hl = $select->getHighlighting();
            $hl->setFields($hl_fields);        
        }

        $results = $this->client->select($select);
        return $this->formatQueryResults($results);
    }

    public function datasetSearch(array $input) {

        $query = "";
        if (isset($input['search_keyword'])) {
            $query .= "fulltext:" . $input['search_keyword'];
        }

        $invalid_prefixes = array("", "search", "csrf");
        foreach ($input as $key => $item) {
            $prefix = Util::getFieldPrefix($key);
            if(!in_array($prefix, $invalid_prefixes)) {
                if(!empty($query)) {
                    $query .= " +";
                }
                $query .= $key . ":" . $item;
            }
        }
        $results = $this->query($query, 'fulltext');

        return $results;
    } 

    protected function formatQueryResults(Solarium\QueryType\Select\Result\Result $r) {
        $results = array();
        $results['num'] = $r->getNumFound();

        $highlights = $r->getHighlighting();
        foreach($r as $key => $document) {
            $result = array();
            $result["id"] = $document->id;
            $result["name"] = $document->name;
            $result["url"] = $document->url;
            $result["description"] = $document->description;
            $result["highlight"] = $this->formatHighlights($highlights->getResult($document->id));

            $results["results"][] = $result;
        }

        return $results;
    }

    protected function formatHighlights(Solarium\QueryType\Select\Result\Highlighting\Result $hl) {
        $result = "";
        foreach($hl as $field => $highlight) {
            $result .= implode(' (...) ', $highlight) . '<br/>';
        }
        return $result;
    }

}