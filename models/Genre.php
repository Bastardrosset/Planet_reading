<?php
class Genre {
    
    /**
     * numero du genre
     *
     * @var int
     */
    private $num;

    /**
     * Libelle du genre
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
     * Lit le libelle
     *
     * @return string
     */
    public function getLibelle() : string
    {
    return $this->libelle;
    }

    /**
     * ecrit dans le libellé
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle(string $libelle) : self
    {
    $this->libelle = $libelle;

    return $this;
    }

    /**
     * Retourne l'ensemble des genres
     *
     * @return Genre[] tableau d'objet genre
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM genre");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouve un genre par son num
     *
     * @param integer $id numéro du genre
     * @return Genre objet genre trouvé
     */
    public static function findById(int $id) :Genre
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM genre WHERE num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
        $req->bindParam(':id', $id);
        $req->execute();
        $leResultats=$req->fetch();
        return $leResultats;
    }

    /**
     * Permet d'ajouter un genre
     *
     * @param Genre $genre genre à ajouter
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function add(Genre $genre) :int
    {
        $req=MonPdo::getInstance()->prepare("INSERT INTO genre(libelle) VALUES(:libelle)");
        $libelle=$genre->getLibelle();
        $req->bindParam(':libelle', $libelle);
        $nb=$req->execute();
        return $nb;  
    }

    /**
     * permet de modifier un genre
     *
     * @param Genre $genre genre à modifier
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function update(Genre $genre) :int
    {
        $req=MonPdo::getInstance()->prepare("UPDATE genre SET libelle= :libelle WHERE num= :id");
        $num=$genre->getNum();
        $libelle=$genre->getLibelle();
        $req->bindParam(':id', $num);
        $req->bindParam(':libelle', $libelle);
        $nb=$req->execute();
        return $nb;  
    }

    /**
     * Permet de supprimer un genre
     *
     * @param Genre $genre
     * @return integer
     */
    public static function delete(Genre $genre) :int
    {
        $req=MonPdo::getInstance()->prepare("DELETE FROM genre WHERE num= :id");
        $num=$genre->getNum();
        $req->bindParam(':id', $num);
        $nb=$req->execute();
        return $nb; 
    }


    /**
     * Set numero du genre
     *
     * @param  int  $num  numero du genre
     *
     * @return  self
     */ 
    public function setNum(int $num) :self
    {
        $this->num = $num;

        return $this;
    }

    public static function nombreGenres():int
    {
        $texteReq="SELECT count(*) AS 'nb' FROM genre";
        $req=MonPdo::getInstance()->prepare($texteReq);
        $req->execute();
        $leResultat=$req->fetch();
        return $leResultat[0];
    }
}