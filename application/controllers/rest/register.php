<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/rest/generic/anonymousmaster.php';

class Register extends AnonymousMaster_Controller
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
    $this->save_data('user');
  }

  function users_get()
  {
    if($this->get('id')) {
      $this->load_data('user', 'id');
    }
    $this->get_all_data('user');
  }

  function users_delete()
  {
    $this->delete_data('user');
  }

  function users_put()
  {
    $this->update_data('user');
  }

  function users_options()
  {
    $this->response(null, 200);
  }
}
