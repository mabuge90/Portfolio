<?php
//$db = new PDO("mysql:host=192.168.20.20;dbname=Portfolio", 'root', '');
//$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//
//$id = $_POST['id'];
//$title = $_POST['title'];
//$img_url = $_POST['image'];
//$site_url = $_POST['site'];
//
//if($_POST['editBtn'] == 'Edit') {
//
//    $sql2 = "UPDATE `projects` SET `title`=:title, `img_url=:imge_url`, `site_url`=:site_url WHERE `id`=:id;";
//    $query2 = $db->prepare($sql2);
//    $query2->bindParam(':id', $id);
//    $query2->bindParam(':title', $title, PDO::PARAM_STR);
//    $query2->bindParam(':image_url', $img_url, PDO::PARAM_STR);
//    $query2->bindParam(':site_url', $site_url, PDO::PARAM_STR);
//
//    $result2 = $query2->execute();
//    header('Location:admin.php');
//
//}