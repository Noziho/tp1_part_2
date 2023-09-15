<?php
require 'Model/ServiceEmployee.php';

use App\Model\ServiceEmployee;

try {
    $employes = ServiceEmployee::getEmployees() ?>

    <h1>Liste des Employés</h1>
    <div class='card-container'>
        <?php foreach ($employes as $employe) { ?>
            <div class='card'>
                <img src="img/employe.jpg" alt="service">
                <div class="container">
                    <h2><?= $employe['nom'] . ' ' . $employe['prenom'] ?></h2>
                    <p>Emploi : <?= $employe['emploi'] ?></p>
                    <p>Sup : <?= $employe['sup'] ?></p>
                    <p>Date d'embauche : <?= $employe['embauche'] ?></p>
                    <p>Salaire : <?= $employe['sal'] ?></p>
                    <p>Commission : <?= $employe['comm'] ?></p>
                    <p>Noserv : <?= $employe['noserv'] ?></p>
                    <a href="edit_employee.php?p=<?= $employe['noemp'] ?>">EDITER</a>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>


