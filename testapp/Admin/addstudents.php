<?php
require_once '../core/init.php';
$user = new user();
if (!$user->isLoggedIn()) {
  redirect::to('../login.php');
}
$data = DB::getInstance();
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/forminputlayout.css" rel="stylesheet" type="text/css" />
<link href="../css/adminlayout.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Students</title>
</head>

<body>

<div id="wrapper"> <!--main wrapper-->

  <div id="topbar"> <!--topbar -->
  <div id="topmenu">
  	<ul>
        <li><a href="Admin/index-adm.php">Home</a> </li>
        <!-- <?php include 'includes/menu.php'; ?> -->
	</ul>
    </div>

  </div> <!--topbar-->

  <div id="searchstrip"><input type="text" placeholder="Enter Student's username"/> <input type="submit" value="search" />
  </div>


  <div id="mainsection"> <!--maincontent section-->
<!-- 
      <div id="leftbar"> leftbar section
            
                    <ul>
                      <?php include 'includes/leftsidebar.php'; ?>
                    </ul>
            
                 </div> end of leftbar section
            
                    <div id="rightbar"> rightbar section -->

       <!--  <div id="rightbottom"> -->
       

        <div id="maincontentlong"> <!-- maincontent section-->
            <?php
          if (input::exists()) { //check if user has posted the appointment info
              $validate = new validation(); //instantiate validation class
              $validation = $validate->check($_POST, array(
                  'fullname' => array(
                  'required' => true
                    ),
                  'username' => array(
                  'required' => true
                  ),
                'email' => array(
                  'required' => true
               ),
                  'password' => array(
                    'required' => true
              ),
                  'gender' => array(
                    'required' => true  
            )
              ));
              if ($validation->passed()) {
                $student = new students();
              try{
                $student->create('students', array(
                    'fullname'         => input::get('fullname'),
                    'username'         => input::get('username'),
                    'email'         => input::get('email'),
                    'gender'      => input::get('gender'),
                    'password'      => input::get('password')
                  ));
                  echo '<p>New Record created Successfully! <a href="index.php">click here</a> to go to Home page</p>';
          } catch(Exception $e){
            die($e->getMessage());
          }
        } else {
          foreach($validation->errors() as $error){
            echo "<p><b>Error! </b>".$error."</p><br>";
          }
      }
  }
                  ?>

            <h1>New Student</h1>
<form action = "" method ="post" id="form">
    <fieldset>
      <legend>Personal Info</legend>
      Fullname:
        <input class="fulllength" type="text" name="fullname" placeholder="Enter Full Name" value = "<?php echo escape(input::get('fullname'));?>" />
      Username:
        <input class="fulllength" type="text" name="username" placeholder="Enter username" value = "<?php echo escape(input::get('username'));?>" />
      Gender:
        <select name="gender" class="fulllength" value = "<?php echo escape(input::get('gender'));?>">
          <option value="Male" > Male </option>
          <option value="Female">Female </option>
        </select>
        eMail Address:
          <input type="text" name="email" class="fulllength" value = "<?php echo escape(input::get('email'));?>"/>
        Password:
          <input type="password" name="password" class="fulllength" value = "<?php echo escape(input::get('password'));?>"/>
      </fieldset>
  <Input type="submit" value="submit" class="fulllength"/>

</form>

        </div>
        <!-- </div> --> <!-- end maincontent section-->

<!--   </div> -->
  <!--maincontent section--></div>
</body>
</html>
