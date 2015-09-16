<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/api/generic/sessionmaster.php';

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

  ///////////////////////////////////// BOOKS

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

  function books_options()
  {
    $this->response(null, 200);
  }
}
