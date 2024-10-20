<?php
require_once 'data/db_conn.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>F1 Dashboard Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
    <!-- NavBAR -->
    <header class="container-fluid d-flex flex-wrap justify-content-center py-3 mb-4">
        <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">F1 Dashboard Project</span>
        </a>
            <ul class="nav nav-pills mb-4">
                <li class="nav-item"><a href="#home" class="nav-link active">Home</a>
                <li class="nav-item"><a href="browse.php" class="nav-link">Browse</a></li>
                <li class="nav-item"><a href="api.php" class="nav-link">APIs</a></li>
            </ul>


            <!-- Hero w/ car photo section -->
           <div class="container-fluid p-4 my-2 bg-light rounded-3 text-white" id="herophoto">
           <div class="col-md-6 p-lg-5 mx-auto my-5">
      <h1 class="display-1 fw-bold" id="test">Formula 1 Racing</h1>
      <div class="d-flex gap-3 justify-content-center lead fw-normal">
      </div>
    </div>
            <h1 class="display-5 fw-bold mb-2" class="herotext">Find your racer</h1>
            <p class="col-md-8 lead mb-5" class="herotext">"Speed cost money. How fast do you want to go?"</p>
            <a href="browse.php">
                <button class="btn btn-dark btn-lg" type="button"> Browse</button> 
            </a>
           </div>
    </header>

    <!-- Main content -->
<main>

<div class="container marketing">
    
<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading fw-normal lh-1">What is this site about?</h2>
    <p class="lead">Welcome to the ultimate hub for Formula 1 racing enthusiasts! This website offers an immersive look into the world of Formula 1 racing, focusing on detailed race data from the 2022 season. Our platform is powered by a comprehensive SQLite database containing decades of race data, enabling you to dive deep into the thrilling world of F1..</p>
    <a href="https://github.com/MiguelMalig/f2024-assign1">
        <button class="btn btn-secondary rounded-pill px-3" type="button">Click Here For Our Github Repo!</button>
    </a>    
  </div>
  <div class="col-md-5">
    <img src="photos/svg1.svg" alt="photocar" width="500" height="500">
  </div>
</div>

<hr class="featurette-divider">

<!-- Creators section -->
    <h2 class="featurette-heading fw-normal lh-1 " id="creators">Our Creators</h2>

<!-- Character photos from https://www.freepik.com/search?format=search&last_filter=selection&last_value=1&query=face%20svg&selection=1 -->
<div class="text-center"><title>Creators</title></div>
<div class="row">
  <div class="col-lg-6">
    <img class="rounded-circle"src="photos/Character1.jpg" alt="Miguel" width="200" height="200";>
      <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
    </svg>
    <h2 class="fw-normal">Miguel</h2>
  </div>

  <div class="col-lg-6">
    <img class="rounded-circle"src="photos/Character2.jpg" alt="Miguel" width="200" height="200";>
      <title>Justin</title>
    <h2 class="fw-normal">Justin</h2>
  </div>
</div>

        
</main>
    
</body>
</html>
