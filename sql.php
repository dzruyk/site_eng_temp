<?php

include_once("common.php");

//get from BASE
/* ***********************************************************************
 * Function: XSSPrintSafe()
 *
 * @doc Converts unsafe html special characters to printing safe
 *      equivalents so we can safetly print them.
 *
 ************************************************************************/
function XSSPrintSafe($item)
{
   D("xss print safe<br>\n");
   /* Determine whether a variable is set */        
   if (!isset($item))
      return $item;

   /* Recursively convert array elements -- nikns */
   if (is_array($item)) {
      for ($i = 0; $i < count($item); $i++)
          $item[$i] = XSSPrintSafe($item[$i]);
      return $item;
   }

   return htmlspecialchars($item);
}

//Get from BASE source
function FilterSQL($item)
{
   /* Recursively filter array elements -- nikns */
  if (is_array($item)) {
    for ($i = 0; $i < count($item); $i++)
      $item[$i] = XSSPrintSafe($item[$i]);
    return $item;
  }
  //FIXME: is rly good?
  $item = addslashes($item);
  return $item;
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
    	D("DB_connect: this cannot happen!<br>\n");
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
        D("execute:this cannot happen!<br>\n");
        die();
    }
    $response = new baseResponse($this->DB_type, $res);

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
        D("DB_close: this cannot happen!<br>\n");
        die();
    }
  }
}

class baseResponse {
  private $resp;
  private $DB_type;

  public function baseResponse($DB_type, $res)
  {
    switch ($DB_type) {
    case "postgres":
      $this->DB_type = $DB_type;
      $this->resp = $res;
      break;
    default:
        D("RESP_init: this cannot happen!<br>\n");
        die();
    }
  }

  public function recordCount()
  {
    switch ($this->DB_type) {
    case "postgres":
      return pg_num_rows($this->resp);
    default:
        D("RESP_Cnt: this cannot happen$this->DB_type! <br>\n");
        die();
    }
  }

  public function fetchRow()
  {
    switch ($this->DB_type) {
    case "postgres":
      return pg_fetch_row($this->resp);
    default:
        D("RESP_fetch: this cannot happen$this->DB_type! <br>\n");
        die();
    }
  }
}

?>
