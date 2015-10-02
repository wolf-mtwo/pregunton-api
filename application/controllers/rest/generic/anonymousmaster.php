<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/controllers/rest/generic/apimaster.php';

class AnonymousMaster_Controller extends APIMaster_Controller
{
  function __construct()
  {
    parent::__construct();
  }
}
