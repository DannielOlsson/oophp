<?php 
/**
 * This is a doco pagecontroller.
 *
 */
// Include the essential config-file which also creates the $doco variable with its defaults.
include(__DIR__.'/config.php'); 
 
 
// Do it and store it all in variables in the doco container.

$doco['title'] = "Hello World";
 
$doco['header'] = <<<EOD
<img class='sitelogo' src='img/favicon.ico' alt='doco Logo'/>
<span class='sitetitle'>doco webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;
 
$doco['main'] = <<<EOD
<h1>Hej Världen</h1>
<p>Detta är en exempelsida som visar hur doco ser ut och fungerar.</p>
EOD;
 
$doco['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Mikael Roos (me@mikaelroos.se) | <a href='https://github.com/mosbth/doco-base'>doco på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;
 
 
// Finally, leave it all to the rendering phase of doco.
include(DOCO_THEME_PATH);