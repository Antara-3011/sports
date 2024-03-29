<?php
  include '../../config/config.php';
  include '../../include/login-validation-coach.php';
  function getTournamentDetails($tournament_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM tournament WHERE Tid = ?");
    $stmt->bind_param("i", $tournament_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
  }
  $selected_tournament_id=null;
  if (isset($_GET['tournament_id']) && is_numeric($_GET['tournament_id'])) {
    $selected_tournament_id = $_GET['tournament_id'];
    echo "<script>sessionStorage.setItem('selected_tournament_id', $selected_tournament_id);</script>";
  } else if (isset($_SESSION['selected_tournament_id'])) {
    // Retrieve tournament_id from sessionStorage if it's not in the URL
    $selected_tournament_id = $_SESSION['selected_tournament_id'];
    echo "<script>sessionStorage.setItem('selected_tournament_id', $selected_tournament_id);</script>";
  } else {
    echo "Error: Tournament ID not provided in the URL or session.";
  }
  if ($selected_tournament_id !== null) {
    $tournament_details = getTournamentDetails($selected_tournament_id);
  } else {
    echo "Invalid Tournament ID.";
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coach_email = $_SESSION['email'];
    $sql1 = "SELECT * FROM coach where email='$coach_email'";
    $res1 = $conn->query($sql1);
    $row = $res1->fetch_assoc();
    $coach_id = $row['id'];
    $coach_name = $row['name'];

    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $dob = isset($_POST['dob']) ? $_POST['dob'] : "";
    $gender =isset($_POST['gender']) ? $_POST['gender'] : ""; 
    $exp = isset($_POST['exp']) ? $_POST['exp'] : "";
    $height = isset($_POST['height']) ? $_POST['height'] : "";
    $weight = isset($_POST['weight']) ? $_POST['weight'] : "";
    $state =isset($_POST['state']) ? $_POST['state'] : ""; 
    $district = isset($_POST['district']) ? $_POST['district'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $contact = isset($_POST['contact']) ? $_POST['contact'] : "";
    $club_name =isset($_POST['club_name']) ? $_POST['club_name'] : ""; 

    $stmt = $conn->prepare("INSERT INTO athlete (name, DOB, gender, experience, height, weight, state, district, email, contact, club_name,coach_name,coach_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("sssiiisssisss", $name, $dob, $gender, $exp, $height, $weight, $state, $district, $email, $contact, $club_name,$coach_name,$coach_email);
    $result = $stmt->execute();
    $stmt->close();

    // Check if the insertion was successful
    if ($result) {
        echo "Athlete registration successful!";
    } else {
        echo "Error: Athlete registration failed.";
    }
    $athlete_id_query = $conn->query("SELECT id from athlete where email='$email'");
    $athlete_id_row = $athlete_id_query->fetch_assoc();
    $athlete_id = $athlete_id_row['id'];

    if ($coach_id !== null) {
      // Now you can proceed with the insert
      $sql = "INSERT INTO athlete_tournament_registration (athlete_id, coach_id, Tid) VALUES ('$athlete_id', '$coach_id', '$selected_tournament_id')";
      $res = mysqli_query($conn, $sql);
      if ($res) {
        echo "athlete_tournament_registration successful!";
    } else {
        echo "Error: athlete_tournament_registration failed.";
    }
  } else {
      echo "Error: Coach not found.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="../../css/coach.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <header>
      <nav class="navbar bg-body-tertiary">
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
        </div>
      </nav>
    </header>

    <main>
      <!-- <a href='./index.php?tournament_id= $tournament_id'>Go Back</a> -->
      <?php
      echo "<a href='./index.php?tournament_id= $selected_tournament_id'>Go Back</a>";
      ?>
      <div
        class="d-flex justify-content-around m-3 px-lg-5 py-lg-5 rounded-3 bg-info-subtle"
      >
        <div>
          <img src="../../images/logoTour.png" style="width: 7rem; height: 7rem" />
        </div>
        <div class="d-flex flex-column align-items-center">
        <?php
    if (isset($tournament_details['Tid'], $tournament_details['Tname'], $tournament_details['DOE'], $tournament_details['Tvenue'])) {
        echo "<h3>Tournament ID: " . $tournament_details['Tid'] . "</h3>";
        echo "<h3>Tournament Name: " . $tournament_details['Tname'] . "</h3>";
        echo "<h6>Date of Event: " . $tournament_details['DOE'] . "</h6>";
        echo "<h6>Venue: " . $tournament_details['Tvenue'] . "</h6>";
    } else {
        echo "Error: Invalid data structure in tournament details.";
    }
    ?>
        </div>
      </div>
      <div class="m-4">
        <h5><b>New Registration</b></h5>
      </div>
      <form method="post">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">Name</div>
              <div class="col-md-6"><input type="text" name="name" /></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">DOB</div>
              <div class="col-md-6"><input type="date" name="dob"/></div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">Gender</div>
              <div class="col-md-6"><input type="text"  name="gender"/></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">Experience</div>
              <div class="col-md-6"><input type="text"  name="exp"/></div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">Height</div>
              <div class="col-md-6"><input type="number" name="height" /></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">Weight</div>
              <div class="col-md-6"><input type="number" name="weight" /></div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">State</div>
              <div class="col-md-6"><input type="text" name="state"/></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">District</div>
              <div class="col-md-6"><input type="text"  name="district"/></div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">Email</div>
              <div class="col-md-6"><input type="email" name="email"/></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">Contact</div>
              <div class="col-md-6"><input type="number" name="contact"/></div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">Club Name</div>
              <div class="col-md-9"><input type="text"  name="club_name" /></div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-12">
            <button type="submit">Submit</button>
          </div>
        </div>
      </div>
      </form>
      <div class="divider">OR</div>
      <form>
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-4">Enter Candidate Id</div>
              <div class="col-md-6">
                <input type="text" />
              </div>
              <div class="col-md-2">
                <button>Search</button>
              </div>
            </div>
            <div class="row mt-3">
              <button>Add</button>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
      </form>
    </main>

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
