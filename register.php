<?php

include_once("common.php");
include_once("main.php");

D("register.php...<br>\n");

// Try to register user.

if (isset($_POST['register'])) {
  D("getting login, password and mail...<br>\n");

  $login = FilterSQL($_POST['login']);
  $password = FilterSQL($_POST['password']);
  $email = FilterSQL($_POST['email']);

  D("login = $login, pass = $password, mail = $email<br>\n");
  //create db connection, try to find user with same login
  //error if find(errmsg set), register otherwise(and forward to index.php)

} else {
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

$payload = $hdr . $default_register_form;

$main->set_payload($payload);

$main->print_payload();
$main->print_footer();

?>
