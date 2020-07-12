<?php
require_once("DBManager.php");

$conn = DBManager::getConn();


class Matiere
{
    private $id;
    private $nomMatiere;

    /**
     * Matiere constructor.
     * @param $id
     * @param $nomMatiere
     */
    public function __construct($id, $nomMatiere)
    {
        $this->id = $id;
        $this->nomMatiere = $nomMatiere;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNomMatiere()
    {
        return $this->nomMatiere;
    }

    /**
     * @param mixed $nomMatiere
     */
    public function setNomMatiere($nomMatiere)
    {
        $this->nomMatiere = $nomMatiere;
    }

    // ----------
    // Methods

    public static function insertNewMatiere($matiere){
        $sql = "INSERT INTO matiere(nomMatiere)
        VALUES (:nom)";
        $req = $GLOBALS['conn']->prepare($sql);
        $req->execute(array(
            "nom" => $matiere
        ));
    }

}