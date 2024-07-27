<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Safe Route - Revolutionizing Urban Mobility and Driving Safety</title>
  <link rel="icon" href="./images/Safe Route Logo.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./css/about.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand text-success " href="index.html"><img class="img-fluid" src="./images/Safe Route Transparent logo.png" style="width: 200px;" alt=""></a>
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
                <a class="nav-link" href="./routesuggestion.php">Route Suggestion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./safedrivingpractices.php">Safe Driving</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page"  href="./about.php">About</a>
              </li>
              <li class="nav-item">
              <button class="logout-button btn btn-success rounded-pill" onclick="window.location.href='./logout.php'">Logout <i class="bi bi-box-arrow-right lg"></i></button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  <header>
    <div class="header-content">
      <h1>SAFE ROUTE</h1>
      <p>Revolutionizing Urban Mobility and Driving Safety</p>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="feature">
        <div class="feature-image">
          <img src="./images/real-time-traffic.png" alt="Real-Time Traffic Information">
        </div>
        <div class="feature-text">
          <h2>Real-Time Traffic Information</h2>
          <p>Safe Route seamlessly integrates with leading traffic data APIs, including Google Maps, Mapbox, and HERE, to provide users with up-to-the-minute information on current traffic conditions. This allows commuters to make informed decisions about the best routes to take, minimizing delays and frustrations.</p>
        </div>
      </div>

      <div class="feature">
        <div class="feature-image">
          <img src="./images/route-suggestions.png" alt="Intelligent Route Suggestions">
        </div>
        <div class="feature-text">
          <h2>Intelligent Route Suggestions</h2>
          <p>Utilizing advanced algorithms, such as Dijkstra's and A* algorithms, Safe Route calculates the optimal routes based on a multitude of factors, including traffic density, incidents, road closures, and user preferences. Commuters can customize their routes to avoid tolls, highways, or even select scenic routes for a more enjoyable journey.</p>
        </div>
      </div>

      <div class="feature">
        <div class="feature-image">
          <img src="./images/safe-driving.jpeg" alt="Safe Driving Practices">
        </div>
        <div class="feature-text">
          <h2>Safe Driving Practices</h2>
          <p>Safe Route is dedicated to encouraging and informing users about safe driving habits. The app provides real-time safety tips, alerts for speed limits and accident-prone areas, and features to monitor driving behavior using smartphone sensors or connected devices. To further promote safe driving, Safe Route incorporates gamification elements, turning the daily commute into a fun and responsible experience.</p>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <div class="footer-content">
      <p>&copy; 2024 Safe Route. All rights reserved. | Powered by <a href="https://www.techskool.org/">Tech Skool Education</a><img src="./images/techlogo.png" alt="TechSkool Logo"></p>
      <div class="social-links">
        <a href="https://x.com/techskooledu">X</a> | <a href="https://www.instagram.com/techskooledu/">Instagram</a> | <a href="https://ng.linkedin.com/company/techskooledu">LinkedIn</a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>