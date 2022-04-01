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

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(isset($_REQUEST["newpost"])){
   $title = $_REQUEST["title"];
   $content = $_REQUEST["content"];

   $sql = "INSERT INTO data(title, content) Values('$title', '$content')";
   mysqli_query($conn, $sql);

   header("Location: index.php?info=added");
   exit();
}

$sql = "SELECT * FROM data";
$query = mysqli_query($conn, $sql);

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM data WHERE id = $id";
    $query = mysqli_query($conn, $sql);
}

if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['id'];

    $sql = "DELETE * FROM data WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    header("Location: index.php?info=delete");
    exit();
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
      <form method= "GET">
          <input type="text" name="title" placeholder="Blog title" class="text-center">
          <textarea name ="content" ></textarea>
          <button name="newpost" class="btn">Add post</button>
</form>
</div>
</div>

</body>
</html>

<?php
$mysqli->close();