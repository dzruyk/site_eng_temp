<?php

include_once("common.php");

$default_header = '
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel = "stylesheet" type = "text/css" href = "style.css"/>

  <title> Pamlab quest</title>
</head> 

<body>
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

$default_auth_bar = '

  <div id = "sidebar">
    <br>
    <ul>
    <li> <h2> Здравствуй, незнакомец</h2>
      <form method="post" action="auth.php">
      <br>
      Логин:
      <br>
      <input type="text" id="login" value="">
      <br>
      Пароль:
      <br>
      <input type="text" id="password" value="">
      <input type="submit" value="get_passwd">
      </form>
    </ul>
  </div>
';

$default_body = '
  <div id = "page-wrapper">
    <div id = "page">
    <div id = "banner"> pamlab quest </div>
      <div class="narrowcolumn-wrapper">
        <div class="narrowcolumn">
	  <div class="posts-wrapper">
	    <div class="posts">

	    <h2> short description</h2>
	    <br>
	    bla-bla-bla-bla-bla-bla-bla-bla-bla-bla-

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

class MainPage {

  private $header;
  private $menu;
  private $auth_bar;
  private $body;
  private $footer;
  private $content;

  public function __construct() 
  {
    global $default_header, $default_menu,
        $default_auth_bar, $default_body,
        $default_footer;

    D("MainPage constructor<br>\n");
    $this->header = $default_header;
    $this->menu = $default_menu;
    $this->auth_bar = $default_auth_bar;
    $this->body = $default_body;
    $this->payload = "";
    $this->footer = $default_footer;
  }

  public function print_header() 
  {
    D("printing MainPage header...<br>\n");
    echo $this->header;
  }

  public function print_menu()
  {
    D("printing MainPage menu...<br>\n");
    echo $this->menu;
  }

  public function print_auth_bar()
  {
    D("printing MainPage auth_bar...<br>\n");
    echo $this->auth_bar;
  }

  public function print_body() 
  {
    D("printing MainPage body...<br>\n");
    echo $this->body;
  }

  public function print_payload()
  {
    D("printing MainPage content...<br>\n");
    echo $this->payload;
  }

  public function print_footer() 
  {
    D("printing MainPage footer...<br>\n");
    echo $this->footer;
  }

  public function set_header($str) 
  {
    $this->header = $str;
  }

  public function set_body($str) 
  {
    $this->header = $str;
  }

  public function set_payload($str)
  {
    $this->payload = $str;
  }
	
  public function set_footer($str)
  {
    $this->header = $str;
  }
}

class checker {

}


?>

