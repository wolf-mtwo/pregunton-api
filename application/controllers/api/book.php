<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/api/generic/apimaster.php';

class Book extends APIMaster_Controller
{
  function __construct()
  {
    // Construct our parent class
    parent::__construct();
    $this->load->database();
    $this->load->model('question');
  }

  function questions_post()
  {
    $this->save('question');
  }

  function questions_get()
  {
    if($this->get('id')) {
      $this->load('question', 'id');
    }
    $this->get_all('question');
  }

  function questions_delete()
  {
    $this->delete('question');
  }

  function questions_put()
  {
    $this->update('question');
  }
}
