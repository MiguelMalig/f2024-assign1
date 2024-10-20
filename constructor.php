<?php

    if (isset($_GET['constructorRef'])) {
        $constructorRef = $_GET['constructorRef'];

        $jsonListConstructor = file_get_contents("http://localhost/f2024-assign1/api/results.php?constructorRef=$constructorRef");
        $constructors = json_decode($jsonListConstructor, true);
        foreach($constructors as $constructor){
      
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">F1 Dashboard Project</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/f2024-assign1/index.php?" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="/f2024-assign1/browse.php?" class="nav-link">Browse</a></li>
        <li class="nav-item"><a href="/f2024-assign1/api.php" class="nav-link">APIs</a></li>
      </ul>
    </header>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-center py-lg-5 border-bottom">
    <div class="col-lg-4">
        <?php
        echo "<h1 class='display-4 fw-'>$constructor[name]</h1>";
        echo "<p class='lead text-body-secondary'>Nationality: $constructor[nationality]</p>";
        echo "<p class='lead text-body-secondary'><a href=$constructor[url]>$constructor[url]</a></p>";
        ?>
    </div>
</div>
<?php 
                            echo "<div class='container marketing'>";
                            echo "<div class='row featurette'>";
                          echo "<h1 class=display-4 fw-normal text-body-emphasis>Formula 1 Stats</h1>";
                          echo "<table class = table>";
                          echo "<tr>";
                          echo "<th> Rnd </th>";
                          echo "<th> Circuit </th>";
                          echo "<th> Driver </th>";
                          echo "<th> Position </th>";
                          echo "<th> Points </th>";
                          echo "<th> Season </th>";
                          echo "</tr>";
                          foreach($constructors as $constructor){

                              echo "<tr>";
                              echo "<td>".  $constructor["round"] .  "</td>";
                              echo "<td>".  $constructor["circuit"] .  "</td>";
                              echo "<td>".  $constructor["forename"] . " " . $constructor["surname"] . "</td>";
                              echo "<td>".  $constructor["position"] . "</td>";
                              echo "<td>".  $constructor["points"] . "</td>";
                              echo "<td>".  $constructor["year"] . "</td>";
                              echo "</tr>";
                          }
                          echo "</table>";
                          echo "</div>";
                          echo "</div>";
 ?>

</main>
</body>
</html>