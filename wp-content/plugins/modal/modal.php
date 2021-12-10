<?php

/**
	*
	* @package ModalPlugin
	*
	**/
	
/**
 *
 * Plugin Name: Modal Plugin
 * Plugin URI: 
 * Description: Front-end Modal Plugin for WordPress
 * Author: Jack Brainard
 * Author URI: 
 * Licence: GPLv2 or later
 * Text Domain: modal-plugin
 */
 
 
 /**
  *
  * https://codex.wordpress.org/Writing_a_Plugin
Readme File
If you want to host your Plugin on https://wordpress.org/plugins/, you need to create a readme.txt file within your plugin directory in a standardized format. You can use the automatic plugin 'readme.txt' generator.
	*/
	
	
$modalScriptPath;

$modalScriptDependencies;

$modalTranslations;





function modalInit(){
	// print "<h1>Hello World!</h1>";
	wp_register_script(
		"modal",
		plugin_dir_url(__FILE__)."lib/modal.js",
		array("jquery"),
		"0.1",
		true // include in footer
	);
	
	wp_register_script(
		"modal-plugin",
		plugin_dir_url(__FILE__)."lib/plugin.js",
		array("modal"),
		"0.1",
		true // include in footer
	);
	
	/*
	wp_register_script(
		"ccvalidate",
		plugin_dir_url(__FILE__)."lib/validate.js",
		array("jquery"),
		"0.1",
		true // include in footer
	);
	
	wp_register_script(
		"ccrender",
		plugin_dir_url(__FILE__)."lib/render.js",
		array("jquery"),
		"0.1",
		true // include in footer
	);
	*/
	
	wp_enqueue_script("modal-plugin");
	// wp_enqueue_script("ccdata");
	// wp_enqueue_script("ccvalidate");
	// wp_enqueue_script("ccrender");

	// load_plugin_textdomain()
}

add_action("init","modalInit");




