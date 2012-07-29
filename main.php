<?php
include_once("common.php");

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
    D("printing MainPage payload...<br>\n");
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

  public function set_auth_bar($str)
  {
    $this->auth_bar = $str;
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

