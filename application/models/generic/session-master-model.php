<?php
require_once APPPATH.'/models/generic/master.php';

class SessionMasterModel extends Master {

  function __construct($table_name, $schema)
  {
    parent::__construct($table_name, $schema);
  }



  /////////////////////////// CRUD
  // gets all items related with this database table
  // function get_all()
  // {
  //   return parent::get_all();
  // }

  // function save($item)
  // {
  ////   $item['userId'] = $this->auth['id'];
  //   return parent::save($item);
  // }

  // function get_by_id($id)
  // {
  //   return parent::get_by_id($id);
  // }
  //
  // function find($query)
  // {
  //   return parent::find($query);
  // }
  //
  // function find_one($query)
  // {
  //   return parent::find_one($query);
  // }

  function update($id, $values)
  {
    return parent::update($id, $this->validate_action($values));
  }

  function delete($id)
  {
    $this->validate_action(parent::get_by_id($id));
    return parent::delete($id);
  }

  // function count_all()
  // {
  //   return parent::count_all();
  // }
  //
  // function get_paged_list($limit = 10, $offset = 0)
  // {
  //   return parent::get_paged_list($limit = 10, $offset = 0);
  // }

  function validate_action($values)
  {
    $this->validate_schema($values);
    if ($values['userId'] != $this->auth_user['id']) {
      throw new Exception('current user is not owner of this object');
    }
    return $values;
  }
}
