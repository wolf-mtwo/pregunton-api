<?php

require_once APPPATH . '/models/generic/master.php';

class Participant extends Master {

  private $schema = array(
    'name' => 'string',
    'score' => 'number'
  );

  function __construct()
  {
    // Construct our parent class
    parent::__construct('participant', $this->schema);
  }
}
