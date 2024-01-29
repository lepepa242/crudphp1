<?php
include_once('connexion.php');
$query = "SELECT * FROM ut";
$result = $connexion->query($query);
if (!$result) {
    die("erreur dans la requette : " .$connexion->error);
}
?>
<table border="1px">
    <tr>
    <th>id</th>
    <th>nom</th>
    <th>mdp</th>
    <th>date de connexion</th>
    <th>supprimer</a></th>
    <th>modifier</a></th>
    </tr>
    <?php
    // Affichage des résultats
    while ($row = $result->fetch_assoc()) {?>
    <tr>
    <td><?php echo$row['id'];?> </td>
    <td><?php echo$row['nom'];?> </td>
    <td><?php echo$row['mdp'];?> </td>
    <td><?php echo$row['date_connexion'];?></td>
    <td><a href="delete.php?id=<?php echo $row['id']?>">supprimer</a></td>
    <td><a href="update.php?id=<?php echo $row['id']?>">modifier</a></td>
    </tr>
    <?php
    }
    ?>
</table>

<?php
if (isset($_POST['valider'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $query = $connexion->prepare(
        "INSERT INTO ut (nom,mdp) VALUES (?, ?)"
        );
        $query->bind_param('ss', $nom , $email);
       if ($query->execute()) {
        header("Location: index.php");
        exit();
       }else{
        die("Erreur dans la requête : " . $connexion->error);
       }
       
       
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD en PHP</title>
</head>
<body>

<!-- Formulaire de crÃ©ation -->
<form method="POST" action="">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <button type="submit" name="valider">CrÃ©er</button>
</form>

</body>
</html>

<?php
// Fermeture de la connexion
$connexion->close();
?>
