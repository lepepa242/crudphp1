<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
<?php
// Inclure le fichier de connexion
include_once('connexion.php');

// Vérifier si l'ID est présent dans l'URL
if(isset($_GET['id'])){
    // Récupérer l'ID de l'URL
    $id = $_GET['id'];

    // Requête SQL SELECT
    $query_select = "SELECT*FROM ut WHERE id = $id";
    $result_select = $connexion->query($query_select);

    // Vérifier si la requête SELECT a réussi
    if($result_select){
        $row = $result_select->fetch_assoc();
?>
        <form action="" method="POST">
            <!-- Utiliser des champs cachés pour transmettre l'ID -->
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="text" name="nom" value="<?php echo $row['nom'] ?>">
            <input type="text" name="email" value="<?php echo $row['date_connexion'] ?>">
            <!-- Ajouter un bouton avec le type "submit" -->
            <button type="submit" name="update" value="yes">Mettre à jour</button>
        </form>
<?php
    } else {
        // Gérer l'erreur de la requête SELECT
        echo "Erreur dans la requête SELECT : " . $connexion->error;
    }
} else {
    // Gérer le cas où l'ID n'est pas présent dans l'URL
    echo "ID non spécifié dans l'URL.";
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['update'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['date_connexion'];

    // Requête SQL UPDATE
    $query_update = "UPDATE ut SET nom = '$nom' WHERE id = $id";
    $result_update = $connexion->query($query_update);

    

    // Vérification des erreurs
    if (!$result_update) {
        die("Erreur dans la requête UPDATE : " . $connexion->error);
    }

    // Redirection après la modification
    header("Location: index.php");
    exit();
}
?>
<a href="index.php">retour au menu</a>
</body>
</html>
