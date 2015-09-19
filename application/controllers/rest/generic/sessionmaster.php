<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/controllers/rest/generic/apimaster.php';

class SessionMaster_Controller extends APIMaster_Controller
{
  private $auth = null;
  function __construct()
  {
    parent::__construct();
    $this->load_user();
  }

  function load_user()
  {
    try {
      $this->auth = $this->validate_user($this->get_user());
    } catch (Exception $e) {
      $this->response(array("error" => $e->getMessage()), 401);
    }
  }

  private function validate_user($user)
  {
    if (empty($user['id'])) {
      throw new Exception('id does not exist');
    }
    if (empty($user['email'])) {
      throw new Exception('email does not exist');
    }
    if (empty($user['password'])) {
      throw new Exception('password does not exist');
    }
    if (empty($user['name'])) {
      throw new Exception('name does not exist');
    }
    if (empty($user['cel'])) {
      throw new Exception('cel does not exist');
    }
    return $user;
  }
}
