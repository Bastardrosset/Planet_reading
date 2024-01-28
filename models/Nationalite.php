<?php
class Nationalite {
    /**
     * number of nationalite
     *
     * @var int
     */
    private $num;
    /**
     * libelle of nationalite
     *
     * @var string
     */
    private $libelle;
    /**
     * foreign key of numContinent
     *
     * @var int
     */
    private $numContinent;
    
    /**
     * Get the value of num
     */
    public function getNum()
    {
        return $this->num;
    }
       /**
     * Set numéro of nationalite
     *
     * @param  int  $num  numéro de la nationalité
     *
     * @return  self
     */ 
    public function setNum(int $num) :self
    {
        $this->num = $num;

        return $this;
    }

    /**
     * read the libelle
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * write the libelle
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }
    /**
     * Get the value of numContinent
     *
     * @return Continent
     */
    public function getContinent(): Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * Set the value of numContinent
     *
     * @param Continent $continent
     * @return self
     */
    public function setContinent(Continent $continent): self
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }

    /**
     * return all nationalites
     *
     * @return array nationalite
     */
    public static function findAll(?string $libelle="", ?string $continent="Tous"): array
    {
        $textReq = "SELECT n.num AS numero, n.libelle AS 'libNation', c.libelle AS 'libContinent' FROM nationalite n, continent c WHERE n.numContinent=c.num";

        if ($libelle != "") {
            $textReq .= " AND n.libelle LIKE '%" . $libelle . "%'";
        }
        if ($continent != "Tous") {
            $textReq .= " AND c.num =" . $continent;
        }

        $textReq .= " ORDER BY n.libelle";

        $req = MonPdo::getInstance()->prepare($textReq);
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $results = $req->fetchAll();
        return $results;
    }
    /**
     * find a nationalite by id
     *
     * @param integer $id
     * @return Nationalite
     */
    public static function findById(int $id): Nationalite
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM nationalite WHERE num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Nationalite");
        $req->bindParam(":id", $id);
        $req->execute();
        $results=$req->fetch();
        return $results;
    }
    /**
     * Add a nationalite
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function add(Nationalite $nationalite): int
    {
        $req = MonPdo::getInstance()->prepare("INSERT INTO nationalite (libelle, numContinent) VALUES (:libelle, :numContinent)");
        $req->bindParam(":libelle", $nationalite->getLibelle());
        $req->bindParam(":numContinent", $nationalite->numContinent);
        $nb=$req->execute();
        
        return $nb;
    }
    /**
     * update a nationalite 
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function update(Nationalite $nationalite): int
    {
        $req=MonPdo::getInstance()->prepare("UPDATE nationalite SET libelle= :libelle, numContinent= :numContinent WHERE num= :id");
        $req->bindParam(":id", $nationalite->getNum());
        $req->bindParam(":libelle", $nationalite->getLibelle());
        $req->bindParam(":numContinent", $nationalite->numContinent);
        $nb=$req->execute();
        return $nb;
    }
    /**
     * delete a Nationalite
     *
     * @param Nationalite $Nationalite
     * @return integer
     */
    public static function delete(Nationalite $nationalite): int
    {
        $req=MonPdo::getInstance()->prepare("DELETE FROM nationalite WHERE num= :id");
        $req->bindParam(":id", $nationalite->getnum());
        $nb=$req->execute();
        return $nb;
    }

}
