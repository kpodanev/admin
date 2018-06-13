<?php
$mysqli = mysqli_connect("127.0.0.1", "root", "", "shop");

if (mysqli_connect_errno($mysqli)) {
    echo "Не удалось подключиться" . mysqli_connect_error();
}
if(isset($_POST['title']) && isset($_POST['description'])){
    $title = htmlentities(mysqli_real_escape_string($mysqli, $_POST['title']));
    $description = htmlentities(mysqli_real_escape_string($mysqli, $_POST['description']));
    $query ="INSERT INTO articles (title, description) VALUES('$title','$description')";
    $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
    if($result)
    {
        ?>
        <a href="../index.php"><span style='color:blue;'>Данные добавлены</span></a>
    <?php
    }
    
}
mysqli_close($mysqli);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
    <h2>Добавить новую статью</h2>
    <form method="POST">
    <p>Введите название:<br> 
    <input type="text" name="title" /></p>
    <p>Путь: <br> 
    <input type="text" name="description" /></p>
    <input type="submit" value="Добавить">
    </form>
</body>
</html>