<?php
// Oct 20, 2014. SphinxQL Query Builder for PHP
// http://sphinxsearch.com/blog/2014/10/20/sphinxql-query-builder-for-php/
require('DocumentClasses/WikiMain/WikiMainIndex.php');



// mysql -P9306 --protocol=tcp --prompt='sphinxQL> '
$search = $_GET['query'];

# Host and port on which searchd deamon is running
$sphinxHost 		= '207.189.130.196';
$sphinxQLPort 	= 9306;
$sphinxAPIPort	= 9312;
$sphinxUser			= null;
$sphinxPass			= null;
$sphinxDb				= null;


function get_date($timestamp,$type = null){
	return $type == 'product' ? '' :date('M j, Y',$timestamp);
}
function search_result($result) {

	$html = '<div class="search-result search-result-'.$result["type"].'">'.
		'<h6 class="search-result-title">'.result_link($result['title'],$result['link']).'</h6>';
		
	$html .= "<div class='result-date'>".get_date($result['docdate'],$result['type'])."</div><div class='teaser'>{$result['teaser']}</div>";
	
	$html .="</div>";
	
	return $html;
}


$conn = mysqli_connect($sphinxHost, $sphinxUser, $sphinxPass, $sphinxDb, $sphinxQLPort);

if ($conn->connect_error) {
	throw new Exception('Connection Error: ['.$conn->connect_errno.'] '.$conn->connect_error, $conn->connect_errno);
}


$query = "SELECT id, title, link, type, EXIST('date',284025600) AS docdate,  SNIPPET(body,'{$search}','around=25') AS teaser FROM blog, case_reviews, ocdla_products WHERE MATCH('{$search}')";// AND page_is_redirect = 0";


$wikiSearch = new WikiMainIndex($conn);
$results = $wikiSearch->exec($query);

// print "<pre>".print_r($results,true)."</pre>";

// exit;

