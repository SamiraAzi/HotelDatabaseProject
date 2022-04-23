<?php

if(isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

   echo "<h1>List of all Reservations</h1>";
   $sql = "select * from RESERVATION";

   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
     echo "<table border=1>";
     echo "<tr>";
     echo "<th style=\"background-color: yellow;\">Reservation No.</th>";
     echo "<th style=\"background-color: orange;\">Guest ID</th>";
     echo "<th style=\"background-color: lime;\">Hotel Name</th>";
     echo "<th style=\"background-color: lime;\">Room Number</th>";
     echo "<th>Check-in Date</th>";
     echo "<th>Check-out Date</th>";
     echo "<th>No. of Guests</th>";
     echo "</tr>";
      while($rec = $result->fetch_assoc()) {

        echo "<tr>";
    		echo "<td>$rec[reservation_No]</td>";
        echo "<td>$rec[guest_ID]</td>";
        echo "<td>$rec[hotel_name]</td>";
        echo "<td>$rec[room_number]</td>";
    		echo "<td>$rec[check_in_date]</td>";
    		echo "<td>$rec[check_out_date]</td>";
    		echo "<td>$rec[no_of_guest]</td>";
    		echo "</tr>";
      }
      echo "</table><br><br>";


   } else {

      echo "<p>No data for Reservation</p>";

   }

}
else
{
  echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";

}

echo "<a href=\"main.php\">Return</a> to Home Page.";

echo "
<style>
  h1 {
    margin-left: 30px;
    margin-top: 30px;
  }
  table {
    margin-left: 30px;
    border: 2px single black;
    border-collapse : collapse;
    width: 70%;
    font-size: 20px;
    text-align: center;
    margin-bottom: 30px;
  }
  a {
    margin-left: 30px;
    font-size: 20px;
  }
</style>
"
?>
