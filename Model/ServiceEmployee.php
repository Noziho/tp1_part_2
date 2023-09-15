<?php
namespace App\Model;
use App\Utils\DbConnect;
use PDOStatement;
use Validation;

require "utils/DbConnect.php";
require "utils/Validation.php";

class ServiceEmployee
{

    public static function addEmployee (): void
    {
        $db_conect = DbConnect::getInstance();
        $stmt = $db_conect->getPdo()->prepare("
            INSERT INTO emp(nom, prenom, emploi, sup, embauche, sal,comm,noserv)
            VALUES (:nom, :prenom, :emploi, :sup, :embauche, :sal, :comm, :noserv)
        ");

        $status = $stmt->execute([
            ":nom" => Validation::sanitize($_POST['nom']),
            ":prenom" => Validation::sanitize($_POST['prenom']),
            ":emploi" => Validation::sanitize($_POST['emploi']),
            ":sup" => Validation::sanitize($_POST['sup']),
            ":embauche" => Validation::sanitize($_POST['embauche']),
            ":sal" => Validation::sanitize($_POST['sal']),
            ":comm" => Validation::sanitize($_POST['comm']),
            ":noserv" => Validation::sanitize($_POST['noserv'])
        ]);
        if ($status) {
            header("Location:employe.php");
        }else {
            header('Location:index.php');
        }
    }

    public static function editEmployee (int $noemp): void
    {
        $db_conect = DbConnect::getInstance();
        $stmt = $db_conect->getPdo()->prepare("UPDATE emp SET nom = :nom, prenom = :prenom, emploi= :emploi, sup= :sup, embauche = :embauche, sal= :sal, comm= :comm, noserv = :noserv WHERE noemp = $noemp");

        $status = $stmt->execute([
            ":nom" => Validation::sanitize($_POST['nom']),
            ":prenom" => Validation::sanitize($_POST['prenom']),
            ":emploi" => Validation::sanitize($_POST['emploi']),
            ":sup" => Validation::sanitize($_POST['sup']),
            ":embauche" => Validation::sanitize($_POST['embauche']),
            ":sal" => Validation::sanitize($_POST['sal']),
            ":comm" => Validation::sanitize($_POST['comm']),
            ":noserv" => Validation::sanitize($_POST['noserv'])
        ]);
    }

    public function deleteEmployee (int $noemp): void
    {
        $db_conect = DbConnect::getInstance();
        $stmt = $db_conect->getPdo()->query("DELETE FROM emp WHERE noemp = $noemp")->execute();
    }

    public static function getEmployees(): PDOStatement
    {
        $db_conect = DbConnect::getInstance();
        return $db_conect->getPdo()->query("SELECT * FROM emp");
    }

    public static function getEmployeeByNoemp(int $noemp)
    {
        $db_conect = DbConnect::getInstance();
        return $db_conect->getPdo()->query("SELECT * FROM emp WHERE noemp = $noemp")->fetch();
    }

}