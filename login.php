<?php
$host="127.0.0.1";
$username="charikov";
$password="student";
$database="test";

$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_errno) {
    print "Chyba: " . $mysqli->connect_error;
    exit();
} 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: view.php");
    exit;
}

if(isset($_GET["fname"]) && isset($_GET["passwd"])) {

    if(!$mysqli -> query("insert into post (nick, message) values ('" .  $_GET["fname"] . "','" .$_GET["passwd"] . "');"))
    {
        echo("Error description:" . $mysqli -> error);
    }
}
?>

<!DOCTYPE html>
<html>
    <body>
        <form action = "login.php" method = "get">
        <label for="fname">Nickname:</label><br>
  <input type="text" id="fname" name="fname" value=""><br><br>
  <label for="passwd">Password:</label><br>
  <input type="text" id="passwd" name="passwd" value=""><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>

<?php
$mysqli->close();
