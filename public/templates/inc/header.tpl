<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../../js/jquery-3.4.1.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/jquery-ui.min.css">
    <link rel="stylesheet" href="../../css/style.css">

    <title>Główna</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Biblioteka</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="/autorzy">Autorzy <span class="sr-only">(current)</span></a>
                <!--                <a class="nav-item nav-link" href="--><?php //echo action('gatunek')?><!--">Gatunki literackie</a>-->
                <a class="nav-item nav-link" href="--><?php //echo action('ksiazki')?><!--">Książki</a>
                <!--                <a class="nav-item nav-link" href="--><?php //echo action('reports')?><!--">Reports</a>-->

            </div>
        </div>
    </div>
</nav>