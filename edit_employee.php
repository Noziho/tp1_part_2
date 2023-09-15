<?php

use App\Model\ServiceEmployee;

require "Model/ServiceEmployee.php";

$employe = ServiceEmployee::getEmployeeByNoemp($_GET['p']);
var_dump($employe);

if (isset($_POST['submit'])) {
    ServiceEmployee::editEmployee($_GET['p']);
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <title>Title</title>
</head>
<body>
<div class="container">
    <h1>Edition</h1>
    <form action="edit_employee.php?p=<?= $_GET['p'] ?>" method="post">
        <input type="number" name="noemp" placeholder="<?= $employe['noemp'] ?>">
        <input type="text" name="nom" placeholder="<?= $employe['nom'] ?>">
        <input type="text" name="prenom" placeholder="<?= $employe['prenom'] ?>">
        <input type="text" name="emploi" placeholder="<?= $employe['emploi'] ?>">
        <input type="number" name="sup" placeholder="<?= $employe['sup'] ?>">
        <input type="date" name="embauche" placeholder="<?= $employe['embauche'] ?>">
        <input type="number" name="sal" placeholder="<?= $employe['sal'] ?>">
        <input type="number" name="comm" placeholder="<?= $employe['comm'] ?>">
        <input type="number" name="noserv" placeholder="<?= $employe['noserv'] ?>">

        <input type="submit" name="submit" value="valider">
    </form>
</div>
</body>
</html>