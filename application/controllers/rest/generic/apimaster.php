<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class APIMaster_Controller extends REST_Controller
{
  function __construct()
  {
    session_start();
    parent::__construct();
    //TODO
    //FIXME
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS');
    header('Access-Control-Allow-Credentials: true');
    header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
  }

  /**
   * example:
   * $this->load_model('user');
   */
  function load_data($model, $id = 'id')
  {
    try {
      $item_id = $this->get($id);
      $this->model_name_validator($model, 'model');
      $this->get_params_validator($item_id, $id);
      $item = $this->$model->get_by_id($item_id);
      $this->response($item, 200);
    } catch (Exception $e) {
      $this->response(array("error" => $e->getMessage()), 500);
    }
  }

  /**
   * example:
   * $this->save_model('user');
   */
  function save_data($model, $params = array())
  {
    try {
      $this->model_name_validator($model);
      $this->array_validator($params);
      $get_params = $this->get();
      $new_item = (array)json_decode(file_get_contents("php://input"));
      foreach ($params as $value) {
        if (isset($get_params[$value])) {
          $new_item[$value] = $get_params[$value];
        } else {
          throw new Exception("$value is undefined");
        }
      }
      $item = $this->$model->save($new_item);
      $this->response($item, 200);
    } catch (Exception $e) {
      $this->response(array("error" => $e->getMessage()), 500);
    }
  }

  function delete_data($model, $id = 'id')
  {
    try {
      $item_id = $this->get($id);
      $this->get_params_validator($item_id, $id);
      $this->model_name_validator($model, 'model');
      $item = $this->$model->delete($item_id);
      $this->response($item, 200);
    } catch (Exception $e) {
      $this->response(array("error" => $e->getMessage()), 500);
    }
  }

  function get_all_data($model, $params = array())
  {
    try {
      $get_params = $this->get();
      $where = $this->get_inputs($params);
      $response = $this->$model->find($where);
      $this->response($response, 200);
    } catch (Exception $e) {
      $this->response(array("error" => $e->getMessage()), 500);
    }
  }

  function get_inputs($params)
  {
    $new_item = array();
    $get_params = $this->get();
    foreach ($params as $value) {
      if (isset($get_params[$value])) {
        $new_item[$value] = $get_params[$value];
      } else {
        throw new Exception("$value is undefined");
      }
    }
    return $new_item;
  }

  function update_data($model, $id = 'id', $params = array())
  {
    //TODO: request sould come as
    // content-type -> application/json; charset=utf-8
    try {
      $item_id = $this->get($id);
      $this->get_params_validator($item_id, $id);
      $input_values = $this->put();
      // $new_values = $this->get_inputs($params);
      // $item = array_merge($input_values, $new_values);
      $this->array_validator($input_values);
      $item = $this->$model->update($item_id, $input_values);
      $this->response($item, 200);
    } catch (Exception $e) {
      $this->response(array("error" => $e->getMessage()), 500);
    }
  }

  // session
  function get_user()
  {
    if (empty($_SESSION['user'])) {
      throw new Exception('session does not exist');
    }
    $user = $_SESSION['user'];
    return $user;
  }

  function set_user($user)
  {
    $this->array_validator($user);
    $_SESSION['user'] = $user;
  }

  function close_session()
  {
    unset($_SESSION['user']);
  }

  private function array_validator($var)
  {
    if (!is_array($var)) {
      throw new Exception("is not array");
    }
  }

  private function model_name_validator($model)
  {
    if (empty($model)) {
      throw new Exception('you must provide a valid model name');
    }
  }

  private function get_params_validator($var, $value)
  {
    if (empty($var)) {
      throw new Exception("you should provide '$value' on the indexed on the url");
    }
  }
}
