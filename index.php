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

      <div class="text-center">
        <a href="create.php" class="btn">Create a new post</a>
</div>

<div class="row">
  <?php foreach($query as $q) {?>
  <div class="col">
    <div class="card">
         <div class="cardbody">
                <h5 class="card-title"><?php echo $q['title'];?></h5>
                <p class=card-text><?php echo $q['content'];?></p>
                <a href="view.php?id=<?php echo $q['id'];?>" class="btn"> Read more <span class="text-danger">&rarr;</span</a>
         </div>
    </div>
  </div> 
      <?php } ?>
</div>

</div>
<a href="logout.php" class="btn">Sign Out of Your Account</a>
</body>
</html>

<?php
$mysqli->close();