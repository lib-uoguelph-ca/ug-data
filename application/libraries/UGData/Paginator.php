<?php
namespace UGData;

class Paginator extends \Laravel\Paginator {
	
	public $chunks;
	
	/**
	 * Create a new Paginator instance.
	 *
	 * @param  array  $results
	 * @param  int    $page
	 * @param  int    $total
	 * @param  int    $per_page
	 * @param  int    $last
	 * @param  bool   $is_eloquent
	 * @return void
	 */
	protected function __construct($results, $page, $total, $per_page, $last, $is_eloquent = TRUE)
	{
		$this->page = $page;
		$this->last = $last;
		$this->total = $total;
		$this->per_page = $per_page;

		if ($is_eloquent) {
			$this->results = $results;
		} else {
			$this->chunks = array_chunk($results, $per_page);
			
			if (count($this->chunks) == 0) {
				return array();
			}

			$this->results = $this->chunks[$page-1];
		}
	}
	
	/**
	 * Create a new Paginator instance.
	 *
	 * @param  array      $results
	 * @param  int        $total
	 * @param  int        $per_page
	 * @param  bool   $is_eloquent
	 * @return Paginator
	 */
	public static function make($results, $total, $per_page, $is_eloquent = TRUE)
	{
		$page = static::page($total, $per_page);
		$last = ceil($total / $per_page);
		return new static($results, $page, $total, $per_page, $last, $is_eloquent);
	}
	
}