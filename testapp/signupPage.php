<?php 
require_once 'core/init.php';
$user = new user();
$data = DB::getInstance();
    //check if user has posted the appointment info
     if (input::exists()) { 
         //instantiate validation class
              $validate = new validation(); 
         // check the validation of the contents the rows of the table in our database.
              $validation = $validate->check($_POST, array(
                  'fullname' => array(
                  // check certain requirements of the username
                  'required' => true,
                  'min'    => 2,
                  'max'    => 50,
                  // the line below post the data to the unique users table
                  'unique' => 'users'
                    ),
                  'username' => array(
                  'required' => true,
                  'min'   => 2,
                  'max'    => 20
                  ),
                'email' => array(
                  'required' => true
               ),
                  'password' => array(
                     'required' => true,
                     'min'      => 6
              ),
                  'confirm_password' => array(
                     'required' => true,
                     'matches'  => 'password',
                     'min'      => 6
              )
              ));
                                             
            // check if the users inputs were complete
              if ($validation->passed()) {
                $user = new user();
                
                  $salt = hash::salt(32);
               
              try{
                $user->create(array(
                    'fullname'     => input::get('fullname'),
                    'username'     => input::get('username'),
                    'email'        => input::get('email'),
                    'password'     => hash::make(input::get('password'),$salt),
                    'salt'         => $salt,
                    'groupes'        => 1
                  ));
                   session::flash('Admin/index-adm', 'User created successfully!');
                    redirect::to('Admin/index-adm.php');
                    }
                  catch(Exception $e){
            die($e->getMessage());
          }
        } else {
          foreach($validation->errors() as $error){
            echo "<p><b>Error! </b>".$error."</p><br>";
          }
      }
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
<div id="container">
<div id="log">
<form action="" method="post" id="form">

  <p>
      Fullname:
    <input type="text" name="fullname" placeholder="Enter Fullname" />
    Username:
    <input type="text" name="username" placeholder="Enter Username" />
     email:
    <input type="text" name="email" placeholder="Enter Email Address" />
    Passord:<input type="password" name="password"  placeholder="Enter Password" />
    Confirm Passord:<input type="password" name="confirm_password"  placeholder="Confirm Password" />
    Remember Me:<input type="checkbox" id="remember" name="remember">
  </p>
  <p>
    <input type="submit" value="submit"/>
  </p>
    </form>
    </div>
    </div>
    </body>
</html>