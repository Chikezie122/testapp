<?php
require_once 'core/init.php';
if(isset($_POST["submit"])) {
  if (input::exists()) { //if user has entered inputs the do the following...
    if (token::check(input::get('token'))) { //to avoid cross-site request forgery we are checking for tokens
      $validate = new validation; //instance of the validation of forms class to ensure data is checked
      $validation = $validate->check($_POST, array(
        'username' => array('required' => true),
        'password' => array('required' => true)
      ));
      if ($validation->passed()) {
        //log the user in
        $user = new user(); // instantiate the new user object

        $remember = (input::get('remember') === 'on') ? true : false; //check if the user cookie is set
        $login = $user->login(input::get('username'), input::get('password'), $remember);
        if ($login) {
          redirect::to('Admin/index-adm.php');
        }else{
          echo '<p> Logging in failed!</p>';
        }
      } else {
          // echo out the error
        foreach ($validation->errors() as $error) {
          echo $error.'<br />';
        }
      }
    }
  }
}
if (isset ($_POST["signup"])){
    header("Location: signupPage.php");
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

  <p>Username:
    <input type="text" name="username" placeholder="Enter Username" autocomplete:"off" />
    Password:<input type="password" name="password"  placeholder="Enter Password" />
    Remember Me:<input type="checkbox" id="remember" name="remember">
  </p>
  <p>
    <input type="hidden" name="token" value="<?php echo token::generate(); ?>">
    <button type="submit" value="submit" name="submit"> submit </button>
  </p>
  <p>
    New User:
    <button type = "submit" name = "signup">Sign Up</button>
  </p>
</form>
</div>
</div>
<p>&nbsp;</p>
</body>
</html>
