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

         <div id="leftbar"> <!--leftbar section-->

        <ul>
          <?php include '../includes/leftsidebar.php'; ?>
            </ul>

        </div>
            <?php
    if (session::exists('index_adm')) {
        echo '<p>'.session::flash('index_adm').'</p>'; //displaying a one time message for this page, like a success message
    }

    if (isset($_POST['generate'])){
            function randomGen($min, $max, $quantity) {
            $numbers = range($min, $max);
            shuffle($numbers);
            $scores = array_slice($numbers, 0, $quantity);
            /*echo '<pre>'; print_r($scores); echo '</pre>';*/
            foreach ($scores as $marks)
            {
                $mark = $marks;
               /*echo $mark;*/  
                $data = DB::getInstance()->insert('students', array('scores' => $mark));
            }
        }

        $score = randomGen(0,100,100);

    }
?>
                <div id="maincontent">
                    <!-- maincontent section-->
                    <h2>Generate Scores</h2>
                    <form action="" method = "post">
                        <p>Click this button to display a random number that does not repeat...</p>
                        <p><input type="submit" value="Generate" name = 'generate'></p>
                    </form>
                </div>
                <!-- end maincontent section-->
        </div>
        <!--maincontent section-->
    </body>

    </html>