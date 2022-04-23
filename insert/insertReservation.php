<?php
if (isset($_COOKIE["username"])) {


  $username = $_COOKIE["username"];
  $password = $_COOKIE["password"];

  $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
  if($mysqli->connect_errno)
  {
     echo "Connection Issue!";
     exit;
  }

  $sql = "insert into RESERVATION (reservation_No, guest_ID, hotel_name, room_number, check_in_date, check_out_date, no_of_guest) values ('$_POST[reservation_No]','$_POST[guest_ID]','$_POST[hotel_name]','$_POST[room_number]','$_POST[check_in_date]','$_POST[check_out_date]','$_POST[no_of_guest]')";
  if($conn->query($sql))
  {
  	echo "<h1> Reservation is successfully added!</h1>";

  } else {
     $err = $conn->errno;
     if($err == 1062)
     {
        echo "<h1>Reservation Number $_POST[reservation_No] already exists!</h1>";
     } else {
        echo "<p>MySQL error code $err </p>";
     }
  }

  echo "<a href=\"main.php\">Return</a> to Home Page.";
}
else {

   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";

}

echo "<style>
h1 {
  margin-top: 50px;
  margin-left: 50px;
}
</style>"
?>
