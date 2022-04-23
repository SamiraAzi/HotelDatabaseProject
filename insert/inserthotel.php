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

$sql = "insert into HOTEL (hotel_name, address, phone_number, star_rating) values ('$_POST[hotel_name]','$_POST[address]','$_POST[phone_number]', '$_POST[star_rating]')";
if($conn->query($sql))
{
	echo "<h1> New Hotel is successfully added!</h1>";

} else {
   $err = $conn->errno;
   if($err == 1062)
   {
      echo "<h1>Hotel name $_POST[Hotel_name] already exists!</h1>";
   } else {
      echo "<p>MySQL error code $err </p>";

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
