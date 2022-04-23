<?php

if (isset($_COOKIE["username"])) {

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

   $sql = "delete from ROOM where room_number='$_POST[room_number]'";
   if($conn->query($sql))
   {
	echo "<h1> Room is deleted!</h1>";

   } else {
      $err = $conn->errno;
      $errtxt = $conn->error;
      if($err == 1451)
      {
	      echo "<h1>Cannot delete room $_POST[room_number]!</h1>";
		    echo "<h1>One or more resveration assigned to the room.</h1>"; 
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
