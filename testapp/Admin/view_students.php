<?php
require_once '../core/init.php';
$user = new user();
if (!$user->isLoggedIn()) {
  redirect::to('../login.php');
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/forminputlayout.css" rel="stylesheet" type="text/css" />
<link href="../css/adminlayout.css" rel="stylesheet" type="text/css" />
<link href="print.css" rel="stylesheet" type="text/css" media="print" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Students</title>
</head>

<body>

<div id="wrapper"> <!--main wrapper-->

  <div id="topbar"> <!--topbar -->
  <div id="topmenu">  
  	<ul>
        <li><a href="Admin/index-adm.php">Home</a> </li>
        <li><a href="logout.php">Logout</a> </li>
	</ul> 
    </div>
      
  </div> <!--topbar-->
  
 <!-- <div id="searchstrip"><input type="text" placeholder="Enter Patient ID/name"/> <input type="submit" value="search" />  
  </div>-->
  
    
  <div id="mainsection"> <!--maincontent section-->

    	<div id="leftbar"> <!--leftbar section-->
      
        <ul>
          <li><a href="addstudents.php">New Student</a></li>
            <li><a href="ciew_students.php">Manage Students</a></li>
		</ul>

 		</div> <!-- end of leftbar section-->
    
        <div id="rightbar"> <!--rightbar section-->
        </div> <!--end rightbar section-->
         
        <div id="maincontent"> <!-- maincontent section-->
        <h2>Registered Students</h2>
       <?php
       $student_data = DB::getInstance()->query("SELECT id,fullname,gender, scores FROM students")->results();
        echo "
        <table>
        <tr>
        <th>S/N</th>
        <th>Students Full Name </th>
        <th>Students Gender </th>
        <th> Scores </th>
        </tr>
       ";
       foreach($student_data as $row)
       {
        echo "<tr>";
        echo "<td>" .$row['id'] . "</td>";
        echo "<td>" .$row['fullname'] . "</td>";
        echo "<td>" .$row['gender'] . "</td>";
        echo "<td>" .$row['scores']. "</td>";
        echo "</tr>";
        }
        echo "</table>";
       ?>

        </div> <!-- end maincontent section-->
         
  </div> 
  <!--maincontent section--></div>
</body>
</html>
