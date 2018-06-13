<?php
     
if(isset($_POST['id'])){
 
$mysqli = mysqli_connect("127.0.0.1", "root", "", "shop");
if (mysqli_connect_errno($mysqli)) {
	echo "Не удалось подключиться" . mysqli_connect_error();
}
$id = mysqli_real_escape_string($mysqli, $_POST['id']);
$del = mysqli_query($mysqli, "DELETE FROM articles WHERE id = '$id'") or die("Ошибка " . mysqli_error($mysqli)); 
 
    mysqli_close($mysqli);
  
    header('Location: mysql.php');
}
 
if(isset($_GET['id']))
{   
    $id = htmlentities($_GET['id']);
    $body = true;;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php if($body){?>
 <h2>Удалить модель?</h2>
        <form method='POST'>
        <input type='hidden' name='id' value='$id' />
        <input type='submit' value='Удалить'>
        </form>
	<?php }?>
</body>
</html>