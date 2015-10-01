<?php
require_once APPPATH . '/models/generic/session-master-model.php';

class Question extends SessionMasterModel {

  private $schema = array(
    'bookId' => 'number',
    'title' => 'string',
    'type' => 'string',
    'chapter' => 'number',
    'response' => 'string',
    'userId' => 'number'
  );

  function __construct()
  {
    // Construct our parent class
    parent::__construct('question', $this->schema);
  }
}
