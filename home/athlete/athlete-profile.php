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
    <link rel="stylesheet" href="athletestyle.css"/>
    <script type="text/javascript" src="athletescript.js" defer></script>
    <title>Athlete Profile | SKC Bulan Portal</title>
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
        <a href="../athlete-profile.php" class="athlete-menu">Athelete Profile</a>
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
          <h6 class="userinfo-type"><?= $_SESSION['Usertype'] ?></h6>
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
        <a href="../../logout.php?redirect=home/athlete/athlete-profile.php" name="action" value="logout" onclick="preventBack();"
          class="sub-menu-link">
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
             <div class="athlete-profile">
                  <div class="div">
                    <div class="overlap">
                      <div class="overlap-group">
                        <div class="rectangle"></div>
                        <div class="text-wrapper">100</div>
                        <div class="text-wrapper-2">Registered Athlete</div>
                      </div>
                      <p class="student-athlete">
                        <span class="span">Student Athlete Profile Registry<br /></span>
                        <span class="text-wrapper-3">SORSU-BC</span>
                      </p>
                    </div>
                    <div class="overlap-2">
                      <div class="text-wrapper-4">Arnis</div>
                      <img class="arnistick" src="../../img/equipments/arnistick.png" />
                    </div>
                    <div class="overlap-3">
                      <div class="text-wrapper-5">Athletics</div>
                      <div class="overlap-4">
                        <img class="discus-disc" src="../../img/equipments/discus-disc.png" />
                        <img class="javelin-stick" src="../../img/equipments/javelin-stick.png" />
                        <img class="shotput-ball" src="../../img/equipments/shotput-ball.png" />
                      </div>
                    </div>
                    <div class="overlap-5">
                      <div class="text-wrapper-6">Badminton</div>
                      <img class="shuttlecock" src="../../img/equipments/shuttlecock.png" />
                    </div>
                    <div class="overlap-6">
                      <div class="text-wrapper-7">Baseball/Softball</div>
                      <img class="basketball-ball" src="../../img/equipments/baseball-ball.png" />
                    </div>
                    <div class="overlap-7">
                      <div class="text-wrapper-8">Basketball</div>
                      <img class="baseball-ball" src="../../img/equipments/basketball-ball.png" />
                    </div>
                    <div class="overlap-8">
                      <div class="text-wrapper-9">Chess</div>
                      <img class="chess" src="../../img/equipments/chess.png" />
                    </div>
                    <div class="overlap-9">
                      <div class="text-wrapper-10">Sepak Takraw</div>
                      <img class="takraw-ball" src="../../img/equipments/takraw-ball.png" />
                    </div>
                    <div class="overlap-10">
                      <div class="text-wrapper-11">Takewondo</div>
                      <img class="takewondo" src="../../img/equipments/takewondo.png" />
                    </div>
                    <div class="overlap-11">
                      <div class="text-wrapper-12">Soccer</div>
                      <img class="soccerball" src="../../img/equipments/soccerball.png" />
                    </div>
                    <div class="overlap-12">
                      <div class="text-wrapper-13">Volleyball</div>
                      <img class="volleyballball" src="../../img/equipments/volleyball-ball.png" />
                    </div>
                    <div class="overlap-13">
                      <div class="text-wrapper-14">Table Tennis</div>
                      <img class="table-tennes" src="../../img/equipments/table-tennes.png" />
                    </div>
                    <div class="div-wrapper"><div class="text-wrapper-15">Search...</div></div>
                    <div class="overlap-group-2"><div class="text-wrapper-16">ALL</div></div>
                    <div class="overlap-14"><div class="text-wrapper-17">INDIVIDUAL</div></div>
                    <div class="overlap-15"><div class="text-wrapper-17">TEAM</div></div>
                    <div class="overlap-16"><div class="text-wrapper-17">DUAL</div></div>
              </div>
          </div>
      </main>
  </body>
</html>