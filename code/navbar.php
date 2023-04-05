<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example">


  <body class="p-3 m-0 border-0 bd-example">
  <nav class="navbar navbar-expand-lg bg-success">
      <div class="container-fluid">
        <a class="nav-link" href="index.php" style="color:white; font-size: 20px;">ACME Arts</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true" style="color:white; font-size: 20px;">
              Display Corner
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" style= "font-size: 20px;" href="display.php">paintings</a></li>
              <li><a class="dropdown-item" style= "font-size: 20px;" href="artists.php">Artists</a></li>
              </li>
            </ul>
            <li class="nav-item">
              <a class="nav-link" href="custom.php" style="color:white; font-size: 20px;">Customization Section</a>
            </li>

        
          </ul>
           <form class="d-flex w-25 p-3" action = "filtertitle.php" method = "post">
            <input class="form-control me-2" name = "searchbox" id = "searchbox" type="search" placeholder="Search By Title" aria-label="Search">
            <button class="btn bg-info" name = "searchbtn" type="submit" fdprocessedid="h0pjt8" style="border: black ;">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </body>
