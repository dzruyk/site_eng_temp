<?php

$quest_form = '
<form method="POST" name="q1_form" action="quests.php">
<br>
1) 2 * 2 = 
<br>
<input type="text" value="" name="q1">
<input type="submit" value="send" name="get_answer">
</form>

<br>
<br>
1) 2  + 2 * 2 = 
<br>
<input type="text" value="" name="q2">
<input type="submit" value="send" name="get_answer">
</form>
<br>
';

$main_description = '
<h2> hello, im your payload </h2>
<br>
';

$site_devs = '
<h2> Site developers </h2>
<br>
Dz.lnly lonely dot ruyk at mail dot ru
<br>
';

$error_pass_incorrect = '
    <br>
    <h2> Имя пользователя/пароль, который вы ввели неверен </h2>
    <br>
';

$error_name_exists = '
    <br>
    <h2> Имя пользователя занято </h2>
    <br>
';

$error_name_or_pass_empty = '
    <br>
    <h2>имя пользователя или пароль не могут быть пустыми</h2>
    <br>
';

$error_serv_error = '
    <br>
    <h2> Ошибка сервера, попробуйте ещё раз </h2>
    <br>
';



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
