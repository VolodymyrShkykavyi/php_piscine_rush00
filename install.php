<?php
require_once("resources/db_functions/db_config.php");

//connect to DB
$conn = mysqli_connect($servername, $username, $password);

//check connection
if (!$conn) {
    die(mysqli_connect_error());
}

//drop database if exists
$sql = "DROP DATABASE IF EXISTS `minishop_db`;";
if (!mysqli_query($conn, $sql)){
    die(mysqli_error($conn));
}

//create database
$sql = "CREATE DATABASE IF NOT EXISTS `minishop_db` COLLATE utf8_general_ci;";
if (!mysqli_query($conn, $sql)){
    die("Can't create Database: " . mysqli_error($conn));
}

//select database
$sql = "USE `minishop_db`;";
if (!mysqli_query($conn, $sql)){
    die("Can't select Database: " . mysqli_error($conn));
}

//create product categories
$sql = "CREATE TABLE `categories` (
`id` INT UNSIGNED AUTO_INCREMENT,
`name` VARCHAR(255) NOT NULL,
PRIMARY KEY (`id`))";
if (!mysqli_query($conn, $sql)){
    echo "Can't create table: " . mysqli_error($conn);
}

//create product table
$sql = "CREATE TABLE `products` (
`id` INT UNSIGNED AUTO_INCREMENT, 
`name` VARCHAR(255) NOT NULL, 
`img` VARCHAR(255) NOT NULL, 
`description` LONGTEXT, 
`price` DECIMAL (10,4) NOT NULL, 
`SKU` INT UNSIGNED DEFAULT '0', 
PRIMARY KEY (`id`)
)";
if (!mysqli_query($conn, $sql)){
    echo "Can't create table: " . mysqli_error($conn);
}

//create table productid-categoryid
$sql = "CREATE TABLE `product_categories` (
`productId` INT UNSIGNED NOT NULL,
`categoryId` INT UNSIGNED NOT NULL
)";
if (!mysqli_query($conn, $sql)){
	echo "Can't create table: " . mysqli_error($conn);
}

//create user table
$sql = "CREATE TABLE `users` (
 `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`login` VARCHAR(50) NOT NULL, 
`email` VARCHAR (255) NOT NULL,
`password` VARCHAR(255) NOT NULL,
`is_admin` TINYINT(1) NOT NULL DEFAULT '0',
`firstname` VARCHAR(50),
`lastname` VARCHAR(50),
`address` VARCHAR(100),
`img` VARCHAR (255),
PRIMARY KEY (`id`)
)";
if (!mysqli_query($conn, $sql)){
    echo "Can't create table: " . mysqli_error($conn);
}

//create orders table
$sql = "CREATE TABLE `orders` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`userID` INT UNSIGNED NOT NULL,
`date_order` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`products` LONGTEXT NOT NULL,
`price` INT UNSIGNED NOT NULL,
PRIMARY KEY (`id`)
)";
if (!mysqli_query($conn, $sql)){
    echo "Can't create table: " . mysqli_error($conn);
}

//create admin
$adm_passw = hash('whirlpool', "admin");
$sql = "INSERT INTO `users`
(`login`, `password`, `email`, `is_admin`) VALUES 
('admin', '{$adm_passw}', 'adm@gmail.com', '1'),
('admin2', '{$adm_passw}', 'adm2@adm.ua', '1'),
('user', '" . hash('whirlpool', 'qwerty') . "', 'best_user@ever.com', '0')
";
if (!mysqli_query($conn, $sql)){
    echo "Insert error: " . mysqli_error($conn);
}

//create product categories
$sql = "INSERT INTO `categories`
(`name`) VALUES 
('Phones'), 
('Projects'),
('Cats'),
('Dogs'),
('Displays')
";
if (!mysqli_query($conn, $sql)){
    echo "Insert error: " . mysqli_error($conn);
}

//create products
$sql = "INSERT INTO `products`
(`name`, `img`, `description`, `price`, `SKU`) VALUES 
('Xiaomi Redmi Note 5 Pro', 'https://cdn2.gsmarena.com/vv/pics/xiaomi/xiaomi-redmi-note-5-pro-1.jpg', 'Redmi Note 5 Pro cобрал в себе лучшие достижения технической и инженерной науки, сделав их доступными большинству пользователей. Новый мощный процессор, двойная камера, защищенный экран с соотношением сторон 18:9 - всё это выводит ваш повседневный комфорт от использования смартфона на новый уровень. Металлический корпус и дисплей нового поколения Смартфон Redmi Note 5 Pro собран в металлическом корпусе с соотношением сторон 18:9. Благодаря этому на дисплее можно отобразить больше информации, делая его, при этом, более удобным для работы даже одной рукой. Камера для качественных селфи снимков. Изюминкой Redmi Note 5 Pro, превращающей его в один из лучших в классе камерафонов, стала его сдвоенная камера, которая построена на 12 Мп модуле Sony и 5 Мп модуле от Samsung. Фотоснимки сводятся воедино фирменным алгоритмом Xiaomi на основе AI. ', '12345.4321', '777'),
('Barsik', 'https://img.gazeta.ru/files3/785/7637785/image-28-06-15-1119-pic4-970x550-24394.jpg', 'Best dog in the world', '1000', '1'),
('phone2', 'img_src', 'my description', '5', '12'),
('dog2', 'img', 'descr', '1221', '1')";
if (!mysqli_query($conn, $sql)){
    echo "Insert error: " . mysqli_error($conn);
}

//add categories to products
$sql = "INSERT INTO `product_categories`
 (`productId`, `categoryId`) VALUES 
('1', '1'),
('2', '4'),
('3', '1'),
('3', '4'),
('4', '4')";
if (!mysqli_query($conn, $sql)){
	echo "Insert error: " . mysqli_error($conn);
}

//create orders
$sql = "INSERT INTO `orders`
(`userID`, `products`, `price`) VALUES 
('1', '" . serialize(['1', '2']) . "', '11')
";
if (!mysqli_query($conn, $sql)){
    echo "Insert error: " . mysqli_error($conn);
}
if (empty(mysqli_error($conn))){
    rename("install.php", "install_done.php");
    echo "SUCCESS<br/>database installed<br/>";
    echo "<a href = /index.php>start page<a/>";
}
else {
    var_dump(mysqli_error($conn));
    echo "<a href = /install.php>reinstall<a/>";
}
mysqli_close($conn);

