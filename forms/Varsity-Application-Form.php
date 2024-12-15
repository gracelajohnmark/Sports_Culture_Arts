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

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Varsitystyle.css"/>
    <script type="text/javascript" src="skcformscript.js" defer></script>
    <title>Form Varsity Application | SKC Bulan Portal</title>
  </head>
  <body>
          <nav id="nav-group" class="navcontainer">
    <img class="skc"
      src="../../img/SKC LOGO.svg" />
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
    <img class="notification-icon"
      src="../../img/notification-icon.svg" />
    <img class="message-icon"
      src="../../img/message-icon.svg" />
    <h6 class="user-login-icon" onclick="toggleMenu()">
      <?= htmlspecialchars($firstLetterFirstname) . htmlspecialchars($firstLetterLastname) ?>
    </h6>
            <div class="sub-menu-wrap" id="subMenu">
              <div class="sub-menu">
                <div class="user-info">
                <h6 class="username"><?= htmlspecialchars($firstLetterFirstname) . htmlspecialchars($firstLetterLastname) ?></h6>
                <h6 class="userinfo-fullname"><?= $_SESSION['Fullname'] ?></h6>
                <h6 class="userinfo-id"><?= $_SESSION['Student_id'] ?></h6>
                <h6 class="userinfo-type"><?=$_SESSION['Usertype']?></h6>
                </div>
                <hr>
                <a href="#" class="sub-menu-link">
          <img class="icon-container"
            src="../../img/Edit-profile-icon.svg"
            alt="">
                  <p>Edit Profile</p>
                  <span>></span>
                </a>
        <?php if ($_SESSION['Usertype'] == 'Admin'): ?>
          <a href="#" class="sub-menu-link">
            <img class="icon-container"
              src="../../img/settings-icon.svg"
              alt="">
            <p>Settings</p>
            <span>></span>
          </a>
        <?php endif; ?>
                <a href="../../logout.php?redirect=home/skc-forms/Varsity-Application-Form.php" class="sub-menu-link">
                <img class="icon-container"
                src="../../img/logout-icon.svg"
                alt="">
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
          <img class="menu-icon"
            src="../../img/Menu-icon.svg" />
          <img class="backside"
            src="../../img/back-icon.svg">
        </button>
      </li>
      <li class="menu-schedule-container">
        <a href="#">
          <img class="menu-schedule"
            src="../../img/schedule-icon.svg" />
          <span class="notogglemenu">Schedule</span>
        </a>
      </li>
      <li class="sidenav-li">
        <button onclick=toggleSubMenu(this) class="dropdown-btn">
          <img class="menu-skcform"
            src="../../img/skc-form-icon.svg"
            alt="">
          <span class="Skcforms">SKC forms</span>
          <img class="skcform-dropdown"
            src="../../img/Dropdown-button.svg"
            alt="dropdown button">
        </button>
              <ul class="sub-menus">
          <div>
            <li class="personal-datamenu">
              <a href="../skc-forms/Personal-Data.php">
                <img class="menu-personal"
                  src="../../img/PersonalData-icon.svg"
                  alt="">
                <span class="personal-span">Personal Data</span>
              </a>
            </li>
            <li class="member-datamenu">
              <a href="../skc-forms/Member's-Profile.php">
                <img class="menu-members"
                  src="../../img/member's profile-icon.svg"
                  alt="">
                <span class="member-span">Member's Profile</span>
              </a>
            </li>
            <li class="varsity-datamenu">
              <a href="Varsity-Application-Form.php">
                <img class="menu-varsity"
                  src="../../img/VarsityApplication-icon.svg"
                  alt="">
                <span class="varsity-span">Varsity Application Form</span>
              </a>
            </li>
            <li class="athlete-datamenu">
              <a href="../skc-forms/Athlete-Registration-Form.php">
                <img class="menu-athlete"
                  src="../../img/Athlete RF.svg"
                  alt="">
                <span class="athlete-span">Athlete Registration Form</span>
              </a>
            </li>
            <li class="application-datamenu">
              <a href="#">
                <img class="menu-application"
                  src="../../img/ApplicationForSportsClub-icon.svg"
                  alt="">
                <span class="application-span">Application for Sports Club</span>
              </a>
            </li>
          </div>
        </ul>
      </li>
      <li class="menu-report-container">
        <a href="#" class="no">
          <img class="menu-report"
            src="../../img/reports-icon.svg" />
          <span class="notogglemenu1">Reports</span>
        </a>
      </li>
    </ul>
  </aside>
          <main>
          <div class="VARSITY-APPLICATION">
      <div class="logo">
        <div class="logo-address-of">
          <img class="ssu" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/18d8e4f67ccff86ebe193e27028735e37781c370/img/SSU%20logo.png?raw=true" />
          <div class="overlap-group">
            <p class="republic-of-the">
              <span class="text-wrapper">Republic of the Philippines<br /></span>
              <span class="span"
                > Sorsogon State University<br />OFFICE OF THE STUDENT DEVELOPMENT AND SERVICES<br />Sports Kinetics
                Club<br
              /></span>
              <span class="text-wrapper-2">Zone-8, Bulan, Sorsogon<br /></span>
              <span class="text-wrapper">Tel. No.; (056) 311 9800; Email Address: skc-bc@sorsu.edu.ph<br /></span>
              <span class="span"> </span>
            </p>
            <img class="PNG-bagong-pilipinas" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/18d8e4f67ccff86ebe193e27028735e37781c370/img/bagong-pilipinas-logo.png?raw=true" />
            <img class="skc" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/18d8e4f67ccff86ebe193e27028735e37781c370/img/SKC%20LOGO.png?raw=true" />
          </div>
        </div>
        <div class="div">VARSITY APPLICATION FORM</div>
        <div class="text-wrapper-3">PERSONAL INFORMATION</div>
      </div>
      <div class="name-to-contact-no">
        <div class="text-wrapper-4">Name:</div>
        <div class="text-wrapper-5">Address:</div>
        <div class="text-wrapper-6">Gender:</div>
        <div class="text-wrapper-7">Height:</div>
        <div class="text-wrapper-8">Birthdate:</div>
        <div class="text-wrapper-9">Citizenship:</div>
        <div class="text-wrapper-10">Contact No:</div>
        <div class="text-wrapper-11">Place of Birth:</div>
        <div class="text-wrapper-12">Weight:</div>
        <div class="text-wrapper-13">Blood Type:</div>
        <div class="text-wrapper-14">Age:</div>
        <div class="text-wrapper-15">Course:</div>
        <div class="rectangle"></div>
        <div class="rectangle-2"></div>
        <div class="overlap"><div class="text-wrapper-16">MM/DD/YYYY</div></div>
        <div class="rectangle-3"></div>
        <div class="div-wrapper"><div class="text-wrapper-17">09123456789</div></div>
        <div class="rectangle-4"></div>
        <div class="rectangle-5"></div>
        <div class="overlap-2">
          <div class="rectangle-6"></div>
          <p class="o-o-a-a-b-b-AB-AB">O +, O -, <br />A +,A -, <br />B +, B -,<br />AB +, AB -</p>
        </div>
        <div class="overlap-3"><div class="text-wrapper-18">100</div></div>
        <div class="rectangle-7"></div>
        <div class="rectangle-8"></div>
        <div class="overlap-4">
          <div class="rectangle-9"></div>
          <div class="male-female-LGBT">Male<br />Female<br />LGBT<br />Prefer not to say</div>
        </div>
      </div>
      <div class="sports-choices">
        <p class="list-below-are-the">
          List below are the different Sports Discipline. Kindly indicate on the space provided the <br />First and
          Second option of your chosen sports.
        </p>
        <div class="text-wrapper-19">Arnis</div>
        <div class="rectangle-10"></div>
        <div class="rectangle-11"></div>
        <div class="rectangle-12"></div>
        <div class="rectangle-13"></div>
        <div class="rectangle-14"></div>
        <div class="rectangle-15"></div>
        <div class="rectangle-16"></div>
        <div class="rectangle-17"></div>
        <div class="rectangle-18"></div>
        <div class="text-wrapper-20">Athletics</div>
        <div class="rectangle-19"></div>
        <div class="text-wrapper-21">Badminton</div>
        <div class="rectangle-20"></div>
        <div class="text-wrapper-22">Basketball</div>
        <div class="rectangle-21"></div>
        <div class="text-wrapper-23">Baseball/Softball</div>
        <div class="rectangle-22"></div>
        <div class="text-wrapper-24">Boxing</div>
        <div class="rectangle-23"></div>
        <div class="text-wrapper-25">Chess</div>
        <div class="rectangle-24"></div>
        <div class="text-wrapper-26">Dance Sports</div>
        <div class="rectangle-25"></div>
        <div class="text-wrapper-27">Futsal</div>
        <div class="rectangle-26"></div>
        <div class="text-wrapper-28">Karatedo</div>
        <div class="text-wrapper-29">Lawn Tennis</div>
        <div class="text-wrapper-30">Sepak Takraw</div>
        <div class="text-wrapper-31">Swimming</div>
        <div class="text-wrapper-32">Volleyball</div>
        <div class="text-wrapper-33">Table Tennis</div>
        <div class="text-wrapper-34">Taekwondo</div>
        <div class="text-wrapper-35">Soccer/Football</div>
      </div>
      <div class="text-wrapper-36">
        --------------------------------------------------------------------------------------------------
      </div>
      <div class="logo">
        <div class="logo-address-of">
          <img class="ssu" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/18d8e4f67ccff86ebe193e27028735e37781c370/img/SSU%20logo.png?raw=true" />
          <div class="overlap-group">
            <p class="republic-of-the">
              <span class="text-wrapper">Republic of the Philippines<br /></span>
              <span class="span"
                > Sorsogon State University<br />OFFICE OF THE STUDENT DEVELOPMENT AND SERVICES<br />Sports Kinetics
                Club<br
              /></span>
              <span class="text-wrapper-2">Zone-8, Bulan, Sorsogon<br /></span>
              <span class="text-wrapper">Tel. No.; (056) 311 9800; Email Address: skc-bc@sorsu.edu.ph<br /></span>
              <span class="span"> </span>
            </p>
            <img class="PNG-bagong-pilipinas" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/18d8e4f67ccff86ebe193e27028735e37781c370/img/bagong-pilipinas-logo.png?raw=true" />
            <img class="skc" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/18d8e4f67ccff86ebe193e27028735e37781c370/img/SKC%20LOGO.png?raw=true" />
          </div>
        </div>
        <div class="div">VARSITY APPLICATION FORM</div>
        <div class="text-wrapper-3">PERSONAL INFORMATION</div>
      </div>
      <div class="name-to-contact-no">
        <div class="text-wrapper-4">Name:</div>
        <div class="text-wrapper-5">Address:</div>
        <div class="text-wrapper-6">Gender:</div>
        <div class="text-wrapper-7">Height:</div>
        <div class="text-wrapper-8">Birthdate:</div>
        <div class="text-wrapper-9">Citizenship:</div>
        <div class="text-wrapper-10">Contact No:</div>
        <div class="text-wrapper-11">Place of Birth:</div>
        <div class="text-wrapper-12">Weight:</div>
        <div class="text-wrapper-13">Blood Type:</div>
        <div class="text-wrapper-14">Age:</div>
        <div class="text-wrapper-15">Course:</div>
        <div class="rectangle"></div>
        <div class="rectangle-2"></div>
        <div class="overlap"><div class="text-wrapper-16">MM/DD/YYYY</div></div>
        <div class="rectangle-3"></div>
        <div class="div-wrapper"><div class="text-wrapper-17">09123456789</div></div>
        <div class="rectangle-4"></div>
        <div class="rectangle-5"></div>
        <div class="overlap-2">
          <div class="rectangle-6"></div>
          <p class="o-o-a-a-b-b-AB-AB">O +, O -, <br />A +,A -, <br />B +, B -,<br />AB +, AB -</p>
        </div>
        <div class="overlap-3"><div class="text-wrapper-18">100</div></div>
        <div class="rectangle-7"></div>
        <div class="rectangle-8"></div>
        <div class="overlap-4">
          <div class="rectangle-9"></div>
          <div class="male-female-LGBT">Male<br />Female<br />LGBT<br />Prefer not to say</div>
        </div>
      </div>
      <div class="sports-choices">
        <p class="list-below-are-the">
          List below are the different Sports Discipline. Kindly indicate on the space provided the <br />First and
          Second option of your chosen sports.
        </p>
        <div class="text-wrapper-19">Arnis</div>
        <div class="rectangle-10"></div>
        <div class="rectangle-11"></div>
        <div class="rectangle-12"></div>
        <div class="rectangle-13"></div>
        <div class="rectangle-14"></div>
        <div class="rectangle-15"></div>
        <div class="rectangle-16"></div>
        <div class="rectangle-17"></div>
        <div class="rectangle-18"></div>
        <div class="text-wrapper-20">Athletics</div>
        <div class="rectangle-19"></div>
        <div class="text-wrapper-21">Badminton</div>
        <div class="rectangle-20"></div>
        <div class="text-wrapper-22">Basketball</div>
        <div class="rectangle-21"></div>
        <div class="text-wrapper-23">Baseball/Softball</div>
        <div class="rectangle-22"></div>
        <div class="text-wrapper-24">Boxing</div>
        <div class="rectangle-23"></div>
        <div class="text-wrapper-25">Chess</div>
        <div class="rectangle-24"></div>
        <div class="text-wrapper-26">Dance Sports</div>
        <div class="rectangle-25"></div>
        <div class="text-wrapper-27">Futsal</div>
        <div class="rectangle-26"></div>
        <div class="text-wrapper-28">Karatedo</div>
        <div class="text-wrapper-29">Lawn Tennis</div>
        <div class="text-wrapper-30">Sepak Takraw</div>
        <div class="text-wrapper-31">Swimming</div>
        <div class="text-wrapper-32">Volleyball</div>
        <div class="text-wrapper-33">Table Tennis</div>
        <div class="text-wrapper-34">Taekwondo</div>
        <div class="text-wrapper-35">Soccer/Football</div>
      </div>
    </div>
          </main>
        </body>
    </html>