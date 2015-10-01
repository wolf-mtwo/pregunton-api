<?php
require_once APPPATH . '/models/generic/session-master-model.php';

class Book extends SessionMasterModel {

  private $schema = array(
    'title' => 'string',
    'chapters' => 'number',
    'description' => 'string',
    'userId' => 'number'
  );

  function __construct()
  {
    // Construct our parent class
    parent::__construct('book', $this->schema);
  }
}
