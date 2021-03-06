<?php
/* Smarty version 3.1.36, created on 2020-10-05 23:47:35
  from 'C:\xampp\htdocs\biblioteka\public\templates\inc\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f7b9477d928c3_51402807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ddcf5bfc9ffb499bc3186a0dd7b29826142f3a72' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biblioteka\\public\\templates\\inc\\header.tpl',
      1 => 1601934452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7b9477d928c3_51402807 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo '<script'; ?>
 src="../../js/jquery-3.4.1.min.js"><?php echo '</script'; ?>
>

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
                <!--                <a class="nav-item nav-link" href="--><?php echo '<?php ';?>
//echo action('gatunek')<?php echo '?>';?>
<!--">Gatunki literackie</a>-->
                <a class="nav-item nav-link" href="/ksiazki/index">Książki</a>
                <!--                <a class="nav-item nav-link" href="--><?php echo '<?php ';?>
//echo action('reports')<?php echo '?>';?>
<!--">Reports</a>-->

            </div>
        </div>
    </div>
</nav><?php }
}
