<?php
$db = new PDO("mysql:host=192.168.20.20;dbname=Portfolio", 'root', '');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = 'SELECT `title`, `img_url` FROM `projects`;';

$query = $db->prepare($sql);
$query->execute();

$result = $query->fetchALL();

