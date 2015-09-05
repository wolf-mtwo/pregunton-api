<?php

require_once APPPATH . '/models/generic/master.php';

class Question extends Master {

  private $schema = array(
    'bookId' => 'number',
    'title' => 'string',
    'type' => 'string',
    'chapter' => 'number',
    'response' => 'string'
  );

  function __construct()
  {
    // Construct our parent class
    parent::__construct('question', $this->schema);
  }
}
