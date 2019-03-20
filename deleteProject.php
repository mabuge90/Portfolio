<?php
$db = new PDO("mysql:host=192.168.20.20;dbname=Portfolio", 'root', '');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if (!empty($_GET)) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `projects` WHERE `id`=:id;";
    $query = $db->prepare($sql);
    $query->bindParam(':id', $id);
    $result = $query->execute();
    header('location: admin.php');
} else {
    echo '<a href="admin.php"><img src= Images/windowsFailed.png></a>';

}
