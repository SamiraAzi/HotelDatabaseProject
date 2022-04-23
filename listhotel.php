<?php

if(isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

   echo "<h1>List of all Hotels</h1>";
   $sql = "select * from HOTEL";

   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "<table border=1>";
      echo "<tr>";
      echo "<th style=\"background-color: yellow;\">Hotel Name</th>";
      echo "<th>Address</th>";
      echo "<th>Phone number</th>";
      echo "<th>Star rating</th>";
      echo "</tr>";
      while($rec = $result->fetch_assoc()) {

		echo "<tr>";
		echo "<td>$rec[hotel_name]</td>";
		echo "<td>$rec[address]</td>";
		echo "<td>$rec[phone_number]</td>";
		echo "<td>$rec[star_rating]</td>";
		echo "</tr>";
      }
      echo "</table>";


   } else {

      echo "<p>No data for HOTEL</p>";

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
