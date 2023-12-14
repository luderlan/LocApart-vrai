<?php

class Contact
{

    //variables
    private $con;
    private $id_contact;
    private $prenomC;
    private $nomC;
    private $emailC;
    private $telephoneC;
    private $MessageC;
    private $date_creationC;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function insertContact($prenom,$nom,$mail,$tel,$msg)
    {
        $data = [
            ":prenom" => $prenom,
            ":nom" => $nom,
            ":mail" => $mail,
            ":tel" => $tel,
            ":msg" => $msg
        ];

        $sql = "INSERT INTO contact (prenomC, nomC, emailC, telephoneC, MessageC)
        VALUES (:prenom, :nom, :mail, :tel, :msg)";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }
}

?>