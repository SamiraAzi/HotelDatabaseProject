<?php

if(isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

   echo "<h1>List of all rooms</h1>";
   $sql = "select * from ROOM";

   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
     echo "<table border=1>";
     echo "<tr>";
     echo "<th style=\"background-color: yellow;\">Hotel Name</th>";
     echo "<th style=\"background-color: yellow;\">Room Number</th>";
     echo "<th>Room Price</th>";
     echo "<th>Occupancy</th>";
     echo "<th>Room Type</th>";
     echo "</tr>";
      while($rec = $result->fetch_assoc()) {

        echo "<tr>";
    		echo "<td>$rec[hotel_name]</td>";
    		echo "<td>$rec[room_number]</td>";
    		echo "<td>$rec[room_price]</td>";
    		echo "<td>$rec[occupancy]</td>";
    		echo "<td>$rec[room_type]</td>";
    		echo "</tr>";
      }
      echo "</table>";


   } else {

      echo "<p>No data for Room</p>";

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
