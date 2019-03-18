<?php
$db = new PDO("mysql:host=192.168.20.20;dbname=Portfolio", 'root', '');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = 'SELECT `title`, `img_url` FROM `projects`;';

$query = $db->prepare($sql);;
$query->execute();
$result = $query->fetchAll();

?>

<!DOCTYPE html>
<html>
<body>
<table>
    <tr>
        <th>Title</th>
        <th>Image URL</th>
        <th>Date Added</th>
    </tr>
</table>

</body>
</html>
