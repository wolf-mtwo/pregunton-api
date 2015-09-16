<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/api/generic/apimaster.php';

class Persist extends APIMaster_Controller
{
  function __construct()
  {
    // Construct our parent class
    parent::__construct();
    $this->load->database();
    $this->load->model('participant');
  }

  // participants
  function participants_post()
  {
    $this->save('participant');
  }

  function participants_get()
  {
    if($this->get('id')) {
      $this->load('participant', 'id');
    }
    $this->get_all('participant');
  }

  function participants_options()
  {
    $this->response(null, 200);
  }

  function participants_delete()
  {
    $this->delete('participant');
  }

  function participants_put()
  {
    $this->update('participant');
  }
}
