<?php 
/**
 * This is a Doco pagecontroller.
 *
 */
// Include the essential config-file which also creates the $doco variable with its defaults.
include(__DIR__.'/config.php'); 
 
 
// Do it and store it all in variables in the doco container.
$doco['title'] = "404";
$doco['header'] = "";
$doco['main'] = "This is a doco 404. Document is not here.";
$doco['footer'] = "";
 
// Send the 404 header 
header("HTTP/1.0 404 Not Found");
 
 
// Finally, leave it all to the rendering phase of doco.
include(DOCO_THEME_PATH);