<?
include_once("huser.php");
include_once("common.php");
include_once("config.php");
include_once("main.php");
include_once("strings.php");

/* 
 * print ui and
 * result table(need to create sql connection)
 *
 */

D("building quests...<br>\n");

function validate_quest()
{

}

$main = new MainPage();

$main->print_header();
$main->print_menu();

$bar = get_auth_bar();
$main->set_auth_bar($bar);

$main->print_auth_bar();


$main->print_body();

$payload = $quest_form;

$main->set_payload($payload);

$main->print_payload();
$main->print_footer();

?>
