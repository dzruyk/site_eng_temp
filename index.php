<?
require("common.php");
require("main.php");

D("starting...<br>\n");

$user = new HUser();

$main = new MainPage();

$main->print_header();
$main->print_body();

D("end of index.php<br>\n");

?>
