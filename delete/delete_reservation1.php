<html>
<head>
  <title>Update Reservation</title></head>
  <style>
    form {
      margin-left: 100px;
      margin-top: 100px;
      font-size: 30px;
    }
    select {
      width: 200px; height: 50px;
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
if(isset($_COOKIE["username"])){

   echo "<form action=\"delete_reservation2.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

   $sql = "select guest_ID from RESERVATION";
   $result = $conn->query($sql);
   if($result->num_rows != 0)
   {
      echo "Guest ID: <select name=\"guest_ID\">";
      echo "<option value=\"\">-- select --</option>";
      while($val = $result->fetch_assoc())
      {
	 echo "<option value='$val[guest_ID]'>$val[guest_ID]</option>";

      }
      echo "</select>";
      echo str_repeat('&nbsp;', 3);
      echo "<input type=submit name=\"submit\" value=\"View\">";
   }
   else
   {
      echo "<p>You need to enter some data.</p>";
   }

   echo "</form>";
}
else
{
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
}

?>

</body>
</html>
