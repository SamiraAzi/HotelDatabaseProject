<?php
if (isset($_COOKIE["username"])) {
  $username = $_COOKIE["username"];
  $password = $_COOKIE["password"];

  $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
  if($mysqli->connect_errno)
  {
     echo "Connection Issue!";
     exit;
  }

  $sql = "insert into GUEST (guest_ID, first_name, last_name, title, phone_number, credit_card_No, email) values ('$_POST[guest_ID]','$_POST[first_name]','$_POST[last_name]','$_POST[title]','$_POST[phone_number]','$_POST[credit_card_No]','$_POST[email]')";
  if($conn->query($sql))
  {
  	echo "<h1> Guest is successfully added!</h1>";

  } else {
     $err = $conn->errno;
     if($err == 1062)
     {
        echo "<h1>Guest ID $_POST[guest_ID] already exists!</h1>";
     } else {
        echo "<h1>MySQL error code $err </h1>";
     }
  }

  echo "<a href=\"main.php\">Return</a> to Home Page.";

} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>";
}

echo "<style>
h1 {
  margin-top: 50px;
  margin-left: 50px;
}
</style>"
?>
