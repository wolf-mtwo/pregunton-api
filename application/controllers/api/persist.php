<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/api/generic/apimaster.php';

class Persist extends APIMaster_Controller
{
  function __construct()
  {
    // Construct our parent class
    parent::__construct();
    $this->load->database();
    $this->load->model('book');
  }

  function books_post()
  {
    $this->save('book');
  }

  function books_get()
  {
    if($this->get('id')) {
      $this->load('book', 'id');
    }
    $this->get_all('book');
  }

  function books_delete()
  {
    $this->delete('book');
  }

  function books_put()
  {
    $this->update('book');
  }
}
