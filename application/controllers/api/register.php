<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/api/generic/master.php';

class Register extends Master_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('user');
  }

  function userssssasd_post()
  {
    $input = (array)json_decode(file_get_contents("php://input"));
    $newPerson = $input;
    $person = $this->user->save($newPerson);
    $this->response($person, 200);
  }
}
