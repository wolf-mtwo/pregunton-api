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

  function login_get()
  {
    try {
      $user = $this->get_user();
      $this->response($user, 200);
    } catch (Exception $e) {
      $this->response(array("error" => $e->getMessage()), 500);
    }
  }

  function login_post()
  {
    try {
      $session = (array)json_decode(file_get_contents("php://input"));
      if (!$session['email']) {
        throw new Exception('should provide a valid email');
      }
      if (!$session['password']) {
        throw new Exception('should provide a valid password');
      }
      $where = array(
        'email' => $session['email'],
        'password' => $session['password']
      );
      $user = $this->user->find_one($session);
      if (!$user) {
        throw new Exception('user not found');
      }
      $this->set_user($user);
      $this->response($user, 200);
    } catch (Exception $e) {
      $this->response(array("error" => $e->getMessage()), 500);
    }
  }

  function logout_post()
  {
    try {
      $this->close_session();
      $this->response(null, 200);
    } catch (Exception $e) {
      $this->response(array("error" => $e->getMessage()), 500);
    }
  }
}
