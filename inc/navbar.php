 <!--====================Start navbar =============================-->
 <nav class="navbar navbar-expand-lg sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#">
         <img src="./resources/img/logo.png" alt="" style="width: 100px;">
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#main"
          aria-controls="main"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="main">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link p-2 p-lg-3 active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-2 p-lg-3" href="index.php#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-2 p-lg-3" href="index.php#books">Books</a>
            </li>

            <li class="nav-item">
              <a class="nav-link p-2 p-lg-3" href="index.php#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-2 p-lg-3" href="#contact">Contact</a>
            </li>
          </ul>
          <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
              Categories
            </button>
            <ul class="dropdown-menu" style="margin-right:10px;">
              <li><a href="BookView.php?view=afficher&categorie=cs" class="dropdown-item" >Computer science</a></li>
              <li><a href="BookView.php?view=afficher&categorie=classics" class="dropdown-item">Classics</a></li>
              <li><a href="BookView.php?view=afficher&categorie=comic" class="dropdown-item" >Comic Book</a></li>
              <li><a href="BookView.php?view=afficher" class="dropdown-item" href="#">All</a></li>

            </ul>
          </div>
          <div class="search ps-3 pe-3 d-none d-lg-block">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
          <a class="btn rounded-pill main-btn" href="#">Login</a>
        </div>
      </div>
    </nav>
    <!--================================end Navbar======================-->