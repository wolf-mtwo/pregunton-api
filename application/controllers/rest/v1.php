<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/rest/generic/sessionmaster.php';

class V1 extends SessionMaster_Controller
{
  function __construct()
  {
    // Construct our parent class
    parent::__construct();
    $this->load->database();
    $this->load->model('book');
    $this->load->model('user');
  }

  ///////////////////////////////////// BOOKS
  function books_post()
  {
    $this->save_data('book');
  }

  function books_get()
  {
    if($this->get('id')) {
      $this->load_data('book', 'id');
    }
    $this->get_all_data('book');
  }

  function books_delete()
  {
    $this->delete_data('book');
  }

  function books_put()
  {
    $this->update_data('book');
  }

  function books_options()
  {
    $this->response(null, 200);
  }
}
