<?php

class HUser {
  private $db;

  public function HUser()
  {
    global  $DB_name, $DB_type, $DB_user,
    $DB_password, $DB_host, $DB_port;

    //new db connection init
    $db = new baseCon($DB_type);
    //FIXME: complete me
    $db->connect($DB_name, $DB_user, $DB_password, $DB_host, $DB_port);
    
    $this->db = $db;
  }

  public function auth($user, $pass)
  {
    //stub
    return TRUE;
  }

  public function hasRole($roleNeed)
  {

  }
}

?>

