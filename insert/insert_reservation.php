<html>
  <head>
    <title>Make a Reservation</title>
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
        font-size: 17px;
        width: 2.5em; height: 1.7em;
      }
      select {
        width: 100px; height: 30px;
        font-size: 15px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>Add a new Reservation</h2>
    <form action="insertReservation.php" method=post>
      Reservation Number: <input type=text name="reservation_No" size=12><br><br>
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

         $sql = "select guest_ID from GUEST";
         $result = $conn->query($sql);

         if(!$result)
         {
            echo "Problem with processing query";
            exit;
         }
         else if($result->num_rows > 0)
         {
            echo "GUEST ID: <select name=\"guest_ID\">";
            echo "<option value=\"\">-- select --</option>";
            while($val = $result->fetch_assoc())
            {
      	      echo "<option value='".$val['guest_ID']."'>".$val['guest_ID']."</option>";
            }
            echo "</select>";
         }
         else
         {
            echo "<h1>There are no Guests in the system!</h2>";
         }
         echo "<br><br>";

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

         echo "<br><br>";


      }
      else echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";

      } catch (PDOException $ex) {

         echo $ex->getMessage();
        }

      ?>
      Room Number: <input type=text name="room_number"><br><br>
      Check-in Date: <input type=date name="check_in_date"><br><br>
      Check-out Date: <input type=date name="check_out_date"><br><br>
      Number of Guests: <input type=number name="no_of_guest" min=1 max=5><br><br>



    <?php

    if(isset($_COOKIE["username"])) {
       $username = $_COOKIE["username"];
       $password = $_COOKIE["password"];

       $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

       echo "<h3>List of all rooms</h3>";
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
      echo "<h3>You are not logged in!</h3><p><a href=\"index.php\">Login First</a></p>";

    }
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
        width: 50%;
        font-size: 15px;
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
      <input type=submit name="submit" value="Insert">
    </form>
  </body>
</html>
