<?php
$db = new PDO("mysql:host=192.168.20.20;dbname=Portfolio", 'root', '');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if (!empty($_GET['id'])) {
    $sql = 'SELECT `id`, `title`, `img_url`, `site_url` FROM `projects` WHERE `id`= ?;';
    $query = $db->prepare($sql);
    $query->execute([$_GET['id']]);
    $result = $query->fetch();
} else {
    echo 'Unable to complete action';
}

if(!isset($_POST['cancelBtn'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $imgUrl = $_POST['image'];
    $siteUrl = $_POST['site'];

    $filePath = "Images/";
    $filePath = $filePath . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($filePath,PATHINFO_EXTENSION));

    $sql = "UPDATE `projects` SET `title`= :title, `img_url`= :imgUrl, `site_url`= :siteUrl WHERE `id`= :id ;";
    $query = $db->prepare($sql);
    $query->bindParam(':title', $title);
    $query->bindParam(':siteUrl', $siteUrl);
    $query->bindParam(':id', $id);

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filePath)) {
        $query->bindParam(':imgUrl', $imgUrl);
    } else {
        $query->bindParam(':imgUrl', $filePath, PDO::PARAM_STR);
    }
    $query->execute();
} else {
    header('Location: admin.php');
}
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
    <form method = "POST" action=enctype="multipart/form-data">
        <?php
            echo '<input type="hidden" name="id" value="'. $result['id'] . '"</label>';
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