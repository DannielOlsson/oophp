<?php

class CContent 
{

	protected $db;
	//Plockar in $db objektet i config.php, skapar sedan en kopia av detta objekt så att det kan användas i denna klass
	public function __construct($db,$cTextFilter)
    {
        $this->db = $db;
        $this->cTextFilter = $cTextFilter;
    }


	// public function printT($res)
	// {
	// 	$newRes;
	// 	foreach($res as $val)
	// 	{
	// 		$newRes = "{$val->TYPE}{$val->published}{$val->title}";
	// 	}
	// 	return $newRes;
	// }


	public function updateContent($title, $slug, $url, $data, $type, $filter, $published, $id)
	{
		$sql = '
		  UPDATE content SET
		    title   = ?,
		    slug    = ?,
		    url     = ?,
		    data    = ?,
		    type    = ?,
		    filter  = ?,
		    published = ?,
		    updated = NOW()
		  WHERE 
		    id = ?
		';
		
		$params = array($title, $slug, $url, $data, $type, $filter, $published, $id);
		$res = $this->db->ExecuteQuery($sql, $params);
		
		if($res) {
	  		 $print = "Informationen sparades.";
		}
		else {
	  		$print = "Informationen sparades EJ.<br><pre>" . print_r($this->db->ErrorInfo(), 1) . "</pre>";
		}

		$sql = 'SELECT * FROM Content WHERE id = ?';
		$res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array($id));
		$c   = $res[0];
		
		$title  	= htmlentities($c->title, null, 'UTF-8'); 
		$url    	= htmlentities($c->url, null, 'UTF-8');
		$type  		= htmlentities($c->TYPE, null, 'UTF-8');
		$slug 		= htmlentities($c->slug, null, 'UTF-8');
		$data   	= htmlentities($c->DATA, null, 'UTF-8');
		$filter 	= htmlentities($c->FILTER, null, 'UTF-8');
		$published 	= htmlentities($c->published, null, 'UTF-8');
		
		return $print;

	}


	//Content list
	public function printContentList($type)
  {

  	$sql = "";
		if($type == "post")
		{
			$sql = "SELECT * FROM Content WHERE type = 'post';";
		}
		if($type == "page")
		{
			$sql = "SELECT * FROM Content WHERE type = 'page';";
		}
		if($type == "all")
		{
			$sql = "SELECT * FROM Content ORDER BY desc;";
		}

		$res = $this->db->ExecuteSelectQueryAndFetchAll($sql);

    	$newRes = "<br>";

    	foreach($res as $c)
   		{
   			$parameter = "";
   			if($c->TYPE == "page")
   			{
   				$parameters = "page.php&amp;url={$c->url}";
   			}
   			if($c->TYPE == "post")
   			{
   				$parameters = "blog.php&amp;slug={$c->slug}";
   			}
   			//Sanitizing before print
   			$title = $this->cTextFilter->doFilter($c->title, $c->FILTER);

	      $newRes .= "<p><a href='content.php?p=content&amp;u={$parameters}'>{$title}</a>
	      <h5>{$c->published}<h5></p>
	      <h6><a href='content.php?p=content&amp;u=content/edit.php&amp;id={$c->id}'>Uppdatera </a>
	      <a href='content.php?p=content&amp;u=content/delete.php&amp;id={$c->id}'> Ta bort </a></h6>
	      
	      <hr>
	      ";
    	}

    return $newRes;
  }


  	//Whole content
	public function printContent($type, $parameter)
	{
		$sql = "";
		if($type == "post")
		{
			$sql = "SELECT * FROM Content WHERE type = 'post' AND slug = ? AND published <= NOW();";
		}
		if($type == "page")
		{
			$sql = "SELECT * FROM Content WHERE type = 'page' AND url = ? AND published <= NOW();";
		}

		$res = $this->db->ExecuteSelectQueryAndFetchAll($sql,array($parameter));


		$newRes = "";
		foreach($res as $c)
		{
		// Sanitize content before using it.

			$title  = $this->cTextFilter->doFilter($c->title, $c->FILTER);
			$data = $this->cTextFilter->doFilter($c->DATA, $c->FILTER);
			$published = $this->cTextFilter->doFilter($c->published, $c->FILTER);
			$newRes = "
			<center><p><h3>{$title}</h3>
			<br>
			{$data}
			<br>
			<h6>Publisering: {$published}</h6></p>
			</center> 
			";
		}

    	return $newRes;

	}

	public function initDB()
	{
		$param = array();
		$sql = "DROP TABLE IF EXISTS Content;
		CREATE TABLE Content
		(
		  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
		  slug CHAR(80) UNIQUE,
		  url CHAR(80) UNIQUE,
		 
		  TYPE CHAR(80),
		  title VARCHAR(80),
		  DATA TEXT,
		  FILTER CHAR(80),
		 
		  published DATETIME,
		  created DATETIME,
		  updated DATETIME,
		  deleted DATETIME
		 
		) ENGINE INNODB CHARACTER SET utf8;";
		
		$this->db->ExecuteQuery($sql,$param);


	}

	
}

?>