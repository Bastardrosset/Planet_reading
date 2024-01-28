<?php
class Genre {
    /**
     * number of genre
     *
     * @var int
     */
    private $num;
    /**
     * libelle of genre
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
     * return all genres
     *
     * @return array Genre
     */
    public static function findAll(): array
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM genre");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Genre");
        $req->execute();
        $results=$req->fetchAll();
        return $results;
    }
    /**
     * find a genre by id
     *
     * @param integer $id
     * @return Genre
     */
    public static function findById(int $id): Genre
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM genre where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Genre");
        $req->bindParam(":id", $id);
        $req->execute();
        $results=$req->fetch();
        return $results;
    }
    /**
     * Add a genre
     *
     * @param Genre $genre
     * @return integer
     */
    public static function add(Genre $genre): int
    {
        $req=MonPdo::getInstance()->prepare("INSERT INTO genre(libelle) values(:libelle)");
        $libelle=$genre->getLibelle();
        $req->bindParam(":libelle", $libelle);
        $nb=$req->execute();
        return $nb;
    }
    /**
     * update a genre 
     *
     * @param Genre $genre
     * @return integer
     */
    public static function update(Genre $genre): int
    {
        $req=MonPdo::getInstance()->prepare("UPDATE genre SET libelle= :libelle WHERE num= :id");
        $num=$genre->getNum();
        $libelle=$genre->getLibelle();
        $req->bindParam(":id", $num);
        $req->bindParam(":libelle", $libelle);
        $nb=$req->execute();
        return $nb;
    }
    /**
     * delete a genre
     *
     * @param Genre $genre
     * @return integer
     */
    public static function delete(Genre $genre): int
    {
        $req=MonPdo::getInstance()->prepare("DELETE FROM genre WHERE num= :id");
        $num=$genre->getNum();
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