<html>
<head>
  <title>Delete Room Information</title></head>
  <style>
    form {
      margin-left: 100px;
      margin-top: 100px;
      font-size: 30px;
    }
    select {
      width: 300px; height: 50px;
      font-size: 25px;
      text-align: center;
    }
    input[type=submit] {
      width: 150px;  height: 40px;
      font-size: 20px;
    }
  </style>
<body>

<?php

if(isset($_COOKIE["username"]))
{

   echo "<form action=\"deleteroom.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

   $sql = "select room_number from ROOM where hotel_name='$_POST[hotel_name]'";
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Room Number: <select name=\"room_number\">";
      echo "<option value=\"\">-- select --</option>";
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[room_number]'>$val[room_number]</option>";

      }
      echo "</select>";
      echo str_repeat('&nbsp;', 3);
      echo "<input type=submit name=\"submit\" value=\"Delete\">";
   }
   else
   {
      echo "<p>Umm...you may want to enter some data. ;) </p>";
   }

   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";

}
?>

</body>
</html>
