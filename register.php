<?php
include_once("strings.php");
include_once("common.php");
include_once("huser.php");
include_once("main.php");

D("register.php...<br>\n");

//try to register new user
//return:
//"all_ok" if registration end with success
//error msg if we have some error 
function tryReg()
{
  global $error_name_or_pass_empty,
      $error_name_exists, $error_serv_error;
  $error = '';
  $user = new HUser();

  $login = FilterSQL($_POST['login']);
  $password = FilterSQL($_POST['password']);
  $email = FilterSQL($_POST['email']);

  D("login = $login, pass = $password, mail = $email<br>\n");
  if (strlen($login) == 0 ||
      strlen($password) == 0) {
    return $error_name_or_pass_empty;
  }

  $ret = $user->addUser($login, $password, $email);
  if ($ret == 1) {
    return $error_name_exists;
  } else if ($ret == 2) {
    return $error_serv_error;
  }   
  $user->destructor();
  return "all_ok";
}

$error = '';
$success = FALSE;
// Try to register user.

if (isset($_POST['register'])) {
  D("getting login, password and mail...<br>\n");
  $ret = tryReg();
  if ($ret == 'all_ok') 
    $success = TRUE;
  else
    $error = $ret;
}


else {
  D("can't get post value...<br>\n");
}

$main = new MainPage();

$main->print_header();
$main->print_menu();

$stub = '
    <div id = "sidebar">
      <br>
      <br>
    </div>
';

$main->set_auth_bar($stub);


$main->print_auth_bar();

$main->print_body();


$hdr = '
      <h2> Регистрация </h2>
      <br>
';

if ($success == TRUE) {
  $payload = '
      <h2> Регистрация прошла успешно, поздравляем</h2>
      <br>
  ';
} else if ($error != '') {
  $payload = $error . $default_register_form;
} else {
  $payload = $hdr . $default_register_form;
}

$main->set_payload($payload);

$main->print_payload();
$main->print_footer();

?>
