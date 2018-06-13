<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
</head>

<?php

$mysqli = mysqli_connect("127.0.0.1", "root", "", "shop");
if (mysqli_connect_errno($mysqli)) {
	echo "Не удалось подключиться" . mysqli_connect_error();
}

$art = mysqli_query($mysqli, "SELECT * FROM articles");
$rows_art = mysqli_fetch_all($art, MYSQLI_ASSOC);
echo "<table border='1'>";
echo  '<tr><td><a href="/articles/create.php">create</a></td></tr>';
foreach ($rows_art as $row_art) {
	?> 
	<tr><td>id</td><td>title</td><td>description</td><td>created_at</td><td>update_at</td></tr>

	<tr>
		<td><?=$row_art['id']?></td>
		<td><?=$row_art['title']?></td>
		<td><?=$row_art['description']?></td>
		<td><?=$row_art['created_at']?></td>
		<td><?=$row_art['update_at']?></td>
		<td><a href="/articles/delete.php?id=<?=$row_art['id']?>">delete</a></td>
		<td><a href="/articles/update.php?id=<?=$row_art['id']?>">update</a></td>
	</tr>	
<?php
}
echo "</table>";

$cat = mysqli_query($mysqli, "SELECT * FROM categories");
$rows_cat = mysqli_fetch_all($cat, MYSQLI_ASSOC);
echo "<table border='1'>";
echo  '<tr><td><a href="/categories/create.php">create</a></td></tr>';
foreach ($rows_cat as $row_cat) {
	?>
	<tr><td>id</td><td>name</td><td>description</td><td>publish</td></tr>

	<tr>
		<td><?=$row_cat['id']?></td>
		<td><?=$row_cat['name']?></td>
		<td><?=$row_cat['description']?></td>
		<td><?=$row_cat['publish']?></td>
		<td><a href="/categories/delete.php?id=<?=$row_cat['id']?>">delete</a></td>
		<td><a href="/categories/update.php?id=<?=$row_cat['id']?>">update</a></td>
	</tr>
<?php
}
echo "</table>";

$ord = mysqli_query($mysqli, "SELECT * FROM orders");
$rows_ord = mysqli_fetch_all($ord, MYSQLI_ASSOC);
echo "<table border='1'>";
echo  '<tr><td><a href="/orders/create.php">create</a></td></tr>';
foreach ($rows_ord as $row_ord) {
	?>
	<tr><td>id</td><td>user_id</td><td>phone</td><td>created_at</td><td>update_at</td></tr>
	<tr>
		<td><?=$row_ord['id']?></td>
		<td><?=$row_ord['user_id']?></td>
		<td><?=$row_ord['phone']?></td>
		<td><?=$row_ord['created_at']?></td>
		<td><?=$row_ord['updated_at']?></td>
		<td><a href="/orders/delete.php?id=<?=$row_ord['id']?>">delete</a></td>
		<td><a href="/orders/update.php?id=<?=$row_ord['id']?>">update</a></td>
	</tr>
<?php
}
echo "</table>";

$ord_prod = mysqli_query($mysqli, "SELECT * FROM orders_to_products");
$rows_ord_prod = mysqli_fetch_all($ord_prod, MYSQLI_ASSOC);
echo "<table border='1'>";
foreach ($rows_ord_prod as $row_ord_prod) {
	?>
	<tr><td>id</td><td>order_id</td><td>product_id</td><td>price</td></tr>
	<tr>
		<td><?=$row_ord_prod['id']?></td>
		<td><?=$row_ord_prod['order_id']?></td>
		<td><?=$row_ord_prod['product_id']?></td>
		<td><?=$row_ord_prod['price']?></td>
	</tr>
<?php
}
echo "</table>";

$prod = mysqli_query($mysqli, "SELECT * FROM products");
$rows_prod = mysqli_fetch_all($prod, MYSQLI_ASSOC);
echo "<table border='1'>";
echo  '<tr><td><a href="/products/create.php">create</a></td></tr>';
foreach ($rows_prod as $row_prod) {
	?>
	<tr>
		<td>id</td><td>name</td><td>aticul</td><td>brand</td><td>image_path</td><td>description</td><td>price</td>
		<td>category_id</td><td>created_at</td><td>updated_at</td><td>publish</td>
	</tr>
	<tr>
		<td><?=$row_prod['id']?></td>
		<td><?=$row_prod['name']?></td>
		<td><?=$row_prod['aticul']?></td>
		<td><?=$row_prod['brand']?></td>
		<td><?=$row_prod['image_path']?></td>
		<td><?=$row_prod['description']?></td>
		<td><?=$row_prod['price']?></td>
		<td><?=$row_prod['category_id']?></td>
		<td><?=$row_prod['created_at']?></td>
		<td><?=$row_prod['updated_at']?></td>
		<td><?=$row_prod['publish']?></td>
		<td><a href="/products/delete.php?id=<?=$row_prod['id']?>">delete</a></td>
		<td><a href="/products/update.php?id=<?=$row_prod['id']?>">update</a></td>
	</tr>
<?php
}
echo "</table>";

$users = mysqli_query($mysqli, "SELECT * FROM users");
$rows_users = mysqli_fetch_all($users, MYSQLI_ASSOC);
echo "<table border='1'>";
echo  '<tr><td><a href="/users/create.php">create</a></td></tr>';
foreach ($rows_users as $row_users) {
	?>
	<tr><td>id</td><td>name</td><td>aticul</td><td>email</td><td>phone</td><td>password</td><td>created_at</td><td>updated_at</td></tr>
	<tr>
		<td><?=$row_users['id']?></td>
		<td><?=$row_users['name']?></td>
		<td><?=$row_users['email']?></td>
		<td><?=$row_users['phone']?></td>
		<td><?=$row_users['password']?></td>
		<td><?=$row_users['created_at']?></td>
		<td><?=$row_users['update_at']?></td>
		<td><a href="/users/delete.php?id=<?=$row_users['id']?>">delete</a></td>
		<td><a href="/users/update.php?id=<?=$row_users['id']?>">update</a></td>
	</tr>
<?php
}
echo "</table>";
