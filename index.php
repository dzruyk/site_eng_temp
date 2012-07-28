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

  if (isset($_POST['get_passwd'])) {
    $user = new HUser();

    $login = FilterSQL($_POST['login']);
    $password = FilterSQL($_POST['password']);
    $ret = $user->auth($login, $password);
    if ($ret == TRUE) {
      //TODO:print user name, points, some other info
    } else {
      //we need auth request, printing default auth_bar
      ;
    }

    $main->print_auth_bar();
  }
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
