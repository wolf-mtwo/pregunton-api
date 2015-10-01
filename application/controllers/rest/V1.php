<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/rest/generic/sessionmaster.php';

class V1 extends SessionMaster_Controller
{
  function __construct()
  {
    // Construct our parent class
    parent::__construct();
    $this->load->database();
    $this->load_model('book', $this->auth);
    $this->load_model('user', $this->auth);
    $this->load_model('participant', $this->auth);
    $this->load_model('question', $this->auth);
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

  ///////////////////////////////// participants
  function participants_post()
  {
    $this->save_data('participant');
  }

  function participants_get()
  {
    if($this->get('id')) {
      $this->load_data('participant', 'id');
    }
    // $this->get_all_data('participant');
    $where = array('bookId', 'userId');
    $this->get_all_data('participant', $where);
  }

  function participants_options()
  {
    $this->response(null, 200);
  }

  function participants_delete()
  {
    $this->delete_data('participant');
  }

  function participants_put()
  {
    $this->update_data('participant');
  }

  /////////////////////////////// QUESTION
  function questions_post()
  {
    $this->save_data('question');
  }

  function questions_get()
  {
    if($this->get('id')) {
      $this->load_data('question', 'id');
    }
    //$this->get_all_data('question');
    $where = array('bookId');
    $this->get_all_data('question', $where);
  }

  function questions_delete()
  {
    $this->delete_data('question');
  }

  function questions_put()
  {
    $this->update_data('question');
  }
  function questions_options()
  {
    $this->response(null, 200);
  }
}
