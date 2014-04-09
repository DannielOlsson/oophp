<?php

function movieTable($res)
{
	$newRes =  "<table border='1'>
		<th>Rad</th>
		<th>Id</th>
		<th>Bild</th>
		<th>Titel</th>
		<th>År</th>";
	foreach ($res as $key => $val)
	{
		
		$newRes .="<tr>
			<td>$key</td>
			<td>{$val->id}</td>
			<td><img width='80' height='40' src='{$val->image}' alt='{$val->title}'/></td>
			<td>{$val->title}</td>
			<td>{$val->YEAR}</td>
		</tr>";
	} 
	return $newRes;
}


/**
 * Function to create links for sorting
 *
 * @param string $column the name of the database column to sort by
 * @return string with links to order by column.
 */
function orderby($column) {
  return "<span class='orderby'><a href='?p=movie&u=sort.php&orderby={$column}&order=asc'>&darr;</i></a><a href='?p=movie&u=sort.php&	orderby={$column}&order=desc'>&uarr;</a></span>";
}

/**
 * Use the current querystring as base, modify it according to $options and return the modified query string.
 *
 * @param array $options to set/change.
 * @param string $prepend this to the resulting query string
 * @return string with an updated query string.
 */
function getQueryString($options, $prepend='?') {
  // parse query string into array
  $query = array();
  parse_str($_SERVER['QUERY_STRING'], $query);
 
  // Modify the existing query string with new options
  $query = array_merge($query, $options);
 
  // Return the modified querystring
  return $prepend . http_build_query($query);
}

function getHitsPerPage($hits) {
  $nav = "<p>Träffar per sida: ";
  foreach($hits AS $val) {
    $nav .= "<a href='" . getQueryString(array('hits' => $val)) . "'>$val</a> ";
  } 
  $nav .= "</p>"; 
  return $nav;
}
 
/**
 * Create navigation among pages.
 *
 * @param integer $hits per page.
 * @param integer $page current page.
 * @param integer $max number of pages. 
 * @param integer $min is the first page number, usually 0 or 1. 
 * @return string as a link to this page.
 */
function getPageNavigation($hits, $page, $max, $min=1) {
  $nav  = "<a href='" . getQueryString(array('page' => $min)) . "'>&lt;&lt; </a> ";
  $nav .= "<a href='" . getQueryString(array('page' => ($page > $min ? $page - 1 : $min) )) . "'>&lt; </a> ";
 
  for($i=$min; $i<=$max; $i++) {
    $nav .= "<a href='" . getQueryString(array('page' => $i)) . "'> $i </a> ";
  }
 
  $nav .= "<a href='" . getQueryString(array('page' => ($page < $max ? $page + 1 : $max) )) . "'> &gt;</a> ";
  $nav .= "<a href='" . getQueryString(array('page' => $max)) . "'> &gt;&gt;</a> ";
  return $nav;
}
 
function searchMovie($title)
{
 $print = " 
<form method='post'>
<fieldset>
<legend>Sök</legend>
<p><label>Titel: <input type='search' name='title' value='{$title}'/></label></p>
<input type='submit' value='Leta!'/>
<p><a href=''>Visa alla</a></p>
</fieldset>

</form>
"; 
 $title="%".$title."%";

 return $print;
}

function searchYear($year1, $year2)
{
$print = "
<form method='post'>
<fieldset>
<legend>Sök</legend>
<p><label>Skapad mellan åren: 
    <input type='text' name='year1' value='{$year1}'/>
    - 
    <input type='text' name='year2' value='{$year2}'/>
  </label>
</p>
<p><input type='submit' name='submit' value='Sök'/></p>
<p><a href=''>Visa alla</a></p>
</fieldset>
</form>
";

return $print;
}



/**
 * Create a slug of a string, to be used as url.
 *
 * @param string $str the string to format as slug.
 * @returns str the formatted slug. 
 */
function slugify($str) {
  $str = mb_strtolower(trim($str));
  $str = str_replace(array('å','ä','ö'), array('a','a','o'), $str);
  $str = preg_replace('/[^a-z0-9-]/', '-', $str);
  $str = trim(preg_replace('/-+/', '-', $str), '-');
  return $str;
}
/**
 * Create a link to the content, based on its type.
 *
 * @param object $content to link to.
 * @return string with url to display content.
 */
function getUrlToContent($content) {
  switch($content->type) {
    case 'page': return "p=content&u=page.php?url={$content->url}"; break;
    case 'post': return "p=content&u=blog.php?slug={$content->slug}"; break;
    default: return null; break;
  }
}