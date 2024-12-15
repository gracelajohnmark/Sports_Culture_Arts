<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['Student_id'])) {
  header("Location: ../../index.php");
  exit();
}

$lastname = $_SESSION['Lastname'];
$firstname = $_SESSION['Firstname'];

$firstLetterLastname = substr($lastname, 0, 1);
$firstLetterFirstname = substr($firstname, 0, 1);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Collect form data
  $data = [
    'family_name' => $_POST['family-name'],
    'given_name' => $_POST['given-name'],
    'middle_name' => $_POST['middle-name'],
    'civil_status' => $_POST['civil-status'],
    'sex' => $_POST['sex'],
    'religion' => $_POST['religion'],
    'birth_date' => $_POST['birth-date'],
    'age' => $_POST['age'],
    'blood_type' => $_POST['blood-type'],
    'home_address' => $_POST['home-address'],
    'tel' => $_POST['tel'],
    'father_name' => $_POST['father-name'],
    'father_occupation' => $_POST['father-occupation'],
    'mother_name' => $_POST['mother-name'],
    'mother_occupation' => $_POST['mother-occupation'],
    'emergency_contact' => $_POST['emergency-contact'],
    'relationship' => $_POST['relationship'],
    'emergency_cp' => $_POST['emergency-cp'],
    'school' => $_POST['school'],
    'school_address' => $_POST['school-address'],
    'course' => $_POST['course'],
    'position' => $_POST['position'],
    'organization' => $_POST['organization'],
    'position_held' => $_POST['position-held']
  ];

  // Define the API endpoint (Make sure this is correct)
  $apiUrl = 'https://api.pdf.co/v1/pdf/edit/add'; // Replace with the actual API URL

  // Set up the POST request with data
  $options = [
    'http' => [
      'method' => 'POST',
      'header' => "Content-type: application/json\r\n",
      'content' => json_encode($data) // Sending data as JSON
    ]
  ];
  $context = stream_context_create($options);

  // Make the request to the external API
  $response = file_get_contents($apiUrl, false, $context);

  if ($response === FALSE) {
    die('Error occurred while generating PDF.');
  }

  // Decode the API response (assuming it returns JSON)
  $apiResponse = json_decode($response, true);

  if ($apiResponse['success']) {
    // If the PDF was successfully generated, provide the download link
    $pdfDownloadUrl = $apiResponse['download_url']; // The URL to download the PDF

    // Redirect to the results page with the download link
    header('Location: personalresult.php?file=' . urlencode($pdfDownloadUrl));
    exit;
  } else {
    // Handle any errors returned by the API
    die('Error generating PDF: ' . $apiResponse['message']);
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="personal-style.css" />
  <script type="text/javascript" src="skcformscript.js" defer></script>
  <title>Form Personal Data | SKC Bulan Portal</title>
</head>

<body>
  <nav id="nav-group" class="navcontainer">
    <img class="skc" src="../../img/SKC LOGO.svg" />
    <h4 class="Logoname-1">Sorsogon State University</h4>
    <h4 class="Logoname-2">Sports Culture & Arts</h4>
    <ul>
      <li>
        <a href="../homepage.php" class="homepage">Home</a>
      </li>
      <li>
        <a href="../sports/sports-equipment.php" class="Sports-menu">Sports Equipments</a>
      </li>
      <li>
        <a href="../athlete/athlete-profile.php" class="athlete-menu">Athelete Profile</a>
      </li>
    </ul>
    <img class="notification-icon" src="../../img/notification-icon.svg" />
    <img class="message-icon" src="../../img/message-icon.svg" />
    <h6 class="user-login-icon" onclick="toggleMenu()">
      <?= htmlspecialchars($firstLetterFirstname) . htmlspecialchars($firstLetterLastname) ?>
    </h6>
    <div class="sub-menu-wrap" id="subMenu">
      <div class="sub-menu">
        <div class="user-info">
          <h6 class="username"><?= htmlspecialchars($firstLetterFirstname) . htmlspecialchars($firstLetterLastname) ?>
          </h6>
          <h6 class="userinfo-fullname"><?= $_SESSION['Fullname'] ?></h6>
          <h6 class="userinfo-id"><?= $_SESSION['Student_id'] ?></h6>
          <h6 class="userinfo-type"><?= $_SESSION['Usertype'] ?></h6>
        </div>
        <hr>
        <a href="#" class="sub-menu-link">
          <img class="icon-container" src="../../img/Edit-profile-icon.svg" alt="">
          <p>Edit Profile</p>
          <span>></span>
        </a>
        <?php if ($_SESSION['Usertype'] == 'Admin'): ?>
          <a href="#" class="sub-menu-link">
            <img class="icon-container" src="../../img/settings-icon.svg" alt="">
            <p>Settings</p>
            <span>></span>
          </a>
        <?php endif; ?>
        <a href="../../logout.php?redirect=home/skc-forms/Personal-Data.php" class="sub-menu-link">
          <img class="icon-container" src="../../img/logout-icon.svg" alt="">
          <p>Logout</p>
          <span>></span>
        </a>
      </div>
    </div>
  </nav>
  <aside id="side-nav-group">
    <ul>
      <li class="menu-toggle">
        <span class="sidebar-logo">SKC Portal</span>
        <button onclick=toggleSidebar() id="sidetoggle-btn">
          <img class="menu-icon" src="../../img/Menu-icon.svg" />
          <img class="backside" src="../../img/back-icon.svg">
        </button>
      </li>
      <li class="menu-schedule-container">
        <a href="#">
          <img class="menu-schedule" src="../../img/schedule-icon.svg" />
          <span class="notogglemenu">Schedule</span>
        </a>
      </li>
      <li class="sidenav-li">
        <button onclick=toggleSubMenu(this) class="dropdown-btn">
          <img class="menu-skcform" src="../../img/skc-form-icon.svg" alt="">
          <span class="Skcforms">SKC forms</span>
          <img class="skcform-dropdown" src="../../img/Dropdown-button.svg" alt="dropdown button">
        </button>
        <ul class="sub-menus">
          <div>
            <li class="personal-datamenu">
              <a href="Personal-Data.php">
                <img class="menu-personal" src="../../img/PersonalData-icon.svg" alt="">
                <span class="personal-span">Personal Data</span>
              </a>
            </li>
            <li class="member-datamenu">
              <a href="../skc-forms/Member's-Profile.php">
                <img class="menu-members" src="../../img/member's profile-icon.svg" alt="">
                <span class="member-span">Member's Profile</span>
              </a>
            </li>
            <li class="varsity-datamenu">
              <a href="../skc-forms/Varsity-Application-Form.php">
                <img class="menu-varsity" src="../../img/VarsityApplication-icon.svg" alt="">
                <span class="varsity-span">Varsity Application Form</span>
              </a>
            </li>
            <li class="athlete-datamenu">
              <a href="../skc-forms/Athlete-Registration-Form.php">
                <img class="menu-athlete" src="../../img/Athlete RF.svg" alt="">
                <span class="athlete-span">Athlete Registration Form</span>
              </a>
            </li>
            <li class="application-datamenu">
              <a href="#">
                <img class="menu-application" src="../../img/ApplicationForSportsClub-icon.svg" alt="">
                <span class="application-span">Application for Sports Club</span>
              </a>
            </li>
          </div>
        </ul>
      </li>
      <li class="menu-report-container">
        <a href="#" class="no">
          <img class="menu-report" src="../../img/reports-icon.svg" />
          <span class="notogglemenu1">Reports</span>
        </a>
      </li>
    </ul>
  </aside>
  <main>
    <div class="container-personal">
      <div class="personal-logo">
        <img class="skcpersonal-logo" src="../../img/SKC LOGO.svg" alt="SSU Logo">
      </div>
      <header class="header">
        Republic of the Philippines<br>
        Sorsogon State University<br>
        Bulan Campus, Zone-8, Bulan, Sorsogon<br><br>
        <h3>SPORTS KINETICS CLUB</h3>
      </header>
      <form id="personalDataForm" action="generate_pdf.php" method="POST">
        <!-- Personal Information -->
        <div class="form-section">
          <h3 class="personal-data">PERSONAL DATA</h3>
          <div class="form-group">
            <label for="family-name">Family Name</label>
            <input type="text" id="family-name" name="family-name">
            <label for="given-name">Given Name</label>
            <input type="text" id="given-name" name="given-name">
            <label for="middle-name">Middle Name</label>
            <input type="text" id="middle-name" name="middle-name">
          </div>
          <div class="form-group inline">
            <label for="civil-status">Civil Status</label>
            <select id="civil-status" name="civil-status">
              <option value="Single">Single</option>
              <option value="Married">Married</option>
              <option value="Separated">Separated</option>
            </select>
            <label class="sex" for="sex">Sex</label>
            <select class="Sex" id="sex" name="sex">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <label class="religion" for="religion">Religion</label>
            <input type="text" id="religion" name="religion">
          </div>
          <div class="form-group">
            <label for="birth-date">Birth Date</label>
            <input type="date" id="birth-date" name="birth-date">
            <label class="age" for="age">Age</label>
            <input type="number" id="age" name="age" min="1">
            <label for="blood-type">Blood Type</label>
            <select id="blood-type" name="blood-type">
              <option value="O+">O+</option>
              <option value="O-">O-</option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
            </select>
          </div>
          <div class="form-group">
            <label for="home-address">Home Address</label>
            <input type="text" id="home-address" name="home-address">
            <label for="tel">Tel. / CP No.</label>
            <input type="text" id="tel" name="tel" value="+639">
          </div>
          <div class="form-group">
            <label for="father-name">Father's Name</label>
            <input type="text" id="father-name" name="father-name">
            <label for="father-occupation">Occupation</label>
            <input type="text" id="father-occupation" name="father-occupation">
          </div>
          <div class="form-group">
            <label for="mother-name">Mother's Name</label>
            <input type="text" id="mother-name" name="mother-name">
            <label for="mother-occupation">Occupation</label>
            <input type="text" id="mother-occupation" name="mother-occupation">
          </div>
          <div class="form-group">
            <label class="emergency-contacts" for="emergency-contact">In case of emergency, notify</label>
            <input type="text" id="emergency-contact" name="emergency-contact">
            <label class="relation" for="relationship">Relationship</label>
            <input type="text" id="relationship" name="relationship">
            <label class="emergency-mobile" for="emergency-cp">CP Number</label>
            <input type="text" id="emergency-cp" name="emergency-cp" value="+639">
          </div>
          <p class="section-title">A. Educational Background</p>
          <div class="form-group1">
            <label for="school">Presently Enrolled at</label>
            <input type="text" id="school" name="school">
          </div>
          <div class="form-group1">
            <label for="school-address">School Address</label>
            <input type="text" id="school-address" name="school-address">
          </div>
          <div class="form-group1">
            <label for="course">Course and Year</label>
            <input class="yr-course" type="text" id="course" name="course">
          </div>
          <p class="section-title2">B. Position (Specify)</p>
          <div class="form-group2">
            <input type="text" id="position" name="position">
          </div>
          <p class="section-title3">C. Affiliation to Other Organization</p>
          <div class="form-group3">
            <label for="organization">Organization</label>
            <input type="text" id="organization" name="organization">
            <label for="position-held">Position Held</label>
            <input type="text" id="position-held" name="position-held">
          </div>
          <div style="text-align: center; margin-top: 60px; padding-bottom:40px;"><br>
            <button type="submit" class="submit-personal" onclick="displayResult()">Submit</button>
          </div>
        </div>
      </form>
  </main>
</body>

</html>