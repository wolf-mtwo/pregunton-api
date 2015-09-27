<?php
require_once APPPATH . '/models/generic/session-master-model.php';

class Participant extends SessionMasterModel {

  private $schema = array(
    'name' => 'string',
    'score' => 'number',
    'userId' => 'number',
    'bookId' => 'number'
  );

  function __construct()
  {
    // Construct our parent class
    parent::__construct('participant', $this->schema);
  }
}
