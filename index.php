<?
require("auth.php");
require("common.php");
require("config.php");
require("main.php");

D("starting...<br>\n");


$main = new MainPage();

$main->print_header();


//auth process
if ($UseAuthSystem == 1) {

  if (isset($_POST['get_passwd'])) {
    $user = new HUser();

    $login = FilterSQL($_POST['login']);
    $password = FilterSQL($_POST['password']);
    $ret = $user->auth($login, $password);
    if ($ret == TRUE) {
      //TODO:print user name, points, some other info
    }
  }
}



$main->print_body();
$main->print_footer();

D("end of index.php<br>\n");

?>
