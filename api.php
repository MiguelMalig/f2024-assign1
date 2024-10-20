<?php

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
    <header class="container-fluid d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">F1 Dashboard Project</span>
        </a>
            <ul class="nav nav-pills mb-4">
                <li class="nav-item"><a href="index.php" class="nav-link active">Home</a>
                <li class="nav-item"><a href="browse.php" class="nav-link">Browse</a></li>
                <li class="nav-item"><a href="api.php" class="nav-link">APIs</a></li>
            </ul>
          
    </header>
    <div class="text-center justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom col-lg-12 col-md-8">
      <h2>API List</h2>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">URL</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a href="api/circuits.php">/api/circuits.php</a></td>
              <td>Returns all the circuits</td>
            </tr>
            <tr>
              <td><a href="/f2024-assign1/api/circuits.php?circuitRef=monaco">/api/circuits.php?circuitRef=monaco </a></td>
              <td>Return just a specified circuit</td>
            </tr>
            <tr>
              <td><a href="/f2024-assign1/api/constructors.php">/api/constructors.php</a></td>
              <td>Returns all the constructors</td>
            </tr>
            <tr>
              <td><a href="/f2024-assign1/api/constructors.php?constructorRef=mclaren">/api/constructors.php?constructorRef=mclaren </a></td>
              <td>Return just a specific constructor</td>
            </tr>
            <tr>
              <td><a href="/f2024-assign1/api/drivers.php">/api/drivers.php </a></td>
              <td>Returns all the drivers for the season</td>
            </tr>
            <tr>
              <td><a href="/f2024-assign1/api/drivers.php?driverRef=hamilton">/api/drivers.php?driverRef=hamilton </a></td>
              <td>Returns just the specified driver</td>
            </tr>
            <tr>
              <td><a href="/f2024-assign1/api/drivers.php?raceID=1106">/api/drivers.php?raceID=1106 </a></td>
              <td>Returns the drivers within a given race</td>
            </tr>
            <tr>
              <td><a href="/f2024-assign1/api/races.php?raceId=1105">/api/races.php?raceId=1105 </a></td>
              <td>Returns just the specified race. </td>
            </tr>
            <tr>
              <td><a href="/f2024-assign1/api/races.php">/api/races.php  </a></td>
              <td>Returns the races within the 2022 season ordered by round</td>
            </tr>
            <tr>
              <td><a href="/f2024-assign1/api/qualifying.php?raceId=1105">/api/qualifying.php?raceId=1105 </a></td>
              <td>Returns the qualifying results for the specified race,</td>
            </tr>
            <tr>
              <td><a href="/f2024-assign1/api/results.php?raceId=1105">/api/results.php?raceId=1105 </a></td>
              <td>Returns the results for the specified race</td>
            </tr>
            <tr>
              <td><a href="/f2024-assign1/api/results.php?driverRef=max_verstappen">/api/results.php?driverRef=max_verstappen </a></td>
              <td>Returns all the results for a given driver</td> 
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</body>
</html>