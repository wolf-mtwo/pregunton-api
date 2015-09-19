<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/rest/generic/anonymousmaster.php';

class Example extends AnonymousMaster_Controller
{
  function __construct()
  {
    // Construct our parent class
    parent::__construct();
    // $this->load->database();
    // $this->load->model('user');
  }

  // function demo_get()
  // {
  //
  //   // $this->save_data('user');
  // }

  function index() {
      if ($this->auth->loggedin())
          redirect('admin');
      else
          $this->load->view('admin/login');
  }

  function demo_get() {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $remember = $this->input->post('remember') ? TRUE : FALSE;

      if ($this->auth->authenticate($username, $password, $remember))
          //redirect('admin');
          echo "si";
      else
        echo "no";
          //redirect('admin/login');
  }
}
