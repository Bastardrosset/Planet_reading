<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Exercice_PHP Jumbotron-example · Bootstrap v5.1</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/jumbotron/">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
        <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
        <meta name="theme-color" content="#7952b3">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
        </style>

        
    </head>
    <body>  
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
                        <div class="container-fluid">
                            <a class="navbar-brand text-light" href="index.php">Ma bibliothèque</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdownGenres" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Genres
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownGenres">
                                            <li><a class="dropdown-item" href="index.php?uc=genres&action=list">Liste des genres</a></li>
                                            <li><a class="dropdown-item" href="index.php?uc=genres&action=add">Ajouter un genre</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdownAutors" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-fill"></i>
                                        Auteurs
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownAutors">
                                            <li><a class="dropdown-item" href="index.php?uc=auteurs&action=list">Liste des auteurs</a></li>
                                            <li><a class="dropdown-item" href="index.php?uc=auteurs&action=add">Ajouter un auteur</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdownNationalities" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-flag-fill"></i>
                                        Nationalités
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownNationalities">
                                            <li><a class="dropdown-item" href="index.php?uc=nationalites&action=list">Liste des nationalités</a></li>
                                            <li><a class="dropdown-item" href="index.php?uc=nationalites&action=add">Ajouter une nationalité</a></li>
                                        </ul>
                                    </li>                                
                                    <li class="nav-item dropdown">
                                        <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdownContinent" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-globe-europe-africa"></i>
                                        Continents
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownContinent">
                                            <li><a class="dropdown-item" href="index.php?uc=continents&action=list">Gestion des continents</a></li>
                                            <li><a class="dropdown-item" href="index.php?uc=continents&action=add">Ajouter un continent</a></li>
                                        </ul>
                                    </li>                                
                                </ul>
                                <form class="d-flex">
                                    <input class="form-control me-2 bg-light" type="search" aria-label="Search">
                                    <button class="btn btn-outline-success text-dark" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </nav>
            </header>

        

