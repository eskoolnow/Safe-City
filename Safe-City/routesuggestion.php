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

    #map {
      height: 100vh;
      width: 90vw; 
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
  </style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.html"><img class="img-fluid" src="./images/Safe Route Transparent logo.png" style="width: 200px;" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="./dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./real-timeinformation.php">Real Traffic</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page"  href="./routesuggestion.php">Route Suggestion</a>
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
  <header>
    <h1 class="mt-5">Safe Route Planner</h1>
  </header>

  <main>
    

    <div class="aricular-features">
    <div id="info">Journey Time: <span id="journey-time">N/A</span></div>
  <div id='map'></div>
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
    </div>

    <div class="route-suggestions">
      <h1>Safe Route Website - Route Suggestions</h1>

      <h2>Route Suggestions</h2>
      <p>The route suggestion functionality is a core component of the Safe Route Planner, enabling users to plan their journeys based on real-time traffic conditions and their personal preferences. It uses advanced pathfinding algorithms to calculate the optimal routes, taking into account factors like traffic density, incidents, road closures, and construction zones.</p>

      <h3>Algorithm Development</h3>
      <p>At the heart of the route suggestion feature are advanced pathfinding algorithms, such as Dijkstra's algorithm or the A* algorithm, that will calculate the optimal routes between the user's start and end points. These algorithms will take into account:</p>
      <ol>
        <li><strong>Real-Time Traffic Data</strong>: The app will integrate with traffic data APIs (e.g., Google Maps Traffic, Mapbox Traffic, HERE Traffic) to continuously monitor factors like traffic density, incidents, road closures, and construction zones. This information will be used to determine the fastest and most efficient routes.</li>
        <li><strong>User Preferences</strong>: Users will be able to customize their route preferences, such as avoiding highways, minimizing tolls, or selecting scenic routes. The algorithms will incorporate these user-defined preferences when generating route suggestions.</li>
      </ol>

      <h3>Route Customization</h3>
      <p>The app will provide users with the flexibility to further customize the suggested routes:</p>
      <ol>
        <li><strong>Multiple Route Options</strong>: For each destination, the app will present several route alternatives, allowing users to compare estimated travel times, distances, and other relevant details to choose the most suitable option.</li>
        <li><strong>Avoidance of Specific Roads</strong>: Users will have the ability to manually exclude certain roads or areas from the route calculation, such as highways, tolls, or roads with known traffic issues.</li>
        <li><strong>Scenic Route Selection</strong>: The app will offer the option to select scenic routes, which may take slightly longer but provide a more enjoyable driving experience for users.</li>
        <li><strong>Safety Features</strong>: The app will prioritize routes with lower crime rates, well-lit areas, and other safety considerations. This will be particularly useful for pedestrians and cyclists.</li>
        <li><strong>Emergency Services Integration</strong>: The app will have the ability to connect users with emergency services (police, fire, ambulance) in case of an incident. It can also provide real-time updates on the location of emergency vehicles.</li>
        <li><strong>Integration with Weather Data</strong>: The app will integrate with weather data APIs to provide information on current and forecasted weather conditions. This can help users plan their routes to avoid hazardous weather such as heavy rain, snow, or fog.</li>
      </ol>

      <h3>Turn-by-Turn Navigation</h3>
      <p>Once a route is selected, the app will provide turn-by-turn navigation instructions to guide the user to their destination:</p>
      <ol>
        <li><strong>Visual Directions</strong>: The selected route will be displayed on an interactive map, with clear visual cues highlighting the next turn or maneuver the user should perform.</li>
        <li><strong>Voice Instructions</strong>: Audio instructions, such as "Turn left on Main Street," will be provided to assist users in navigating without constantly looking at the screen.</li>
        <li><strong>Estimated Time and Distance</strong>: The app will continuously update the estimated time of arrival and the remaining distance to the destination, allowing users to plan their journey accordingly.</li>
      </ol>

      <h3>Real-Time Updates and Notifications</h3>
      <p>Safe Route Website will continuously monitor the traffic situation and provide users with real-time updates and notifications:</p>
      <ol>
        <li><strong>Traffic Condition Updates</strong>: Users will be alerted to any changes in traffic conditions, such as accidents, road closures, or unexpected delays, that may affect their route.</li>
        <li><strong>Customizable Notifications</strong>: Users will be able to customize their notification preferences, including the frequency of updates and the type of information they receive.</li>
        <li><strong>Integration with External Data Sources</strong>: The app will integrate with various data sources, such as traffic incident reports and weather data, to provide a comprehensive and up-to-date view of the current traffic situation.</li>
      </ol>

      <p>By implementing these features, the Safe Route Planner will empower users to make informed decisions about their travel routes, ultimately reducing commute times, fuel consumption, and environmental impact. The route suggestion component will be a crucial part of the app's overall functionality, enhancing the user experience and contributing to the app's value proposition.</p>
    </div>

  </main>

  <footer>
    <p>&copy; 2024 Safe Route. All rights reserved. | Powered by <a href="https://www.techskool.org/">Tech Skool Education</a><img src=" ./images/techlogo.png" alt="TechSkool Logo"></p>
    <div>
      <a href="https://x.com/techskooledu">X</a> | <a href="https://www.instagram.com/techskooledu/">Instagram</a> | <a href="https://ng.linkedin.com/company/techskooledu">LinkedIn</a>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

















  <script>
    // Route planning functionality
    document.getElementById('plan-route').addEventListener('click', function() {
      var startLocation = document.getElementById('start').value;
      var endLocation = document.getElementById('end').value;

      // Call a function to plan the route and display the result
      planRoute(startLocation, endLocation);
    });

    function planRoute(start, end) {
      // Implement your route planning logic here
      var routeResult = 'Suggested route from ' + start + ' to ' + end;
      document.getElementById('route-result').textContent = routeResult;
    }
  </script>





