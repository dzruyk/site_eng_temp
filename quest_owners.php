<?
require("common.php");
require("main.php");

/* 
 * print ui and
 * result table(need to create sql connection)
 *
 */

D("quest owners...<br>\n");

$main = new MainPage();

$main->print_header();
$main->print_menu();
$main->print_auth_bar();
$main->print_body();

$payload = '
<h2> Site developers </h2>
<br>
Dz.lnly lonely dot ruyk at mail dot ru
<br>

';

$main->set_payload($payload);

$main->print_payload();
$main->print_footer();



?>
