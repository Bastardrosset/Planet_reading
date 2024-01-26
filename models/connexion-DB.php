<!-- <?php
try {
    $env = parse_ini_file('.env');

    $dbHost = $env['DB_HOST'];
    $dbUser = $env['DB_USER'];
    $dbPassword = $env['DB_PASSWORD'];
    $dbName = $env['DB_NAME'];

    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

    // Configuration pour lancer des exceptions en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connexion réussie à la base de données!";

    // Autres opérations sur la base de données si la connexion est réussie
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?> -->