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

include "create.php"

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="eng">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <titel>Blog</title>
</head>

 <div class="container">

    <?php foreach($query as $q) { ?>
        <div>
          <h1><?php echo $q['title'];?></h1>
        <div>
    <form method="POST">
        <input type="text" hidden name="id" value="<?php echo $q["id"];?>">
        <button class="btn" name="delete">Delete</button>
    </form>
        </div>
           </div>
    <p><?php echo $q['content'];?> </p>
    <?php } ?>

</div>

</body>
</html>

<?php
$mysqli->close();