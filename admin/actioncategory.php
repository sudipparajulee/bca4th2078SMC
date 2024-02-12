<?php
$name = $_POST['name'];
$priority = $_POST['priority'];

$qry = "INSERT INTO categories(name, priority) VALUES('$name', $priority)";

echo $qry;
?>