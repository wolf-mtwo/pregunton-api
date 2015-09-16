<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/api/generic/apimaster.php';

class AnonymousMaster_Controller extends REST_Controller
{
  function __construct()
  {
    session_start();
    parent::__construct();
  }
}
