<?
require("common.php");
require("main.php");

/* 
 * print ui and
 * result table(need to create sql connection)
 *
 */

D("building result table...<br>\n");

$main = new MainPage();

$main->print_header();
$main->print_menu();
$main->print_auth_bar();
$main->print_body();
$main->print_payload();
$main->print_footer();



?>
