<html>
  <head>
    <title>Insert a Guest</title>
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
      select {
        text-align: center;
        width: 5em;  height: 2em;
      }
      input[type=text] {
        height: 2em;
      }
      input[type=email] {
        height: 2em;
      }
      input[type=submit] {
        width: 10em;  height: 2em;
      }
    </style>
  </head>
  <body>
    <h1>Add a New Guest</h2>
    <form action="insertguest.php" method=post>
      Guest ID: <input type=text name="guest_ID" size=12><br><br>
      First Name: <input type=text name="first_name" size=20><br><br>
      Last Name: <input type=text name="last_name" size=20><br><br>
      Title: <select name="title" value="title">
 		       <option value="Miss">Miss</option>
 		 			 <option value="Mr">Mr</option>
 		 			 <option value="Ms">Ms</option>
           <option value="Mx">Mx</option>
 		 		 	 </select><br><br>
      Phone Number: <input type=text name="phone_number" size=20><br><br>
      Credit Card Number: <input type=text name="credit_card_No" size=20><br><br>
      Email: <input type=email name="email" size=30><br><br><br>
      <input type=submit name="submit" value="Insert">
    </form>
  </body>
</html>
