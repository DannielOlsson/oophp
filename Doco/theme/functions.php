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

function getUrlP()
{
  $p = isset($_GET['p']) ? $_GET['p'] : null;
  return $p;
  }

 //Print array
function dump($array) {
  echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}

//--------------------------------------------------------------------

function modifyNavbar($items) {
  
  $ref = isset($_GET['p']) && isset($items[$_GET['p']]) ? $_GET['p'] : null;
  if($ref) {
    $items[$ref]['class'] .= 'selected'; 
  }
  return $items;
}
//--------------------------------------------------------------------





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
  global $doco;
  return $title . (isset($doco['title_append']) ? $doco['title_append'] : null);
}

?>