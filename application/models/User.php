<?php
require_once APPPATH . '/models/generic/master.php';

class User extends Master {

  private $schema = array(
    'name' => "string",
    'email' => "string",
    'password' => "string",
    'cel' => "number"
  );

  function __construct()
  {
    // Construct our parent class
    parent::__construct('user', $this->schema);
  }
}
