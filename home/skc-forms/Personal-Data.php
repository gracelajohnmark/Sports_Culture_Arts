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
    <link rel="stylesheet" href="personal-style.css"/>
    <script type="text/javascript" src="skcformscript.js" defer></script>
    <title>Form Personal Data | SKC Bulan Portal</title>
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
                <a href="../../logout.php?redirect=home/skc-forms/Personal-Data.php" class="sub-menu-link">
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
              <a href="Personal-Data.php">
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
              <a href="../skc-forms/Varsity-Application-Form.php">
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
          <div class="personal-data">
      <div class="group">
        <img class="skc-logo" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/45d23ffca769b2d9430ba3120f1c5cf69dc9b6c4/img/SKC%20LOGO.png?raw=true" />
        <p class="republic-of-the">
          Republic of the Philippines<br />Sorsogon State University<br />Bulan, Campus<br />Zon-8, Bulan, Sorsogon
        </p>
        <div class="SPORTS-KINETICS-CLUB">SPORTS&nbsp;&nbsp;KINETICS CLUB</div>
        <div class="text-wrapper">PERSONAL DATA</div>
        <div class="rectangle"></div>
      </div>
      <div class="div">
        <div class="text-wrapper-2">Name:</div>
        <div class="text-wrapper-3">Family Name</div>
        <div class="text-wrapper-4">Given Name</div>
        <div class="text-wrapper-5">Middle Name</div>
        <div class="rectangle-2"></div>
        <div class="rectangle-3"></div>
        <div class="rectangle-4"></div>
      </div>
      <div class="civil-status-to-CP">
        <div class="civil-status-to">
          <div class="overlap">
            <div class="overlap-group">
              <div class="overlap-2">
                <div class="text-wrapper-6">Civil Status:</div>
                <div class="rectangle-5"></div>
                <div class="rectangle-6"></div>
                <div class="text-wrapper-7">Age:</div>
                <div class="single-marriage">Single, Marriage</div>
              </div>
              <div class="text-wrapper-8">Sex:</div>
              <div class="text-wrapper-9">Birth Date:</div>
            </div>
            <div class="rectangle-7"></div>
          </div>
          <div class="text-wrapper-10">Religion:</div>
          <div class="rectangle-8"></div>
          <div class="text-wrapper-11">Blood Type</div>
          <div class="overlap-3">
            <div class="rectangle-9"></div>
            <p class="o-o-a-a-b-b-AB-AB">O +, O -, A +<br />A -, B +, B -<br />AB +, AB -</p>
          </div>
          <div class="option-variants">
            <div class="overlap-group-2">
              <div class="text-wrapper-12">Male</div>
              <img class="vector" src="img/vector.svg" />
            </div>
          </div>
        </div>
        <div class="group-2">
          <div class="overlap-4">
            <div class="text-wrapper-13">Home Address:</div>
            <div class="rectangle-10"></div>
          </div>
          <div class="overlap-5">
            <div class="text-wrapper-14">Tel. /CP No.</div>
            <div class="rectangle-11"></div>
          </div>
        </div>
      </div>
      <div class="family-name">
        <div class="overlap-6">
          <div class="rectangle-12"></div>
          <div class="text-wrapper-15">Father’s Name:</div>
        </div>
        <div class="rectangle-13"></div>
        <div class="rectangle-14"></div>
        <div class="text-wrapper-16">Mother’s Name:</div>
        <div class="rectangle-15"></div>
        <div class="text-wrapper-17">Occupation:</div>
        <div class="text-wrapper-18">Occupation:</div>
      </div>
      <div class="incase-of-emergency">
        <div class="rectangle-16"></div>
        <div class="incase-of-emergency-2">Incase of Emergency,<br />Please notify:</div>
        <div class="text-wrapper-19">Relationship:</div>
        <div class="text-wrapper-20">Address:</div>
        <div class="rectangle-17"></div>
        <div class="rectangle-18"></div>
        <div class="rectangle-19"></div>
        <div class="text-wrapper-21">CP NUMBER:</div>
      </div>
      <div class="educational">
        <div class="rectangle-20"></div>
        <div class="rectangle-21"></div>
        <div class="rectangle-22"></div>
        <div class="rectangle-23"></div>
        <p class="a-EDUCATIONAL">
          <span class="span">A. EDUCATIONAL BACKGROUND<br /></span>
          <span class="text-wrapper-22">Presently Enrolled at:</span>
        </p>
        <p class="p">B. POSITION ( Specify )</p>
        <p class="text-wrapper-23">C. AFFILIATION TO OTHER ORGANIZATION</p>
        <div class="text-wrapper-24">School Address:</div>
        <div class="text-wrapper-25">Course and Year:</div>
        <div class="div-wrapper"><div class="text-wrapper-26">ORGANIZATION</div></div>
        <div class="overlap-7"><div class="text-wrapper-27">POSITION HELD</div></div>
        <div class="rectangle-24"></div>
        <div class="rectangle-25"></div>
        <div class="rectangle-26"></div>
        <div class="rectangle-27"></div>
      </div>
      <p class="i-hereby-certify-the">
        <span class="text-wrapper-28"
          >I hereby certify the foregoing information.<br /> <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        <span class="text-wrapper-29">Signature over printed name<br /></span>
        <span class="text-wrapper-28"
          >Noted by:<br /> <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br /><br />President, SKC<br /><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approved:<br /><br /><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adviser,
          SKC<br /><br /><br /><br /><br /><br
        /></span>
      </p>
      <img class="line" src="img/line-49.svg" />
      <div class="rectangle-28"></div>
      <div class="text-wrapper-30">Date Filed: ________________</div>
    </div>
      </main>
  </body>
</html>