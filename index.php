<?
include_once("huser.php");
include_once("common.php");
include_once("config.php");
include_once("main.php");
include_once("strings.php");

D("index.php...<br>\n");


$main = new MainPage();

$main->print_header();
$main->print_menu();


$bar = get_auth_bar();

$main->set_auth_bar($bar);
$main->print_auth_bar();


$main->print_body();

$payload = $main_description;

$main->set_payload($payload);
$main->print_payload();
$main->print_footer();

D("end of index.php<br>\n");

?>
