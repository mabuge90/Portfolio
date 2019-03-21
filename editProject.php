<?php
$db = new PDO("mysql:host=192.168.20.20;dbname=Portfolio", 'root', '');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

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
    $result = $query->execute();
    if ($result) {
        header('Location:admin.php');
    } else {
        var_dump($_POST);
        echo '<br><br>';
        var_dump($_FILES);
        echo 'Your task cannot be completed';
        echo '<br><br>';
        echo '<a href="edit.php"> Return to previous page </a>';
    }
} else {
    header('Location: admin.php');
}
