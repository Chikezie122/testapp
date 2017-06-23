<?php
$user = new user();
if ($user->isLoggedIn()) {
?>

<ul>
<li><a href="update.php">Update Profile</a></li>
<li><a href="changepassword.php">change password</a></li>
<li><a href="../logout.php">Logout</a></li>
</ul>
<?php
if ($user->hasPermission('admin')) {
  //echo '<p>You are an Admin!</p>';
}
}else {
}
 ?>