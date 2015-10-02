<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/controllers/rest/generic/apimaster.php';

class SessionMaster_Controller extends APIMaster_Controller
{
  protected $auth = null;
  function __construct()
  {
    parent::__construct();
    // $method = $this->router->fetch_method();
    $method_type = $this->_detect_method();
    if ($method_type != "options") {
      $this->load_session();
    }
  }
}
