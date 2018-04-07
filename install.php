<?php
require_once("resources/db_functions/db_config.php");

//connect to DB
$conn = mysqli_connect($servername, $username, $password);

//check connection
if (!$conn) {
    die("Can't connect to Database: " . mysqli_connect_error());
}

//drop database if exists
$sql = "DROP DATABASE IF EXISTS `minishop_db`;";
if (!mysqli_query($conn, $sql)){
    die(mysqli_error($conn));
}

//create database
$sql = "CREATE DATABASE IF NOT EXISTS `minishop_db`;";
if (!mysqli_query($conn, $sql)){
    die("Can't create Database: " . mysqli_error($conn));
}

//select database
$sql = "USE `minishop_db`;";
if (!mysqli_query($conn, $sql)){
    die("Can't select Database: " . mysqli_error($conn));
}

//create product categories
$sql = "CREATE TABLE `product_categories` (
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
`categoryID` INT UNSIGNED NOT NULL, 
`img` VARCHAR(255) NOT NULL, 
`description` LONGTEXT, 
`price` DECIMAL (10,4) NOT NULL, 
`SKU` INT UNSIGNED DEFAULT '0', 
PRIMARY KEY (`id`)
)";
if (!mysqli_query($conn, $sql)){
    echo "Can't create table: " . mysqli_error($conn);
}

//create user table
$sql = "CREATE TABLE `users` (
 `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`login` VARCHAR(50) NOT NULL, 
`password` VARCHAR(255) NOT NULL,
`is_admin` VARCHAR(1) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
)";
if (!mysqli_query($conn, $sql)){
    echo "Can't create table: " . mysqli_error($conn);
}

//create orders table
$sql = "CREATE TABLE `orders` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`userID` INT UNSIGNED NOT NULL,
`products` LONGTEXT NOT NULL,
PRIMARY KEY (`id`)
)";
if (!mysqli_query($conn, $sql)){
    echo "Can't create table: " . mysqli_error($conn);
}

//create admin
$adm_passw = hash('sha256', "admin");
$sql = "INSERT INTO `users`
(`login`, `password`, `is_admin`) VALUES 
('admin', '{$adm_passw}', '1'),
('admin2', '{$adm_passw}', '1'),
('user', '" . hash('sha256', 'qwerty') . "', '0')
";
if (!mysqli_query($conn, $sql)){
    echo "Insert error: " . mysqli_error($conn);
}


//create product categories
$sql = "INSERT INTO `product_categories`
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
(`name`, `categoryID`, `img`, `description`, `price`, `SKU`) VALUES 
('Xiaomi Redmi Note 5 Pro', '1', 'https://cdn2.gsmarena.com/vv/pics/xiaomi/xiaomi-redmi-note-5-pro-1.jpg', 'Redmi Note 5 Pro cобрал в себе лучшие достижения технической и инженерной науки, сделав их доступными большинству пользователей. Новый мощный процессор, двойная камера, защищенный экран с соотношением сторон 18:9 - всё это выводит ваш повседневный комфорт от использования смартфона на новый уровень. Металлический корпус и дисплей нового поколения Смартфон Redmi Note 5 Pro собран в металлическом корпусе с соотношением сторон 18:9. Благодаря этому на дисплее можно отобразить больше информации, делая его, при этом, более удобным для работы даже одной рукой. Камера для качественных селфи снимков. Изюминкой Redmi Note 5 Pro, превращающей его в один из лучших в классе камерафонов, стала его сдвоенная камера, которая построена на 12 Мп модуле Sony и 5 Мп модуле от Samsung. Фотоснимки сводятся воедино фирменным алгоритмом Xiaomi на основе AI. ', '12345.4321', '777'),
('Barsik', '4', 'https://img.gazeta.ru/files3/785/7637785/image-28-06-15-1119-pic4-970x550-24394.jpg', 'Best dog in the world', '1000', '1')
";
if (!mysqli_query($conn, $sql)){
    echo "Insert error: " . mysqli_error($conn);
}


//create orders
$sql = "INSERT INTO `orders`
(`userID`, `products`) VALUES 
('1', '" . serialize(['1', '2']) . "')
";
if (!mysqli_query($conn, $sql)){
    echo "Insert error: " . mysqli_error($conn);
}


mysqli_close($conn);
