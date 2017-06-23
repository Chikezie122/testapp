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
        <title>Admin</title>
    </head>

    <body>
        <div id="wrapper">
            <!--main wrapper-->
            <div id="topbar">
                <!--topbar -->
                <div id="topmenu">
                    <ul>
                        <li><a href="../Admin/index-adm.php">Home</a> </li>
                        <?php include '../includes/menu.php'; ?>
                    </ul>
                </div>
            </div>
            <!--topbar-->
        </div>
        <div id="mainsection">
            <!--maincontent section-->
            <?php
    if (session::exists('index_adm')) {
        echo '<p>'.session::flash('index_adm').'</p>'; //displaying a one time message for this page, like a success message
    }
?>
                <div id="maincontent">
                    <!-- maincontent section-->
                    <h2>Administrator Page </h2>
                    <table align="center">
                        <tr>
                            <td><img src="../images/new_students.jpg" border=3 height=100 width=100/></td>
                            <td><img src="../images/student_images%20(1).jpg" /></td>
                            <td><img src="../images/scores_images%20(1).jpg" /></td>
                        </tr>
                        <tr>
                            <td><a href="addstudents.php">New Student</a></td>
                            <td><a href="view_students.php">Manage Students</a></td>
                            <td><a href="generate_scores.php">Generate Scores</a></td>
                        </tr>
                    </table>
                </div>
                <!-- end maincontent section-->
        </div>
        <!--maincontent section-->
    </body>

    </html>