<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="CSS/newProject.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <title>Add new entry</title>
</head>
<body>
<div class="logo">
    <img src="Images/logo_transparent.png" alt="logo">
</div>
<h1>Add new entry</h1>

<div class="addNewForm">

    <form method = "POST" action="upload.php" enctype="multipart/form-data">
        <label>Project Title: </label>
        <input type="text" name="title" placeholder="Enter title">
        <label>Project URL: </label>
        <input type="text" name="site" placeholder="Enter project url">
        <label>Select image file to upload: </label>
        <input type="file" name="fileToUpload" id="fileToUpload" placeholder="No file selected">
        <input type="submit" value="Add project" name="submit">
    </form>
</div>
</body>
</html>

