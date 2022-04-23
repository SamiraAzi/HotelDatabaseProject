<?php

if (isset($_COOKIE["username"])) {

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

   $sql = "delete from HOTEL where hotel_name='$_POST[hotel_name]'";
   if($conn->query($sql))
   {
	echo "<h1> Hotel is deleted!</h1>";

   } else {
      $err = $conn->errno;
      $errtxt = $conn->error;
      if($err == 1451)
      {
	      echo "<h1>Cannot delete Hotel $_POST[guest_ID]!</h1>";
	      echo "<h1>One or more room assigned to the hotel.</h1>";
      }
      else {
	 echo "you got an error code of $err. $errtxt";
      }
   }
   echo "<br><br><a href=\"main.php\">Return</a> to Home Page.";
} else {

   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";

}

echo "<style>
h1 {
  margin-top: 50px;
  margin-left: 50px;
}
</style>"
?>
