<?php
include_once("huser.php");
include_once("common.php");
include_once("config.php");
include_once("main.php");
include_once("sql.php");

D("auth.php...<br>\n");

function tryAuth()
{
  $error = '';
  $user = new HUser();

  $login = FilterSQL($_POST['login']);
  $password = FilterSQL($_POST['password']);
  D("login = $login, pass = $password<br>\n");

  $ret = $user->auth($login, $password);
  if ($ret == 0) {
    D("auth complete<br>\n");
    //redirect to main page
    echo '<script type="text/javascript">
    window.location.pathname = \'./index.php\'
    </script>
    ';
  } else {
    //user or password invalid
    D("user or pass is invalid<br>\n");
    $error = '
    <br>
    <h2> Имя пользователя/пароль, который вы ввели неверен </h2>
    <br>
    ';
    return $error;
  }
  $user->destructor();
  return 'all_ok';
}

$error = '';
$success = FALSE;

// Try to auth user.
if (isset($_POST['get_passwd'])) {
  D("getting login and password...<br>\n");
  $ret = tryAuth();
  if ($ret == 'all_ok')
    $success = TRUE;
  else
    $error = $ret;
} else {
  D("can't get post value...<br>\n");
}

$main = new MainPage();

$main->print_header();
$main->print_menu();

$stub = '
    <div id = "sidebar">
      <br>
      <br>
    </div>
';

$main->set_auth_bar($stub);

$main->print_auth_bar();

$main->print_body();

if ($error != '')
  $payload = $error . $default_auth_form;
else
  $payload = $default_auth_form;

$main->set_payload($payload);

$main->print_payload();
$main->print_footer();

?>
