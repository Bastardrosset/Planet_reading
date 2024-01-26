<?php
class Nationality {
    /**
     * number of nationality
     *
     * @var int
     */
    private $num;
    /**
     * libelle of nationality
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
    public function getNumContinent(): Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * Set the value of numContinent
     *
     * @param Continent $continent
     * @return self
     */
    public function setNumContinent(Continent $continent): self
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }

    /**
     * return all nationalitys
     *
     * @return array nationality
     */
    public static function findAll(): array
    {
        $req=MonPdo::getInstance()->prepare("select n.num as numero, n.libelle as 'libNation', c.libelle as 'libContinent'  from nationalite n, continent c where n.numContinent=c.num");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $results=$req->fetchAll();
        return $results;
    }
    /**
     * find a nationality by id
     *
     * @param integer $id
     * @return Nationality
     */
    public static function findById(int $id): Nationality
    {
        $req=MonPdo::getInstance()->prepare("select * from nationalite where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Nationalite");
        $req->bindParam(":id", $id);
        $req->execute();
        $results=$req->fetch();
        return $results;
    }
    /**
     * Add a nationality
     *
     * @param Nationality $nationality
     * @return integer
     */
    public static function add(Nationality $nationality): int
    {
        $req=MonPdo::getInstance()->prepare("insert into nationalite (libelle,numContinent) values(:libelle, :numContinent)");
        $req->bindParam(":libelle", $nationality->getLibelle());
        $req->bindParam(":numContinent", $nationality->numContinent);
        $nb=$req->execute();
        return $nb;
    }
    /**
     * update a nationality 
     *
     * @param Nationality $nationality
     * @return integer
     */
    public static function update(Nationality $nationality): int
    {
        $req=MonPdo::getInstance()->prepare("update nationalite set libelle= :libelle, numContinent= :numContinent where num= :id");
        $req->bindParam(":id", $nationality->getNum());
        $req->bindParam(":libelle", $nationality->getLibelle());
        $req->bindParam(":numContinent", $nationality->numContinent);
        $nb=$req->execute();
        return $nb;
    }
    /**
     * delete a Nationality
     *
     * @param Nationality $Nationality
     * @return integer
     */
    public static function delete(Nationality $nationality): int
    {
        $req=MonPdo::getInstance()->prepare("delete from nationalite where num= :id");
        $req->bindParam(":id", $nationality->getnum());
        $nb=$req->execute();
        return $nb;
    }

}
