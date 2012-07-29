<?php

include_once("common.php");
include_once("main.php");

D("register.php...<br>\n");

// Try to register user.





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
