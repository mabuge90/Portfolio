<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-03-18
 * Time: 20:35
 */
$db = new PDO("mysql:host=192.168.20.20;dbname=Portfolio", 'root', '');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//POST data from add new project form
$title = $_POST['title'];
$site = $_POST['site'];

//SQL query to insert project title, url, and image url into database
$sql = "INSERT INTO `projects` (`title`, `img_url`, `site_url`) VALUES (:title, :image, :site);";
$query = $db->prepare($sql);
$query->bindParam(':title', $title, PDO::PARAM_STR);
$query->bindParam(':site', $site, PDO::PARAM_STR );

//php to upload image to server
$file_path = "Images/";
$file_path = $file_path . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($file_path,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists. if it does, try to upload file. After image has been uploaded execute query to save image url to database
if (file_exists($file_path)) {
        echo "Project entry was not uploaded. Check if entry already exists.";
        $uploadOk = 0;
}


    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file_path)) {
        $query->bindParam(':image', $file_path, PDO::PARAM_STR);
        $query->execute();
        header('Location: admin.php');
    } else {
        echo '<br>';
        echo "There was an error uploading your file.";


}