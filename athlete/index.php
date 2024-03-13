<?php
  include '../config/config.php';
  include '../include/login-validation-athelete.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/dashboard.css" />
  </head>
  <body>
    <!--- Navbar -->
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="2em"
              height="2em"
              viewBox="0 0 24 24"
            >
              <path
                fill="currentColor"
                d="m12.5 12l-.45 9.05q-.025.4-.312.675T10.95 22q-.4 0-.687-.275t-.313-.675L9.5 13l-3.175-1.825l-.35 1.3L7.5 15.15q.2.35.088.75t-.463.6q-.35.2-.75.1t-.6-.45l-1.75-3.025q-.1-.175-.125-.375t.025-.4L5 8.45l5.75-3.3L8.7 3.1q-.275-.275-.288-.687T8.7 1.7q.275-.275.7-.275t.7.275l2.975 2.95q.35.35.288.838t-.488.737L10.4 7.65l1.2 1.05l7.5-6.125q.275-.25.663-.212t.687.387q.225.275.213.625T20.4 4zM5 7q-.825 0-1.412-.587T3 5q0-.825.588-1.412T5 3q.825 0 1.413.588T7 5q0 .825-.587 1.413T5 7"
              ></path>
            </svg>
            Martial Tour
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../logout.php">Log out</a>
              </li>
              <!-- <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Settings
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="../logout.php">Log out</a>
                  </li>
                </ul>
              </li> -->
            </ul>
            <form class="d-flex" role="search">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-outline-success" type="submit">
                Search
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <!--- Body -->
    <div class="mb-3">
      <h1>Welcome, <b>Xyz</b></h1>
    </div>
    <div class="profile-head">
      <h3>PROFILE INFORMATION</h3>
    </div>
    <div class="mb-3 d-flex justify-content-center">
    
      <div
        class="d-flex justify-content-around border border-dark-subtle rounded border border-1 pt-100
        p-3 mb-2 bg-info-subtle text-info-emphasis"
        style="width: 60rem"
      >
      <div class="border border-dark-subtle">
          <img src="..." alt="image" />
        </div>
        <div>
          <div class="d-flex flex-row">
            <label for="username"> Name : </label>
            <p>John Cena</p>
          </div>
          <div class="d-flex flex-row">
            <div>
              <label for="email" class="font-bold"> Email : </label>
            </div>
            <div class="ms-2">
              <p class="rounded-lg">abc@gmail.com</p>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div>
              <label for="age" class="font-bold"> Age : </label>
            </div>
            <div class="ms-2">
              <p class="rounded-lg">20</p>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div>
              <label for="gender" class="font-bold"> Gender : </label>
            </div>
            <div class="ms-2">
              <p class="rounded-lg">Male</p>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div>
              <label for="height" class="font-bold"> Height : </label>
            </div>
            <div class="ms-2">
              <p class="rounded-lg">5' 4</p>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div>
              <label for="weight" class="font-bold"> Weight: </label>
            </div>
            <div class="ms-2">
              <p class="rounded-lg">50kg</p>
            </div>
          </div>
          <div class="d-flex flex-row mb-1">
            <div>
              <label for="coach" class="font-bold"> Coach : </label>
            </div>
            <div class="ms-2">
              <p class="rounded-lg">Mr XYZ ABC</p>
            </div>
          </div>
          <div>
            <button id="seeMoreBtn"><a href="./Seemore.php">See more</a></button>
          </div>
          <div>
            <button id="seeMoreBtn" ><a href="./Edit_dashboard.php">Edit</a></button>
          </div>
        </div>
      </div>
    </div>
    <div class="tournament-header">
      <p>UPCOMING TOURNAMENTS <span>see all</span></p>
    </div>
    <div class="flex">
      <div
        class="card"
        style="width: 18rem; text-align: center; margin-bottom: 1rem"
      >
        <img src="..." class="card-img-top" alt="Card image" />
        <div class="card-body">
          <h5 class="card-title" style="font-weight: bold">Tour Id: 112</h5>
          <h5 class="card-text" style="font-weight: bold">
            Dojo Inhouse Tournament
          </h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">February 10, 2024</li>
          <li class="list-group-item">
            Kenwyn Martial arts centre, South Africa
          </li>
          <li class="list-group-item">
            Reg. Deadline: Thu 8 February 2024 11.59 pm SAST
          </li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Click here to Register</a>
        </div>
      </div>

      <div
        class="card"
        style="width: 18rem; text-align: center; margin-bottom: 1rem"
      >
        <img src="..." class="card-img-top" alt="Card image" />
        <div class="card-body">
          <h5 class="card-title" style="font-weight: bold">Tour Id: 113</h5>
          <h5 class="card-text" style="font-weight: bold">
            Inter District Open Karate Championship
          </h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">February 11, 2024</li>
          <li class="list-group-item">
            TDP Hall, near India Spring School, India
          </li>
          <li class="list-group-item">
            Reg. Deadline: Sat 10 February 2024 11.59 pm IST
          </li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Click here to Register</a>
        </div>
      </div>

      <div
        class="card"
        style="width: 18rem; text-align: center; margin-bottom: 1rem"
      >
        <img src="..." class="card-img-top" alt="Card image" />
        <div class="card-body">
          <h5 class="card-title" style="font-weight: bold">Tour Id: 114</h5>
          <h5 class="card-text" style="font-weight: bold">
            Eagles Karate Challenge
          </h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">February 17, 2024</li>
          <li class="list-group-item">Tshwane Korfball Park, South Africa</li>
          <li class="list-group-item">
            Reg. Deadline: Thu 15 February 2024 11.59 pm SAST
          </li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Click here to Register</a>
        </div>
      </div>
    </div>
</div>
    <div class="tournament-header">
      <p style="margin-top: 1rem">UPDATES <span>see all</span></p>
    </div>

    <footer>
      <p>&copy; 2024 Martial Tour. All rights reserved.</p>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>