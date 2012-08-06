<?php
include_once("strings.php");
include_once("config.php");

function D($str) 
{
  global $IS_DEBUG;
  if ($IS_DEBUG == 1)
    echo "===$str";
}


//return auth bar.
//if we don't use authsystem then just return stub
//if user not authorisated then
function get_auth_bar()
{
  global $default_auth_bar, $UseAuthSystem;
  //auth process
  if ($UseAuthSystem == 0) {
    return '
    <div id = "sidebar">
      <br>
      <br>
    </div>
    ';
  }
  //check cookies
  //if set and valid print user name, points, some other info
  $user = new HUser();
  D("try to get cookie...<br>\n");
  if (isset($_COOKIE['uid']) == FALSE)
    return $default_auth_bar;
  $cookie = $_COOKIE['uid'];
  D("recived cookie is $cookie");

  $uid = $user->checkUserCookie($cookie);
  if ($uid == FALSE)
    return "$default_auth_bar";
  else
    return "<div id=\"sidebar\">" .
    $user->getInfoHTML($uid) .
    "<form method=\"post\" action=\"auth.php\">" .
    "<br>
     <input type='submit' value='Выйти' name='unauth'> 
     </form>" .
    "</div>";
}


?>
