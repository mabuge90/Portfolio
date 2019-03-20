<?php
$db = new PDO("mysql:host=192.168.20.20;dbname=Portfolio", 'root', '');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = 'SELECT `id`,`title`, `img_url`, `site_url` FROM `projects`;';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetch();


//if($_POST['cancelBtn'] == 'Cancel') {
//    header('Location: admin.php');
//} elseif ($_POST['editBtn'] == 'Edit') {
$id = $_POST['id'];
$title = $_POST['title'];
$imgUrl = $_POST['image'];
$siteUrl = $_POST['site'];

$sql = "UPDATE `projects` SET `title`= :title, `img_url`= :imgUrl, `site_url`= :siteUrl WHERE `id`= :id ;";

$query = $db->prepare($sql);
$query->bindParam(':title', $title);
$query->bindParam(':imgUrl', $imgUrl);
$query->bindParam(':siteUrl', $siteUrl);
$query->bindParam(':id', $id);
$query->execute();


//    $query = $db->prepare($sql);
//    $query->execute();

//    $db->query($title, $imgUrl, $siteUrl);
//    $query2 = $db->prepare($sql2);
//    $query2->bindParam(':title', $title, PDO::PARAM_STR);
//    $query2->bindParam(':image_url', $img_url, PDO::PARAM_STR);
//    $query2->bindParam(':site_url', $site_url, PDO::PARAM_STR);
//    $result2 = $query2->execute();
//    header('Location:admin.php');
//} else {
//     var_dump($_POST);
//}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="CSS/edit.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <title>Edit project entry</title>
</head>
<body>
<div class="logo">
    <img src="Images/logo_transparent.png" alt="logo">
</div>
<h1>Edit Project</h1>

<div class="addNewForm">
    <form method = "POST" enctype="multipart/form-data">
        <?php
            echo '<label>Project ID: <input type="hidden" name="id">' . $result['id'] . '</label>';
            echo '<label>Project Title: </label>';
            echo '<input type="text" value="' . $result['title'] . '" name="title">';
            echo '<label>Project URL: </label>';
            echo '<input type="text" value="' . $result['site_url'] . '" name="site">';
            echo '<label>Image URL: </label>';
            echo '<input type="text" value="' . $result['img_url'] . '" name="image">';
            echo '<label>Select file to upload: </label>';
            echo '<input type="file" name="fileToUpload" id="fileToUpload" placeholder="No file selected">';
            echo '<input class="edit" type="submit" value="Edit" name="editBtn">';
            echo '<input class="cancel" type="submit" name="cancelBtn" value="Cancel">';
        ?>
    </form>
</div>
</body>
</html>