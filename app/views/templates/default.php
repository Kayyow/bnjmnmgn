<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Le portfolio des projets graphiques de Benjamin Maigné">
    <meta name="author" content="Kayyow">

    <title>Benjamin MAIGNE</title>
    <link rel="stylesheet" href="/styles/main.css">
</head>

<body>

    <div class="wrapper">

        <nav>
            <a href="/">
            <div class="title_container">
                <img src="/logo.png"/>
                <h1><b>Maigné</b> Benjamin</h1>
            </div>
            </a>
            
            <div class="nav_links">
                <a href="/">Accueil</a>
                <a href="/?page=information">Moi même</a>
                <a href="/?page=contact">Contact</a>
            </div>
        </nav>

        <div class="main_container">
            <?= $content; ?>
        </div>

    </div>
    
    <script type="text/javascript" src="/scripts/script.js"></script>
</body>
</html>
