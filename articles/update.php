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
     
// если запрос POST 
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['id'])){
 
    $id = htmlentities(mysqli_real_escape_string($mysqli, $_POST['id']));
    $title = htmlentities(mysqli_real_escape_string($mysqli, $_POST['title']));
    $description = htmlentities(mysqli_real_escape_string($mysqli, $_POST['description']));
    $created_at = htmlentities(mysqli_real_escape_string($mysqli, $_POST['created_at']));
     
$query ="UPDATE articles SET title='$title', description='$description' WHERE id='$id'";
$result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
 
if($result)
echo "<span style='color:blue;'>Данные обновлены</span>";
}
 
// если запрос GET
if(isset($_GET['id']))
{   
$id = htmlentities(mysqli_real_escape_string($mysqli, $_GET['id']));
     
// создание строки запроса
$query ="SELECT * FROM articles WHERE id = '$id'";
// выполняем запрос
$result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
//если в запросе более нуля строк
if($result && mysqli_num_rows($result)>0) 
{
$row = mysqli_fetch_row($result); // получаем первую строку
$title = $row[1];
$description = $row[2];
         
echo "<h2>Изменить модель</h2>
<form method='POST'>
<input type='hidden' name='id' value='$id' />
<p>Название:<br> 
<input type='text' name='title' value='$title' /></p>
<p>Путь: <br> 
<input type='text' name='description' value='$description' /></p>
<input type='submit' value='Сохранить'>
</form>";
         
mysqli_free_result($result);
}
}
// закрываем подключение
mysqli_close($mysqli);
?>
</body>
</html>