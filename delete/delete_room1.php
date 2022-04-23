<html>
  <head>
    <title>Delete a Room</title>
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
  </head>
  <body>

  <?php
  if(isset($_COOKIE["username"])){

     echo "<form action=\"delete_room2.php\" method=post>";

     $username = $_COOKIE["username"];
     $password = $_COOKIE["password"];

     $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

     $sql = "select hotel_name from HOTEL";
     $result = $conn->query($sql);
     if($result->num_rows != 0)
     {
        echo "Hotel Name: <select name=\"hotel_name\">";
        echo "<option value=\"\">-- select --</option>";
        while($val = $result->fetch_assoc())
        {
  	 echo "<option value='$val[hotel_name]'>$val[hotel_name]</option>";

        }
        echo "</select>";
        echo str_repeat('&nbsp;', 3);
        echo "<input type=submit name=\"submit\" value=\"View\">";
     }
     else
     {
        echo "<p>There are no availalbe Room in the Hotel!</p>";
     }

     echo "</form>";
  } else {
     echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";

  }
  ?>

  </body>
</html>
