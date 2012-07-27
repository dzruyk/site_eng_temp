<?php

include_once("common.php");

$default_header = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>header</title>
</head> 
';

$default_body = '
<body>
  <h1> welcome to hack quest </h1>
  <br>
  description
  <br>
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

