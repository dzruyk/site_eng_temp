<?php
require("huser.php");
require("common.php");

D("auth.php...<br>\n");

if (isset($_POST['get_passwd'])) {
  D("getting login and password...<br>\n");
  $user = new HUser();

  $login = FilterSQL($_POST['login']);
  $password = FilterSQL($_POST['password']);
  D("login = $login, pass = $password<br>\n");

  $ret = $user->auth($login, $password);
  if ($ret == TRUE) {
    //set cookie; redirrect
  } else {
    //user or password invalid
    ;
  }
} else {
  D("cant get post value...<br>\n");
}

$main = new MainPage();

$main->print_header();
$main->print_menu();


?>
