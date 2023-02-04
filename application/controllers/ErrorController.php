<?php

class ErrorController extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function not_found() {
    $this->load->view("errors/html/error_custom/error");
  }
}