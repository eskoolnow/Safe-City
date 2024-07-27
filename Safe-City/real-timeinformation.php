<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Safe Route - Route suggestion</title>
  <link rel="icon" href="./images/Safe Route Logo.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="./css/routesuggestion.css">
  <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./css/about.css">
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css"/>
  <style>
    body {
      margin: 0;
    }
    .journey{
      margin: 0 40%
    }
    #map {
      height: 100vh;
      width: 100vw; 
    }
    .map{
      margin-top: 70px;
    }
    #info {
      position: absolute;
      top: 10px;
      left: 10px;
      background: white;
      padding: 10px;
      z-index: 1;
      border-radius: 5px;
    }
    .logout-button {
      background-color: #005a44; /* Green */
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 25px; /* Curved shape */
      cursor: pointer;
    }
  </style>
</head>
<body>
  
<nav class="navbar  navbar-light bg-light fixed-top">
        <div class="container-fluid">
        <a class="navbar-brand text-success " href="index.html"><img class="img-fluid" src="./images/Safe Route Transparent logo.png" style="width: 200px;" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link"  href="./dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./real-timeinformation.php">Real Traffic</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./routesuggestion.php">Route Suggestion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./safedrivingpractices.php">Safe Driving</a>
              </li>
              <li class="nav-item">
              <button class="logout-button btn btn-success rounded-pill" onclick="window.location.href='./logout.php'">Logout <i class="bi bi-box-arrow-right lg"></i></button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<?php
    session_start(); // Resume existing session or start a new one

    // Example of checking if user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to login page
        header('Location: index.html');
        exit();
    }
    ?>
<div class="journey" id="info">Journey Time: <span class="justify-content-center" id="journey-time">N/A</span></div>
<div id='map' class="map "></div>
  
  <script>
    mapboxgl.accessToken = "pk.eyJ1Ijoic295aW5rYTRnYWJyaWVsIiwiYSI6ImNseXhjZnd3YjFsbzgya3NobWY0N2dmb2YifQ.HxYsEPFWiI5iq4boE1G2Dw";

    navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
      enableHighAccuracy: true
    });

    function successLocation(position) {
      setupMap([position.coords.longitude, position.coords.latitude]);
    }

    function errorLocation() {
      setupMap([7.0134, 4.77742]);
    }

    function setupMap(center) {
      const map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/streets-v11",
        center: center,
        zoom: 15
      });

      const nav = new mapboxgl.NavigationControl();
      map.addControl(nav);

      var directions = new MapboxDirections({
        accessToken: mapboxgl.accessToken,
        unit: 'metric',
        profile: 'mapbox/driving',
        controls: {
          inputs: true, 
          instructions: true
        }
      });

      map.addControl(directions, "top-left");

      directions.setOrigin(center);

      setTimeout(function() {
        const originInput = document.querySelector('.mapbox-directions-origin-input input');
        if (originInput) {
          originInput.value = 'Current Location';
        }
      }, 1000);

      directions.on('route', function(e) {
        const route = e.route[0];
        const duration = route.duration;
        const durationMinutes = Math.floor(duration / 60);
        document.getElementById('journey-time').textContent = durationMinutes + " minutes";
      });
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
