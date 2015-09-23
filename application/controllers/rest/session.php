<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/controllers/rest/generic/anonymousmaster.php';

class Session extends AnonymousMaster_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('user');
  }

  function login_get()
  {
    try {
      $this->load_session();
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
      if (!isset($session['email'])) {
        throw new Exception('should provide a valid email');
      }
      if (!isset($session['password'])) {
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
      //FIXME
      unset($user['password']);
      $this->set_user($user);

      //generate token
      $token = $this->generate_token($user);
      $user['token'] = $token;

      $this->response($user, 200);
    } catch (Exception $e) {
      $this->response(array("error" => $e->getMessage()), 500);
    }
  }

  function login_delete()
  {
    try {
      $this->close_session();
      $this->response(null, 200);
    } catch (Exception $e) {
      $this->response(array("error" => $e->getMessage()), 500);
    }
  }

  function login_options()
  {
    $this->response(null, 200);
  }

  function generate_token($user)
  {
    $token = hash_hmac('sha512', $user['id'], $user['email']);
    session_id($token);
    session_start();
    return session_id();
  }
}
