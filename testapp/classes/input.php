<?php
  class input{
    // this is used to validate the user input method
    public static function exists($type = 'post'){
      // the static function uses post method type as its default type
      switch($type){
        // the switch case then also checks if the method is either post or get.
        case 'post' :
          return (!empty($_POST)) ? true : false;
        break;
        case 'get':
          return (!empty($_GET)) ? true : false;
        break;
        default:
          return false;
        break;
      }
    }

    public static function get($item){
        if (isset($_POST[$item])) {
         // if item is sent with the post method, get the item
          return $_POST[$item];
        } else if(isset($_GET[$item])){
          // if item is sent with the get method, get the item
          return $_GET[$item];
        }
        // if the data doesn't exist, return an empty string
        return '';
    }
  }
 ?>
