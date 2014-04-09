<?php 

// Funktion för att hämta URL
function getCurrentUrl() {
  $url = "http";
  $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
  $url .= "://";
  $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
    (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");
  $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
  return $url;
}
 
// anropa funktionen så här
//echo getCurrentUrl();
// ---------------------------------------------------------------------------------------------

// Funktion för att skriva ut array
function dump($array) {
  echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}
 
// anropa funktionen så här


// ------------------------------------------------------------------

/**
 * Theme related functions. 
 *
 */
 
/**
 * Get title for the webpage by concatenating page specific title with site-wide title.
 *
 * @param string $title for this page.
 * @return string/null wether the favicon is defined or not.
 */
function get_title($title) {
  global $anax;
  return $title . (isset($anax['title_append']) ? $anax['title_append'] : null);
}

?>