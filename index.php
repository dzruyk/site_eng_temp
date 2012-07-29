<?
require("huser.php");
require("common.php");
require("config.php");
require("main.php");

D("index.php...<br>\n");


$main = new MainPage();

$main->print_header();
$main->print_menu();

//auth process
if ($UseAuthSystem == 1) {
  //check cookies
  //if set and valid print user name, points, some other info

  $main->print_auth_bar();
}

$main->print_body();

$payload = '
<h2> hello, im your payload </h2>
<br>
';

$main->set_payload($payload);
$main->print_payload();
$main->print_footer();

D("end of index.php<br>\n");

?>
