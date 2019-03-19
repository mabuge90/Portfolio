<?php
$db = new PDO("mysql:host=192.168.20.20;dbname=Portfolio", 'root', '');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = 'SELECT `title`, `img_url`, `date_added` FROM `projects`;';

$query = $db->prepare($sql);;
$query->execute();
$result = $query->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS/adminStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <title></title>
</head>
<body>
<h1>Admin Panel</h1>
<div class="section-break"></div>

<table class="projects-container">
<thead>
    <tr>
        <th>Project Title</th>
        <th>Image URL</th>
        <th>Date Added</th>
        <th></th>
        <th></th>
    </tr>
</thead>
<tbody>
<?php
foreach ($result as $project) {
    echo '<tr><td>' . $project['title'] . '</td>';
    echo '<td>' . $project['img_url'] . '</td>';
    echo '<td>' . $project['date_added'] . '</td>';
    echo '<td><input class="admin-button edit" type="submit" value="Edit"></td>';
    echo '<td><input class="admin-button delete" type="submit" value="Delete"</td></tr>';
}
?>
</tbody>
</table>
<table class="new-project">
    <tr>
        <th><input class="create-new" type="submit" value="Add new entry"</th>
    </tr>
</table>

</body>
</html>
