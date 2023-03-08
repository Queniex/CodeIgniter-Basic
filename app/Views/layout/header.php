<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <style>
    /* *{
        border: red 1px solid;
    } */

    .nav-link {
        background-color: rgba(0,0,0,0.85);
        color: white;
        /* height:70px;
        font-size:2em; */
    }

    .x{
        color: blue;
        /* height:70px;
        font-size:2em; */
    }

    .nav-link:hover {
        color: blue; // Any color for text
    }
  </style>
  <body>

    <nav class="navbar navbar-expand-lg bg-black">
        <div class="container">
                <a class="navbar-brand" href="<?= base_url('/'); ?>">Quenie Salbiyah</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('/'); ?>">Home</a>
                    <a class="nav-link" href="<?= base_url('/pages/about'); ?>">About</a>
                    <a class="nav-link" href="<?= base_url('/pages/contact'); ?>">Contact</a>
                </div>
                </div>
        </div>
    </nav>
