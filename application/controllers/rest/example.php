<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/controllers/rest/generic/anonymousmaster.php';

class Example extends AnonymousMaster_Controller
{
  function __construct()
  {
    // Construct our parent class
    parent::__construct();
  }

  function demo_get() {
    $headers = getallheaders();
    if (empty($headers['x-access-token'])) {
         echo "yes";
      } else {
         echo 'false';
         $token = $headers['x-access-token'];
         print_r($token);
         session_id($token);
         session_start();
      }
    var_dump($_SESSION);
    $session_id = session_id();
    $data = [
        'data' => $session_id,
      ];
    $this->response($data, 200);
  }

  function demo_post() {
    $code = $this->post('code');
    //$token = hash_hmac('sha512', $id, $key);
    session_id($code);
    session_start();
    $session_id = session_id();
    $_SESSION['token'] = $code;
    $data = [
        'data' => $session_id,
      ];
    $this->response($data, 200);
  }
}
