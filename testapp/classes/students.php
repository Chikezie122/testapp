<?php
class students{
  private $_db,
          $_data;

  public function __construct($patient = null){
    $this->_db = DB::getInstance();
  }

  public function update($table, $fields = array(), $id = null){
    if(!$id && $this->isLoggedIn()){
      $id = $this->data()->id;
    }
    if (!$this->_db->update($table, $id, $fields)) {
      throw new Exception('There was a problem Updating');
    }
  }

  public function create($table, $fields = array()){
    if (!$this->_db->insert($table, $fields)) {
      throw new Exception('There was a problem creating your account!');
    }
  }

  public function pull($table, $field, $item){
      $data = $this->_db->get($table, array($field, '=', $item));
      if ($data->count()) {
        $this->_data = $data->first();
        return $this->_data;
      }
    return false;
  }

  public function find($patient = null){
    if ($patient) {
      $field = (is_numeric($patient)) ? 'id' : 'name';
      $data = $this->_db->get('patient_details', array($field, '=', $patient));
      if ($data->count()) {
        $this->_data = $data->first();
        return true;
      }
    }
    return false;
  }

  public function exists(){
    return (!empty($this->_data)) ? true : false;
  }

public function dateTime($item, $field){
  $dateTime = $this->_db->get('appointment', array($field, '=', $item));
  if ($dateTime->count()) {
    $this->_data = $dateTime->first();
    return true;
  }
  return false;
}

  public function data(){
    return $this->_data;
  }
} ?>
