<?php
/**
 * The header for the theme
 *
 */
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>\build\assets\src\css\css.css">
    <script src="<?php echo get_template_directory_uri()?>\build\assets\src\js\main.js"></script>
</head>

<!-- Menu / Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#">
        <img alt="Epignosi" src="<?php echo get_template_directory_uri()?>\build\assets\src\img\logo.png">
      </a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Company</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
            <button class="btn btn btn-primary ml-auto mr-1">REGISTER</button>
            </li>
        </ul>
    </div>
    </nav>

<?php
?>