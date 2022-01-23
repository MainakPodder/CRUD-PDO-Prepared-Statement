<?php include "connection.php" ?>

<?php
$dsql = "DELETE FROM `student` WHERE id=:did";
$result = $conn->prepare($dsql);
$result->bindParam(":did", $did);
$did = $_GET["id"];

$result->execute();

header('location:display.php');

?>