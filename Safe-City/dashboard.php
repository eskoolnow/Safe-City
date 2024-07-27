<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Skool</title>
    <link rel="icon" href="./images/Safe Route Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="./css/dashboard.css">
</head>
<body>
    <?php
    session_start(); // Resume existing session or start a new one

    // Example of checking if user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to login page
        header('Location: index.html');
        exit();
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand text-success " href="index.html"><img class="img-fluid" src="./images/Safe Route Transparent logo.png" style="width: 200px;" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./dashboard.php">Dashboard</a>
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
              <button class="logout-button btn btn-success rounded-pill" onclick="window.location.href='./logout.php'">Logout <i class="bi bi-box-arrow-right lg"></i></button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="application">
    <div class="app-container">
        <div class="row g-4">
            <div class="col-6 col-md-3">
                <a class="text-decoration-none" href="./real-timeinformation.php">
                <div class="app-section">
                    <img src="./images/traffic.png" alt="real">
                    <h1>Real-time traffic information</h1>
                </div></a>
            </div>
            <div class="col-6 col-md-3">
                <a class="text-decoration-none" href="./routesuggestion.php">
                <div class="app-section">
                    <img src="./images/route.png" alt="route">
                    <h1>Route suggestion</h1>
                </div></a>
            </div>
            <div class="col-6 col-md-3">
                <a class="text-decoration-none" href="safedrivingpractices.php">
                <div class="app-section">
                    <img src="./images/driving.png" alt="driving">
                    <h1>Safe driving practise</h1>
                </div></a>
            </div>
            <div class="col-6 col-md-3">
                <a class="text-decoration-none" href="./about.php">
                <div class="app-section">
                    <img src="./images/about.png" alt="about">
                    <h1>About</h1>
                </div></a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
