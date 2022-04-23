<?php

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

   $sql = "insert into ROOM values ('$_POST[hotel_name]','$_POST[room_number]','$_POST[room_price]','$_POST[occupancy]','$_POST[room_type]')";
   if($conn->query($sql))
   {

      echo "<h1>New Room for $_POST[hotel_name] added!</h1> ";

   } else {
      $err = $conn->errno;
      if($err == 1062)
      {
	 echo "<h1>Room number for the Hotel already exists!</h1>";
      }
      else if ($err == 1452) {
	 echo "<h1>Hotel $_POST[hotel_name] does not exist!</h1>";
      }
      else {
	 echo "error number $err";
      }

   }
   echo "<a href=\"main.php\">Return</a> to Home Page.";
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
