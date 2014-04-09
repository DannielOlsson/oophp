<?php
$create = isset($_POST['create']) ? $_POST['create'] : null;
$title = isset($_POST['title']) ? $_POST['title'] : null;
// Check if form was submitted
if($create != null && $title != null) {
  $sql = 'INSERT INTO Movie (title) VALUES (?)';
  $db->ExecuteQuery($sql, array($title));
  $db->SaveDebug();
  header('Location: movie.php?p=movie&u=add.php&id=' . $db->LastInsertId());
  exit;
}
$print = "<form method=post>
  <fieldset>
  <legend>Skapa ny film</legend>
  <p><label>Titel:<br/><input type='text' name='title'/></label></p>
  <p><input type='submit' name='create' value='Skapa'/></p>
  </fieldset>
</form>"


/* Funktion för att spara undan sqlfråga i session under sidbyte
$db->ExecuteQuery($sql, array($title));
$db->SaveDebug();
header('Location: movie_edit.php?id=' . $db->LastInsertId());
*/


/*

    // Get debug information from session if any.
    if(isset($_SESSION['CDatabase'])) {
      self::$numQueries = $_SESSION['CDatabase']['numQueries'];
      self::$queries    = $_SESSION['CDatabase']['queries'];
      self::$params     = $_SESSION['CDatabase']['params'];
      unset($_SESSION['CDatabase']);
    }

*/
?>