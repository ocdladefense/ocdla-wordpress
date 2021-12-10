<?php


$wgSphinxSearch_weights = array(
	'old_text' 		=> 1,
	'page_title' 	=> 500
);



$result_groups = array(
	'100'=>array(),
	'102'=>array(),
	'01' => array(),
	'0' => array(),
	'500' => array()
);

$keys = array(
	'100' => array('code'=>'blog','title'=>'Blog Articles'),
	'102' => array('code'=>'case review','title'=>'Case Reviews'),
	'0' => 	array('code'=>'lod','title'=>'Library of Defense Pages'),
	'500' => array('code'=>'bon','title'=>'OCDLA Books Online Chapters'),
	'01' => array('code'=> 'other','title'=> 'Other articles'),
	'400' => array('code'=>'other','title'=>'Other articles'),
	'all' => array('code'=>'all','title'=>'All results')
);







function is_case_review($title){
	$tmp = explode("/",$title);
	return $tmp[0] == "Case_Reviews";
}

function get_group($code){
	global $result_groups;
	// if($code < 500) return $result_groups[$code];
	// else return $result_groups['500'];
}

// Now, you have an array with the results.
// print "<pre>".print_r($results,true) ."</pre>";
function result_type_name($code){
	global $keys;
	if(!isset($keys[$code])){
		// throw new Exception("Missing content type entry: ".$code);
	}
	if($code < 500) return $keys[$code]['title'];
	else return $keys['500']['title'];
}

function result_type_code($key){
	global $keys;
	if($key < 500) return $keys[$key]['code'];
	else return $keys['500']['code'];
}



function result_link($title,$href){
	$title = str_replace("_"," ",$title);
	return "<a target='_new' href='//{$href}'>{$title}</a>";
}


