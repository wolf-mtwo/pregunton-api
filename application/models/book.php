<?php

require_once APPPATH . '/models/generic/master.php';

class Book extends Master {

  private $schema = array(
    'title' => 'string',
    'chapters' => 'number',
    'description' => 'string'
  );

  function __construct()
  {
    // Construct our parent class
    parent::__construct('book', $this->schema);
  }
}
