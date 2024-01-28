<?php
class MonPdo
{
    private static $monPdo;
    private static $unPdo = null;

    private function __construct()
    {
        // Chargement des variables d'environnement
        $env = parse_ini_file('.env');
        $serveur = 'mysql:host=' . $env['DB_HOST'];
        $bdd = 'dbname=' . $env['DB_NAME']; 
        $user = $env['DB_USER']; 
        $mdp = $env['DB_PASSWORD'];

        MonPdo::$unPdo = new PDO($serveur.';'.$bdd, $user, $mdp);
        MonPdo::$unPdo->query("SET CHARACTER SET utf8");
        MonPdo::$unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function __destruct()
    { 
        MonPdo::$unPdo = null;
    }

    public static function getInstance()
    {
        if(self::$unPdo == null)
        {
            self::$monPdo = new MonPdo();
        }
        return self::$unPdo;
    }
}
