<?php

require(__DIR__.'/wiki-namespaces.php');
require(__DIR__.'/wiki-funcs.php');

class WikiMainIndex {//implements SearchResultMedia {

	private $conn;
	
	# Main sphinx.conf index to search
	private $sphinxIndex = "wiki_main";
	
	// SELECT weight() AS rank, * FROM wiki_main WHERE MATCH('duii') ORDER BY rank DESC LIMIT 1000
	
	public function __construct($conn){
		$this->conn = $conn;
	}
	
	public function exec($query){
		$resource = $this->conn->query($query);
		
		if(!$resource){
			// $resource->free_result();
			throw new Exception(mysqli_error($this->conn));
		}
		/*
		while ($row = $resource->fetch_assoc()) {
			global $result_groups;
			$group = $row['page_namespace'] < 500 ? $row['page_namespace'] : '500';
			$group = is_case_review($row['page_title']) ? "102" : $group;
			$result_groups[$group][] = $row;
		}
		*/

		while ($row = $resource->fetch_assoc()) {
			global $result_groups;
			// $group = $row['page_namespace'] < 500 ? $row['page_namespace'] : '500';
			// $group = is_case_review($row['page_title']) ? "102" : $group;
			$result_groups["all"][] = $row;
		}		
		
		$resource->free_result();
		
		return $result_groups;
	}


}