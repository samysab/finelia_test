<?php
require_once("DBManager.php");

$conn = DBManager::getConn();

class Note
{
    private $id;
    private $note;
    private $id_etudiant;
    private $coefficient;

    /**
     * Note constructor.
     * @param $id
     * @param $note
     * @param $id_etudiant
     * @param $coefficient
     */
    public function __construct($id, $note, $id_etudiant, $coefficient)
    {
        $this->id = $id;
        $this->note = $note;
        $this->id_etudiant = $id_etudiant;
        $this->coefficient = $coefficient;
    }

    /**
     * @return mixed
     */
    public function getCoefficient()
    {
        return $this->coefficient;
    }

    /**
     * @param mixed $coefficient
     */
    public function setCoefficient($coefficient)
    {
        $this->coefficient = $coefficient;
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
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getIdEtudiant()
    {
        return $this->id_etudiant;
    }

    /**
     * @param mixed $id_etudiant
     */
    public function setIdEtudiant($id_etudiant)
    {
        $this->id_etudiant = $id_etudiant;
    }

    // -------------
    // Methods

    public static function insertNewNote($note, $coeff, $idEtudiant){
        $sql = "INSERT INTO note(note, coefficient, id_etudiant)
        VALUES (:note, :coeffi, :id)";
        $req = $GLOBALS['conn']->prepare($sql);
        $req->execute(array(
            "note" => $note,
            "coeffi" => $coeff,
            "id" => $idEtudiant
        ));
    }
}