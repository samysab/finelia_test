<?php
require_once("DBManager.php");

$conn = DBManager::getConn();


class Etudiant
{
    private $id;
    private $lastname;
    private $firstname;

    /**
     * Etudiant constructor.
     * @param $id
     * @param $lastname
     * @param $firstname
     */
    public function __construct($id, $lastname, $firstname)
    {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
    }

    //----------------
    // Getters
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }


    //----------------
    // Setters

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    //----------------
    // Methods
    public static function insertNewStudent($firs, $last)
    {
        $sql = "INSERT INTO etudiant(nom, prenom)
        VALUES (:nom, :prenom)";
        $req = $GLOBALS['conn']->prepare($sql);
        $req->execute(array(
            "nom" => $firs,
            "prenom" => $last
        ));
        return $GLOBALS['conn']->lastInsertId();
    }


}