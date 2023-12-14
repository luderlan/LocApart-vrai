<?php
require_once("../class/type_bien.php");    

class bien
{
    private $con;
    private $id_bien;
    private $nom_bien;
    private $rue_bien;
    private $codeP_bien;
    private $vil_bien;
    private $sup_bien;
    private $nb_couchage;
    private $nb_piece;
    private $nb_chambre;
    private $descriptif;
    private $ref_bien;
    private $statut_bien;
    private $id_type_bien;
    private $lib_type_bien;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getid_bien()
    {
        return $this->id_bien;
    }

    public function getnom_bien()
    {
        return $this->nom_bien;
    }

    public function getrue_bien()
    {
        return $this->rue_bien;
    }

    public function getcodeP_bien()
    {
        return $this->codeP_bien;
    }

    public function getvil_bien()
    {
        return $this->vil_bien;
    }

    public function getsup_bien()
    {
        return $this->sup_bien;
    }

    public function getnb_couchage_bien()
    {
        return $this->nb_couchage;
    }

    public function getnb_piece_bien()
    {
        return $this->nb_piece;
    }

    public function getnb_chambre_bien()
    {
        return $this->nb_chambre;
    }

    public function getdescriptif_bien()
    {
        return $this->descriptif;
    }

    public function getref_bien()
    {
        return $this->ref_bien;
    }

    public function getstatut_bien()
    {
        return $this->statut_bien;
    }

    public function getid_type_bien()
    {
        return $this->id_type_bien;
    }

    public function getlib_type_bien($id_type_bien,$c)
    {
       
        $oTypebien = new type_bien($c);
        $lib_type_bien = $oTypebien -> getlib_type_bien($id_type_bien);
        return $lib_type_bien;
    }

    public function setnom_bien($nob)
    {
        $this->nom_bien = $nob;
    }

    public function setrue_bien($r)
    {
        $this->rue_bien = $r;
    }

    public function setcodeP_bien($cp)
    {
        $this->codeP_bien = $cp;
    }

    public function setvil_bien($v)
    {
        $this->vil_bien = $v;
    }

    public function setsup_bien($s)
    {
        $this->sup_bien = $s;
    }

    public function setnb_couchage($nbco)
    {
        $this->nb_couchage = $nbco;
    }

    public function setnb_piece($nbp)
    {
        $this->nb_piece = $nbp;
    }

    public function setnb_chambre($nbch)
    {
        $this->nb_chambre = $nbch;
    }

    public function setdescriptif($d)
    {
        $this->descriptif = $d;
    }

    public function setref_bien($rb)
    {
        $this->ref_bien = $rb;
    }

    public function setstatut_bien($sb)
    {
        $this->statut_bien = $sb;
    }

    public function setid_type_bien($idt)
    {
        $this->id_type_bien = $idt;
    }
    
    public function setlib_type_bien($lt)
    {
        $this->lib_type_bien = $lt;
    }

    public function selectBien()
    {
        $sql = "SELECT * FROM biens WHERE valid_bien = '0'";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function insert($id,$nob, $r, $cp, $v, $s, $nbco, $nbp, $nbch, $d, $rb, $sb, $idt)
    {
        $data = ["id_bien" => NULL,
            ":nom_bien" => $nob,
        ":rue_bien" => $r ,
        ":codeP_bien" => $cp ,
        ":vil_bien" => $v,
        ":sup_bien" => $s ,
        ":nb_couchage" => $nbco,
        ":nb_piece" =>$nbp,
        ":nb_chambre" => $nbch,
        ":descriptif" => $d ,
        ":ref_bien" => $rb ,
        ":statut_bien" => $sb ,
        ":id_type_bien" => $idt];
   

        $sql = "INSERT INTO biens (id_bien,nom_bien, rue_bien, codeP_bien, vil_bien, sup_bien,nb_couchage,
         nb_piece, nb_chambre, descriptif, ref_bien, statut_bien,id_type_bien)
         VALUES (:id_bien,:nom_bien, :rue_bien, :codeP_bien, :vil_bien, :sup_bien,:nb_couchage,
         :nb_piece, :nb_chambre, :descriptif, :ref_bien, :statut_bien, :id_type_bien)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function update($id, $nob, $r, $cp, $v, $s, $nbco, $nbp, $nbch, $d, $rb, $sb, $idt)
    {
        $data = [
           
            ":nom_bien" => $nob,
            ":rue_bien" => $r,
            ":codeP_bien" => $cp,
            ":vil_bien" => $v,
            ":sup_bien" => $s,
            ":nb_couchage" => $nbco,
            ":nb_piece" => $nbp,
            ":nb_chambre" => $nbch,
            ":descriptif" => $d,
            ":ref_bien" => $rb,
            ":statut_bien" => $sb,
            ":id_type_bien" => $idt
        ];
        $sql = "UPDATE biens SET nom_bien = :nom_bien, rue_bien = :rue_bien, codeP_bien = :codeP_bien, vil_bien = :vil_bien, 
        sup_bien = :sup_bien, nb_couchage = :nb_couchage, nb_piece = :nb_piece, nb_chambre = :nb_chambre, descriptif = :descriptif, 
        ref_bien = :ref_bien, statut_bien = :statut_bien, id_type_bien = :id_type_bien  WHERE id_bien = $id";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $data = [":id_bien" => $id];
        $sql = "UPDATE biens SET valid_bien = 1 WHERE id_bien = :id_bien";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function selectById($id)
    {
        $data = [":id_bien" => $id];
        $sql = "SELECT nom_bien, rue_bien, codeP_bien, vil_bien, sup_bien,nb_couchage,
        nb_piece, nb_chambre, descriptif, ref_bien, statut_bien,id_type_bien FROM biens WHERE id_bien = :id_bien";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }
}

?>