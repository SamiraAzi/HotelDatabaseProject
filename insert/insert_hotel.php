<html>
<head>
  <title>Add New Hotel</title></head>
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
      font-size: 20px;
      width: 3em; height: 1.5em;
    }
  </style>
<body>
<h1>Add a New Hotel</h1>
<form action="inserthotel.php" method=post>
Hotel Name: <input type=text name="hotel_name" size=20><br><br>
Hotel Address: <input type=text name="address" size=50><br><br>
Phone Number: <input type=text name="phone_number" size=15><br><br>
Star Rating: <input type=number name="star_rating" min="1" max="5" ><br><br><br>
<input type=submit name="submit" value="Insert"></form>
</body>
</html>
