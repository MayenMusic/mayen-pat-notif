<?php
class db{
	public function connect()
	{
		$this -> host = "localhost";
		$this -> user = "root";
		$this -> pass = "";
		$this -> db = "mayen-notif";
		$this -> link = mysql_connect($this -> host, $this -> user, $this -> pass);
		mysql_select_db($this -> db) or die(mysql_error());
		mysql_query("set name utf-8;", $this -> link);
	}
}
?>