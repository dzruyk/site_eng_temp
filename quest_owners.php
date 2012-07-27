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
$main->print_body();
$main->print_footer();

?>
