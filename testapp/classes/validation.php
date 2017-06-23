<?php
class validation{
  private $_passed = false,
          $_errors = array(),
          $_db = null;
  public function __construct(){
    $this->_db = DB::getInstance();
  }
    // the check function checks the data being passed where source is the method and items is an array of rules
    
  public function check($source, $items = array()){
      // item is the label name and rules is the array of rules that will be checked.
      
    foreach($items as $item => $rules){
      foreach ($rules as $rule=>$rule_value)
      {
          // using the foreach loop, we assign every required data for validation to a variable
          
        $value = trim($source[$item]);
        $item = escape($item);
          
          // check if the rule exists
          
        if ($rule === 'required' && empty($value)) {
            
            // if rule doesn't exist, show an error with the  field as an item.
          $this->addErrors("{$item} is required");
        }elseif (!empty($value)) {
            
            // the switch statement switches the rule that we want so that they check for the users input
          switch($rule){
            case 'min':
              if (strlen($value)< $rule_value) {
                $this->addErrors("{$item} must be a minimum of {$rule_value} characters.");
              }
            break;
            case 'max':
              if (strlen($value) > $rule_value){
                $this->addErrors("{$item} must not be more than {$rule_value} characters");
              }
            break;
            case 'matches':
              if ($value != $source[$rule_value]) {
                $this->addErrors("passwords Don't match");
              }
            break;
            
             // this checks if the uniqeue value passed with the name is valid.
            case 'unique':
              $check = $this->_db->get($rule_value, array($item, '=', $value));
              if ($check->count()) {
                $this->addErrors("this {$item}, {$value} already exists");
              }
            break;
          }
        }
      }
    }
    if (empty($this->_errors)) {
      $this->_passed = true;
    }
    return $this;
  }
  private function addErrors($error){
      
      // this adds errors to the errors array
      
    $this->_errors[] = $error;
  }
  public function errors(){
    return $this->_errors;
  }
    
    // this checks if the validstion is passed
  public function passed(){
    return $this->_passed;
  }
}
 ?>
