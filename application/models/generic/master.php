<?php

class Master extends CI_Model {

  // table name
  private $tbl = null;
  protected $auth_user = null;
  private $schema = null;
  private $type_var = array('string', 'number');

  function __construct($table_name, $schema)
  {
    if (empty($table_name)) {
      throw new Exception('The table name is undefined');
    }
    if (empty($schema)) {
      throw new Exception('The table schema is undefined');
    }
    $this->tbl = $table_name;
    $this->schema = $schema;
  }

  function init($user) {
    $this->auth_user = $user;
  }

  // gets all items related with this database table
  function get_all()
  {
    return $this->db->get($this->tbl)->result();
  }

  function save($item)
  {
    foreach ($this->schema as $key => $type) {
      if (!isset($item[$key])) {
        throw new Exception('should provide the "' .
          $key . '" on the request');
      }
      $validate_value = $item[$key];
      //TODO validate variable type
    }
    $this->db->insert($this->tbl, $item);
    return $this->get_by_id($this->db->insert_id());
  }

  function get_by_id($id)
  {
    if (empty($id)) {
      throw new Exception('id is undefined');
    }
    $this->db->where('id', $id);
    $item = $this->db->get($this->tbl)->row_array();
    // $item = $this->db->get_where('users',array('id'=>$id))->row_array();
    if (!count($item)) {
      throw new Exception('item does not exist stored on database');
    }
    return $item;
  }

  function find($query)
  {
    foreach ($query as $key => $value) {
      $this->db->where($key, $value);
    }
    $item = $this->db->get($this->tbl)->result_array();
    return $item;
  }

  function find_one($query)
  {
    foreach ($query as $key => $value) {
      $this->db->where($key, $value);
    }
    $item = $this->db->get($this->tbl)->row_array();
    if (count($item)) {
      return $item;
    }
    return null;
  }

  function update($id, $values)
  {
    if (empty($id)) {
      throw new Exception('id is undefined');
    }
    $this->validate_schema($values);
    $this->get_by_id($id);
    $this->db->where('id', $id);
    $this->db->update($this->tbl, $values);
    return $this->get_by_id($id);
  }

  function delete($id)
  {
    $item = $this->get_by_id($id);
    if (empty($item)) {
      throw new Exception('id is undefined');
    }
    $this->db->where('id', $id);
    $this->db->delete($this->tbl);
    return $item;
  }

  function count_all()
  {
    return $this->db->count_all($this->tbl_person);
  }

  function get_paged_list($limit = 10, $offset = 0)
  {
    $this->db->order_by('id','asc');
    return $this->db->get($this->tbl_person, $limit, $offset);
  }

  function validate_schema($values)
  {
    if (!is_array($values)) {
      throw new Exception('values is not array');
    }
    if (!count($values)) {
      throw new Exception('update values should contains at least one valid element');
    }

    // foreach ($values as $key => $type) {
    //   if ($key != 'id' && !isset($this->schema[$key])) {
    //     throw new Exception("this variable '$key' is not defined on the schema");
    //   }
    // }
    foreach ($this->schema as $key => $type) {
      if (!isset($values[$key])) {
        throw new Exception('should provide the "' .
          $key . '" on the request');
      }
    }
  }
}
