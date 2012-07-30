<?php

include_once("common.php");

function FilterSQL($str)
{
  D("FilterSQL STUB! FIXME!<br>\n");
  
  return $str;
}

class baseCon {
	//can be only psql now;
  private $DB_type;
  private $DB_name;
  private $DB_username;
  private $DB_password;
  //now not used
  private $DB_host;
  private $DB_port;

  public function baseCon($type)
  {
    D("new baseCon initialisation...<br>\n");
    if ($type != "postgres") {
      echo "<h2>UNKNOWN DB TYPE</h2><br>\n";
      die();
    }
    $this->DB_type = $type;
  }

  public function connect($db, $username, $pass, $host, $port)
  {
    
  }

  public function execute($sql, $start_row = 1, $num_rows = -1)
  {

  }

  public function error_msg()
  {

  }

}


?>
