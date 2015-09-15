<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/api/generic/apimaster.php';

class V1 extends APIMaster_Controller
{
  function __construct()
  {
    // Construct our parent class
    parent::__construct();
    $this->load->database();
    $this->load->model('user');
  }

  function users_post()
  {
    $this->save('user');
  }

  function users_get()
  {
    if($this->get('id')) {
      $this->load('user', 'id');
    }
    $this->get_all('user');
  }

  function users_delete()
  {
    $this->delete('user');
  }

  function users_put()
  {
    $this->update('user');
  }

  function users_options()
  {
    $this->response(null, 200);
  }
}
