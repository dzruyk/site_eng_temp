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
  private $connection;

  public function baseCon($type)
  {
    D("new baseCon initialisation...<br>\n");
    if ($type != "postgres") {
      echo "<h2>UNKNOWN DB TYPE</h2><br>\n";
      die();
    }
    $this->DB_type = $type;
    $this->connection = FALSE;
  }

  public function connect($db, $username, $pass, $host, $port)
  {
    $this->DB_name = $db;
    $this->DB_username = $username;
    $this->DB_password = $pass;
    $this->DB_host = $host;
    $this->DB_port = $port;

    switch ($this->DB_type) {
    case "postgres":  
      $con = pg_connect("host=$host port=$port dbname=$db user=$username password=$pass");
      if ($con == FALSE) {
        echo "cant connect to db!<br>\n";
        die();
      }
      $this->connection = $con;
      break;
    default:
    	D("this cannot happen!<br>\n");
	die();
    };
  }

  //return mixed or FALSE if err
  public function execute($sql)
  {
    if ($this->connection == FALSE) {
      D("sql class. connection == FALSE");
      die();
    }
    switch($this->DB_type) {
      case "postgres":
        $res = pg_query($this->connection, $sql);
      break;
      default:
        D("this cannot happen!<br>\n");
        die();
    }
    $response = new baseResponse($type, $res);

    return $response;
  }
  public function close()
  {
    if ($this->connection == FALSE) {
      D("sql class. connection == FALSE");
      die();
    }
    switch($this->DB_type) {
      case "postgres":
        pg_close($this->connection);
        break;
      default:
        D("this cannot happen!<br>\n");
        die();
    }
  }
}

class baseResponse {
  private $resp;
  private $type;

  public function baseResponse()
  {


  }

  public function fetchRow($res)
  {


  }
}


?>
