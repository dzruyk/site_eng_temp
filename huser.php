<?php
include_once("common.php");
include_once("sql.php");

class HUser {
  private $db;

  public function HUser()
  {
    D("Huser init<br>\n");
    global  $DB_name, $DB_type, $DB_user,
    $DB_password, $DB_host, $DB_port;

    //new db connection init
    $db = new baseCon($DB_type);
    //FIXME: complete me
    $db->connect($DB_name, $DB_user, $DB_password, $DB_host, $DB_port);
    
    $this->db = $db;
  }

  //try to add new user
  //returns:
  //0 if all ok and user added
  //1 if user exists
  //2 otherwise
  public function addUser($uname, $pass, $mail)
  {
    
    
  return 2;
  }

  public function deleteUser($uname)
  {
    //FIXME: STUB
  }

  //return:
  //0 if all ok
  //1 if uname or pass dont set
  //2 if user not exist or pass incorrect
  
  public function auth($user, $pass)
  {
    $crypt_pass = md5($pass);
    
    if (strlen($user) == 0 ||
        strlen($pass) == 0)
      return 1;

    $resp = $this->db->execute("SELECT pass FROM users where uname='" . $user. "'");
    
    if ($resp->recordCount() < 1) {
      D("no records!<br>\n");
      return 2;
    }

    $result = $resp->fetchRow();
    D("md5 from db = $result[0]<br>\n");
    if ($result[0] == $crypt_pass)
      return 0;

    return 2;
  }

  public function hasRole($roleNeed)
  {

  }

  public function getInfoHTML()
  {

  }
  
  //FIXME: this function rly usefull?
  public function destructor()
  {
    $this->db->close();
  }
}

?>

