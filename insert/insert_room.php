<html>
  <head>
    <title>Insert a Room</title>
    <style>
      h1 {
        margin-top: 50px;
        margin-left: 100px;
        text-decoration: underline;
      }
      form {
        font-size: 20px;
        margin-left: 70px;
        padding-left: 50px;
        padding-top: 30px;
      }
      input[type=text] {
        height: 2em;
      }
      input[type=submit] {
        width: 10em;  height: 2em;
      }
      input[type=number] {
        font-size: 15px;
        width: 3em; height: 1.5em;
      }
      select {
        width: 150px; height: 30px;
        font-size: 15px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>Add a New Room</h1>
    <form action="insertroom.php" method=post>
<?php
      try{

      if(isset($_COOKIE["username"]))
      {
         $username = $_COOKIE["username"];
         $password = $_COOKIE["password"];

         $conn = new mysqli('vconroy.cs.uleth.ca',$username,$password, $username);
         if($conn->connect_errno)
         {
            echo "Error connecting!";
            exit;
         }

         $sql = "select hotel_name from HOTEL";
         $result = $conn->query($sql);

         if(!$result)
         {
            echo "Problem with processing query";
            exit;
         }
         else if($result->num_rows > 0)
         {
            echo "Hotel Name: <select name=\"hotel_name\">";
            echo "<option value=\"\">-- select --</option>";
            while($val = $result->fetch_assoc())
            {
      	      echo "<option value='".$val['hotel_name']."'>".$val['hotel_name']."</option>";
            }
            echo "</select>";
         }
         else
         {
            echo "<h2>There are no data for Hotel!</h2>";
         }
      }
      else echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";

      } catch (PDOException $ex) {

         echo $ex->getMessage();
        }

  ?> <br><br>

      Room Number: <input type=text name="room_number" size=4> <br><br>
      Room Price: <input type=text name="room_price" size=5> <br><br>
      Occupancy: <input type=number name="occupancy" min="1" max="6"> <br><br>
      Room Type:
      <select name="room_type">
        <option value="empty">--choose--</option>
        <option value="single">single</option>
        <option value="double">double</option>
        <option value="twin">twin</option>
        <option value="king">king</option>
        <option value="suite">suite</option>
      </select><br><br><br>
      <input type=submit name="submit" value="Add Room">
    </form>
  </body>
</html>
