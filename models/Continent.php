<?php
class Continent {
    /**
     * number of continent
     *
     * @var int
     */
    private $num;
    /**
     * libelle of continent
     *
     * @var string
     */
    private $libelle;
    
    /**
     * Get the value of num
     */
    public function getNum()
    {
        return $this->num;
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
     * return all continents
     *
     * @return array Continent
     */
    public static function findAll(): array
    {
        $req=MonPdo::getInstance()->prepare("select * from continent");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Continent");
        $req->execute();
        $results=$req->fetchAll();
        return $results;
    }
    /**
     * find a continent by id
     *
     * @param integer $id
     * @return Continent
     */
    public static function findById(int $id): Continent
    {
        $req=MonPdo::getInstance()->prepare("select * from continent where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Continent");
        $req->bindParam(":id", $id);
        $req->execute();
        $results=$req->fetch();
        return $results;
    }
    /**
     * Add a continent
     *
     * @param Continent $continent
     * @return integer
     */
    public static function add(Continent $continent): int
    {
        $req=MonPdo::getInstance()->prepare("insert into continent(libelle) values(:libelle)");
        $libelle=$continent->getLibelle();
        $req->bindParam(":libelle", $libelle);
        $nb=$req->execute();
        return $nb;
    }
    /**
     * update a continent 
     *
     * @param Continent $continent
     * @return integer
     */
    public static function update(Continent $continent): int
    {
        $req=MonPdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
        $num=$continent->getNum();
        $libelle=$continent->getLibelle();
        $req->bindParam(":id", $num);
        $req->bindParam(":libelle", $libelle);
        $nb=$req->execute();
        return $nb;
    }
    /**
     * delete a continent
     *
     * @param Continent $continent
     * @return integer
     */
    public static function delete(Continent $continent): int
    {
        $req=MonPdo::getInstance()->prepare("delete from continent where num= :id");
        $num=$continent->getNum();
        $req->bindParam(":id", $num);
        $nb=$req->execute();
        return $nb;
    }


    /**
     * Set the value of num
     */
    public function setNum(int $num): self
    {
        $this->num = $num;

        return $this;
    }
}

?>