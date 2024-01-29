<?php
include_once('connexion.php');
?>

<?php
$id = $_GET['id'];
$query = "DELETE FROM ut WHERE id=$id" ;
$result = $connexion->query($query);
header("Location: index.php");
exit();
?>