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
    $resp = $this->db->execute("SELECT * FROM users WHERE 
    uname='" . $uname . "'");

    if ($resp-> recordCount() > 0)
      return 1;

    $crypt_pass = md5($pass);

    $resp = $this->db->execute("INSERT INTO users 
        (uname, pass, email, score) VALUES ('" . $uname . "', '".
        $crypt_pass . "', '" . $mail . "', 0)"); 

    D("addUser resp is " . $resp->recordCount());

    return 0;
  }

  public function deleteUser($uname)
  {
    //FIXME: STUB
  }

  //try to auth user, if success - sets auth cookie
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

    $resp = $this->db->execute("SELECT pass FROM users where uname='" 
        . $user. "'");
    
    if ($resp->recordCount() < 1) {
      D("no records!<br>\n");
      return 2;
    }

    $result = $resp->fetchRow();
    D("md5 from db = $result[0]<br>\n");
    if ($result[0] == $crypt_pass) {
      D("passwords match<br>\n");
      $this->setUserCookie($user, $crypt_pass);
      return 0;
    }

    return 2;
  }

  public function setUserCookie($user, $pass)
  {
    $resp = $this->db->execute("SELECT uid FROM users WHERE  uname='" 
        . $user. "' AND pass ='" . $pass . "'");
    
    if ($resp->recordCount() < 1) {
      D("cant find this user in table<br>\n");
      //we havent this user in table
      return;
    }
    $resp = $resp->fetchRow();
    $uid = $resp[0];

    $expire = time() + 60 * 60 * 24 * 30;

    $ncookie = md5($user + md5($pass) + md5($expire));

    $ret = setcookie("uid", $ncookie, $expire);
    if ($ret == FALSE) {
      D("cant set cookie, just quit<br>\n");
      return;
    }

    D("cookie is set and its val = $ncookie");

    //FIXME: now we not check db errors

    //remove previosly set cookies
    $this->db->execute("DELETE FROM cookies WHERE uid='" . $uid . "'");

    //add new

    $this->db->execute("INSERT INTO cookies (uid, cookie) VALUES ('" .
        $uid . "', '" . $ncookie . "')");
  }
  
  //check cookie, if valid returns uid
  //if no cookie - FALSE
  public function checkUserCookie($cookie)
  {
    $resp = $this->db->execute("SELECT uid FROM cookies WHERE cookie='" . $cookie . "'");
    //FIXME: STUB
    if ($resp->recordCount() < 1) {
      D("check user cookie failed<br>\n");
      return FALSE;
    }
    $result = $resp->fetchRow();
    return $result[0];
  }

  public function hasRole($roleNeed)
  {
    //FIXME: STUB
  }

  //try to get some info about user
  // return FALSE if cant find user
  // return str with description otherwise
  public function getInfoHTML($uid)
  {
    $this->db->execute("SELECT uname, score FROM users WHERE uid='" . $uid . "'");
    if ($resp->recordCount() < 1) {
      D("get info HTML failed! this is should not happened<br>\n");
      return FALSE;
    }
    $result = $resp->fetchRow();

    return "<br>$result[0] <br> score=$result[1]";
  }
  
  //FIXME: this function rly usefull?
  public function destructor()
  {
    $this->db->close();
  }
}

?>

