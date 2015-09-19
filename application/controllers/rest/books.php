<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/rest/generic/apimaster.php';

class Books extends APIMaster_Controller
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
      $this->load_data('question', 'id');
    }
    $this->get_all_data('question');
    // $this->get_all('question', 'bookId');
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
