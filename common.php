<?php

include_once("config.php");

function D($str) 
{
  global $IS_DEBUG;
  if ($IS_DEBUG == 1)
    echo "===$str";
}

$default_header = '
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel = "stylesheet" type = "text/css" href = "style.css"/>

  <title> Pamlab quest</title>
</head> 

<body>
<br><br>
';

$default_menu = '
<div id = "menu">
    <ul>
        <li><a id = "main" href = "./index.php"> Главная</a></li>
        <li><a id = "quests" href = "./quests.php"> Квесты</a></li>
        <li><a id = "results" href = "./results.php">Результаты</a></li>
	<li><a id = "contacts" href = "./quest_owners.php"> Контакты </a></li>
    </ul>
</div>

<div id = "wrapper">
';

$default_register_form = '
<script type="text/javascript">
function validate() {
	var pass = document.getElementById(\'password\');
	var pass2 = document.getElementById(\'confirm_password\');

	var submit = document.getElementById(\'register\');

	var err = document.getElementById(\'error\');

	if (pass.value == pass2.value && pass.value.length > 0) {
		//all ok then
		submit.disabled = false;
		err.innerHTML = \'\';
	} else {
		//error
		submit.disabled = true;
		err.innerHTML = "Пароли не совпадают";
	}
}
</script>

      <form method="post" action="register.php">
      <br>
      Логин:
      <br>
      <input type="text" name="login" value="">
      <br>
      Пароль:
      <br>
      <input type="password" id="password" name="password" value="" onchange=\'validate()\'>
      <br>
      Подтвердите пароль
      <br>
      <input type="password" id="confirm_password" name="confirm_password" value="" onchange=\'validate()\'>
      <br>
      <b><span id="error"> </span></b>
      <br>
      Ваш электронный ящик
      <br>
      <input type="text" name="email" value="">
      <br><br>
      <input type="submit" id="register" name="register" value="Зарегистрироваться" disabled>
      </form>
      <br>
';

$default_auth_form = '
      <form method="post" action="auth.php">
      <br>
      Логин:
      <br>
      <input type="text" name="login" value="">
      <br>
      Пароль:
      <br>
      <input type="password" name="password" value="">
      <br>
      <input type="submit" name="get_passwd" value="Зайти">
      </form>
      <br>
      <a href = "./register.php"> Зарегистрироваться </a>
      <br>
';


$default_auth_bar = "

  <div id = \"sidebar\">
    <br>
    <ul>
    <li> <h2> Здравствуй, незнакомец</h2>
    $default_auth_form
    </ul>
  </div>
";

$default_body = '
  <div id = "page-wrapper">
    <div id = "page">
    <div id = "banner"> pamlab quest </div>
      <div class="narrowcolumn-wrapper">
        <div class="narrowcolumn">
	  <div class="posts-wrapper">
	    <div class="posts">
';

$default_footer = '
	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>

  <div id = "footer">
    sometext
  </div>
</div>

</body>
</html>
';

?>
