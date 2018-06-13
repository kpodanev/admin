<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
$mysqli = mysqli_connect("127.0.0.1", "root", "", "shop");

if (mysqli_connect_errno($mysqli)) {
    echo "Не удалось подключиться" . mysqli_connect_error();
}
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['created_at'])){
    $title = htmlentities(mysqli_real_escape_string($mysqli, $_POST['title']));
    $description = htmlentities(mysqli_real_escape_string($mysqli, $_POST['description']));
    $created_at = htmlentities(mysqli_real_escape_string($mysqli, $_POST['created_at']));
    $query ="INSERT INTO articles VALUES(NULL, '$title','$description','$created_at')";
    $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    
}
?>
<h2>Добавить новую статью</h2>
<form method="POST">
<p>Введите название:<br> 
<input type="text" name="title" /></p>
<p>Путь: <br> 
<input type="text" name="description" /></p>
<input type="submit" value="Добавить">
</form>
<?=
mysqli_close($mysqli);
?>
</body>
</html>
