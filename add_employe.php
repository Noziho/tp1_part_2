<?php

use App\Model\ServiceEmployee;

require "Model/ServiceEmployee.php";

require "utils/Validation.php";
if ( Validation::issetPostParams(
    'noemp',
    'nom',
    'prenom',
    'emploi',
    'sup',
    'embauche',
    'sal',
    'comm',
    'noserv')) {
    try {
        ServiceEmployee::addEmployee();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    header('Location:index.php');
}
