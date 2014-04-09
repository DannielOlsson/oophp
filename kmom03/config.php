<?php
/**
 * Config-file for Anax. Change settings here to affect installation.
 *
 */
 
/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
 
 
/**
 * Define Anax paths.
 *
 */ //ANAX_INSTALL_PATH definieras med sökvägen som __DIR__.'/..' ger.
define('ANAX_INSTALL_PATH', '../Doco');
define('ANAX_THEME_PATH', ANAX_INSTALL_PATH . '/theme/render.php');

 
/**
 * Include bootstrapping functions.
 *
 */
include(ANAX_INSTALL_PATH . '/src/bootstrap.php');
 
 
/**
 * Start the session.
 *
 */
session_name(preg_replace('/[:\.\/-_]/', '', __DIR__));
session_start();
 
 
/**
 * Create the Anax variable.
 *
 */
$anax = array();
 
 
/**
 * Site wide settings.
 *
 */
$anax['lang']         = 'sv';
$anax['title_append'] = ' | Doco';
$anax['modernizr'] = 'js/modernizr.js';
$anax['stylesheets'] = array('css/style.css');
$anax['favicon']    = 'doco.ico';
$anax['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
//$anax['jquery'] = null; // To disable jQuery
$anax['javascript_include'] = array();
//$anax['javascript_include'] = array('js/main.js'); // To add extra javascript files
// Add js/main.js for inklusion
$anax['javascript_include'][] = 'js/main.js';
$anax['javascript_include'][] = 'js/other.js';
//$anax['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analytics

//Menu items

$menu = array(
  'callback' => 'modifyNavbar',
  'items' => array(
    'home'  => array('text'=>'Hem',  'url'=>'index.php?p=home', 'class'=>null),
    'report'  => array('text'=>'Redovisningar',  'url'=>'report.php?p=report', 'class'=>null),
    'source' => array('text'=>'Källkod', 'url'=>'source.php?p=source', 'class'=>null),
    'dice' => array('text'=>'Tärningsspelet 100', 'url'=>'dice.php?p=dice', 'class'=>null),
  ),
);