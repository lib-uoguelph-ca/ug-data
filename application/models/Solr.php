<?php

class Solr {
    protected $client;

    public function __construct() {

    }

    /**
     * Returns an instance of the Solarium\Client class, configured 
     * to connect to our solr server
     * 
     * @return  \Solarium\Client
     */
    public function getClient() {
        if(is_null($this->client)) {
            $this->client = $this->connect();   
        }
        return $this->client;
    }

    /**
     * Connect to our solr server.
     * 
     * @param   type    $config An optional array of configuration values.
     * 
     * @return  \Solarium\Client
     */
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

    /**
     * Returns an instance of the  \Solarium\QueryType\Update\Query class.
     * 
     * @return  \Solarium\QueryType\Update\Query
     */
    protected function getUpdate() {
        if(is_null($this->client)) {
            $this->connect();
        }

        return $this->client->createUpdate();
    }

    /**
     * Returns an instance of the solr \Solarium\QueryType\Update\Query\Document\Document class
     * which can be used to add to or update the solr index.
     * 
     * @return  \Solarium\QueryType\Update\Query\Document\Document
     */
    public function getDoc() {
        $update = $this->getUpdate();
        
        return $update->createDocument();
    }

    /**
     * Add (or update) a document or series of documents to the solr index.
     * @param   type  $d  Either an instance of the \Solarium\QueryType\Update\Query\Document\Document class
     *                  or an array containing instances of the \Solarium\QueryType\Update\Query\Document\Document class. 
     * @return  type
     */
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

    /**
     * Run a query against the solr server. 
     * 
     * @param   string  $q The query string. 
     * @param   string  $hl_fields  Optional, a comma separated list of fields which 
     *                              should be used to provide highlighting. 
     * @return  array   An array of query results. 
     */
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

    /**
     * Do a search specifically designed for a dataset.
     * @param   array    $input  An array of values submitted from the search form. 
     * @return  array    An array of search results.
     */
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

    /**
     * Take the Solarium results and translate them into a simple array 
     * that can be parsed by the view.
     * 
     * @param   Solarium\QueryType\Select\Result\Result     $r  The query results object obtained from solarium. 
     * @return  array   An array of search results.
     */
    protected function formatQueryResults(Solarium\QueryType\Select\Result\Result $r) {
        $results = array();

        $highlights = $r->getHighlighting();
        foreach($r as $key => $document) {
            $result = array();
            $result["id"] = $document->id;
            $result["name"] = $document->name;
            $result["url"] = $document->url;
            $result["description"] = $document->description;
            $result["highlight"] = $this->formatHighlights($highlights->getResult($document->id));

            $results[] = $result;
        }

        return $results;
    }

    /**
     * Translate the solarium highlight results and return a string representation.
     * 
     * @param   Solarium\QueryType\Select\Result\Highlighting\Result     $hl    The highlight results from solarium.
     * @return  string    A string representation of the highlights.
     */
    protected function formatHighlights(Solarium\QueryType\Select\Result\Highlighting\Result $hl) {
        $result = "";
        foreach($hl as $field => $highlight) {
            $result .= implode(' (...) ', $highlight) . '<br/>';
        }
        return $result;
    }

}