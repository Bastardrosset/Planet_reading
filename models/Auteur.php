<?php
class Auteur {
    /**
     * number of auteur
     *
     * @var int
     */
    private $num;
    /**
     * firstname of auteur
     *
     * @var string
     */
    private $prenom;
    /**
     * name of auteur
     *
     * @var string
     */
    private $nom;
    /**
     * foreign key of num nationalité
     *
     * @var int
     */
    private $numNationalite;
    
    /**
     * Get the value of num
     */
    public function getNum()
    {
        return $this->num;
    }
       /**
     * Set numéro of auteur
     *
     * @param  int  $num  numéro de l'auteur'
     *
     * @return  self
     */ 
    public function setNum(int $num) :self
    {
        $this->num = $num;

        return $this;
    }
    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }
    /**
     * Get the value of Nationalite
     *
     * @return Nationalite
     */
    public function getNationalite(): Nationalite
    {
        return Nationalite::findById($this->numNationalite);
    }

    /**
     * Set the value of num nationalite
     *
     * @param Continent $nationalite
     * @return self
     */
    public function setNationalite(Nationalite $nationalite): self
    {
        $this->numNationalite = $nationalite->getNum();

        return $this;
    }

    /**
     * return all auteurs
     *
     * @return array auteur
     */
    public static function findAll(?string $prenom="", ?string $nom="", ?string $nationalite="Toutes"): array
    {
        $textReq = "SELECT a.num AS numero, a.nom, a.prenom, n.libelle FROM auteur a, nationalite n WHERE a.numNationalite=n.num";

        if ($nom != "") {
            $textReq .= " AND a.nom LIKE '%" . $nom . "%'";
        }
        if ($prenom != "") {
            $textReq .= " AND a.prenom LIKE '%" . $prenom . "%'";
        }
        if ($nationalite != "Toutes") {
            $textReq .= " AND n.num =" . $nationalite;
        }

        $textReq .= " ORDER BY a.nom";

        $req = MonPdo::getInstance()->prepare($textReq);
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $results = $req->fetchAll();
        return $results;
    }
    /**
     * find a auteur by id
     *
     * @param integer $id
     * @return Auteur
     */
    public static function findById(int $id): Auteur
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM auteur WHERE num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Auteur");
        $req->bindParam(":id", $id);
        $req->execute();
        $results=$req->fetch();
        return $results;
    }
    /**
     * Add a auteur
     *
     * @param Auteur $auteur
     * @return integer
     */
    public static function add(Auteur $auteur): int
    {
        $req = MonPdo::getInstance()->prepare("INSERT INTO auteur (nom, prenom, numNationalite) VALUES (:nom, :prenom, :numNationalite)");
        $req->bindParam(":nom", $auteur->getNom());
        $req->bindParam(":prenom", $auteur->getPrenom());
        $req->bindParam(":numNationalite", $auteur->numNationalite);
        $nb=$req->execute();
        
        return $nb;
    }
    /**
     * update a auteur 
     *
     * @param Auteur $auteur
     * @return integer
     */
    public static function update(Auteur $auteur): int
    {
        $req=MonPdo::getInstance()->prepare("UPDATE auteur SET nom= :nom, prenom= :prenom, numNationalite= :numNationalite WHERE num= :id");
        $req->bindParam(":id", $auteur->getNum());
        $req->bindParam(":nom", $auteur->getNom());
        $req->bindParam(":prenom", $auteur->getPrenom());
        $req->bindParam(":numNationalite", $auteur->numNationalite);
        $nb=$req->execute();
        return $nb;
    }
    /**
     * delete a Auteur
     *
     * @param Auteur $Auteur
     * @return integer
     */
    public static function delete(Auteur $auteur): int
    {
        $req=MonPdo::getInstance()->prepare("DELETE FROM auteur WHERE num= :id");
        $req->bindParam(":id", $auteur->getnum());
        $nb=$req->execute();
        return $nb;
    }
}
