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
<div class="section_break"></div>
<table>
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

        echo '<td><input class = "edit" type="submit" value = "Edit"></td>';

        echo '<td><input class = "delete" type="submit" value = "Delete"</td></tr>';
         
    }

?>

</tbody>


</table>

</body>
</html>
