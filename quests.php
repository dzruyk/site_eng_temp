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


//try validate quest tasks, return error message if fail
//if success - returns all_ok, updates user stats in table
$answers = array (
  "1" => "4",
  "2" => "6"
);

$points = array (
  "1" => "25",
  "2" => "40",
);

function try_update_score($quest_num)
{
  global $points, $error_task_already_done;

  $user = new HUser();
  D("try to update score...<br>\n");
  //this is should not happen
  if (isset($_COOKIE['uid']) == FALSE)
    die();
  $cookie = $_COOKIE['uid'];

  $uid = $user->checkUserCookie($cookie);
  if ($uid == FALSE)
    die();

  if ($user->updateScore($uid, $quest_num, $points[$quest_num]) == FALSE) {
    return $error_task_already_done;
  }

  return 'all_ok';
}

function try_validate_quest()
{
  global $answers, $error_wrong_answer;
  
  D("===================================<br>\n");
  foreach ($_POST as $key => $item) {
    echo "$key => $item";
    echo "<br>\n";
  }
  D("===================================<br>\n");


  foreach ($answers as $key => $item) {
    if (isset($_POST[$key])) {
      if ($_POST['answer'] == $item)
        return try_update_score($key);
      else {
        D("answer error, got = " . $_POST['answer'] .
	" need = $item <br>\n");
        return $error_wrong_answer;
      }
    }
  }
}

$err = try_validate_quest();

$main = new MainPage();

$main->print_header();
$main->print_menu();

$bar = get_auth_bar();
$main->set_auth_bar($bar);

$main->print_auth_bar();


$main->print_body();

if ($err != 'all_ok')
	$payload = $err . $quest_form;
else
	$payload = $quest_form;

$main->set_payload($payload);

$main->print_payload();
$main->print_footer();

?>
