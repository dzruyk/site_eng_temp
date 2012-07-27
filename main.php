<?php

include_once("common.php");

$default_header = '
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PAM lab</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css"/>

  <title> Pamlab quest</title>
</head> 
';

$default_body = '
<body>
<div id = "menu">
    <ul>
        <li><a id = "main" href = "./index.php"> Главная</a></li>
        <li><a id = "quests" href = "./quests.php"> Квесты</a></li>
        <li><a id = "results" href = "./results.php">Результаты</a></li>
	<li><a id = "contacts" href = "./quest_owners.php"> Контакты </a></li>
    </ul>
</div>
 
';

$default_footer = '
  <footer>
  bye bye
  </footer>

</body>
</html>
';

class MainPage {
  private $header;
  private $body;
  private $footer;

  public function __construct() 
  {
    global $default_header, $default_body,
        $default_footer;
    D("MainPage constructor<br>\n");
    $this->header = $default_header;
    $this->body = $default_body;
    $this->footer = $default_footer;
  }

  public function print_header() 
  {
    D("printing MainPage header...<br>\n");
    echo $this->header;
  }

  public function print_body() 
  {
    D("printing MainPage body...<br>\n");
    echo $this->body;
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

  public function set_body() 
  {
    $this->header = $str;
  }
	
  public function set_footer()
  {
    $this->header = $str;
  }
}

class sql_handler {

}

class checker {


}


?>

