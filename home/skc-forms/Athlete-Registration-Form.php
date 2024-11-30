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
    <link rel="stylesheet" href="AthleteRFstyle.css"/>
    <script type="text/javascript" src="skcformscript.js" defer></script>
    <title>Form Athlete Registration | SKC Bulan Portal</title>
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
                <a href="../../logout.php?redirect=home/skc-forms/Athlete-Registration-Form.php" class="sub-menu-link">
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
              <a href="Athlete-Registration-Form.php">
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
            <div class="ATHLETE-s">
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
                  <div class="div">ATHELETE’S REGISTRATION FORM</div>
                </div>
                <div class="l-personal">
                  <div class="text-wrapper-3">Name:</div>
                  <div class="text-wrapper-4">Address:</div>
                  <div class="text-wrapper-5">Gender:</div>
                  <div class="text-wrapper-6">Height:</div>
                  <div class="text-wrapper-7">Birthdate:</div>
                  <div class="text-wrapper-8">Citizenship:</div>
                  <div class="text-wrapper-9">Mobile Number:</div>
                  <div class="text-wrapper-10">Chosen Sports Discipline:</div>
                  <div class="text-wrapper-11">First Choice:</div>
                  <div class="text-wrapper-12">Second Choice:</div>
                  <div class="text-wrapper-13">Civil Status:</div>
                  <div class="text-wrapper-14">Place of Birth:</div>
                  <div class="text-wrapper-15">Weight:</div>
                  <div class="text-wrapper-16">Blood Type:</div>
                  <div class="text-wrapper-17">Birthday:</div>
                  <div class="text-wrapper-18">Age:</div>
                  <div class="text-wrapper-19">l. PERSONAL INFORMATION</div>
                  <div class="text-wrapper-20">Nickname:</div>
                  <div class="rectangle"></div>
                  <div class="overlap"><div class="text-wrapper-21">MM/DD/YYYY</div></div>
                  <div class="rectangle-2"></div>
                  <div class="rectangle-3"></div>
                  <div class="rectangle-4"></div>
                  <div class="rectangle-5"></div>
                  <div class="rectangle-6"></div>
                  <div class="rectangle-7"></div>
                  <div class="rectangle-8"></div>
                  <div class="rectangle-9"></div>
                  <div class="rectangle-10"></div>
                  <div class="rectangle-11"></div>
                  <div class="div-wrapper"><div class="text-wrapper-21">100</div></div>
                  <div class="rectangle-12"></div>
                  <div class="rectangle-13"></div>
                  <div class="family-name">
                    <div class="overlap-group-2">
                      <div class="rectangle-14"></div>
                      <div class="text-wrapper-22">Father’s Name:</div>
                    </div>
                    <div class="rectangle-15"></div>
                    <div class="text-wrapper-23">Mother’s Name:</div>
                  </div>
                  <div class="overlap-2">
                    <div class="rectangle-16"></div>
                    <div class="male-female-LGBT">Male<br />Female<br />LGBT<br />Prefer not to say</div>
                  </div>
                </div>
                <div class="ll-tournament">
                  <div class="text-wrapper-24">ll. TOURNAMENT ATTENDED:</div>
                  <div class="text-wrapper-25">A. BARANGAY LEVEL</div>
                  <div class="text-wrapper-26">B. UNIT MEET</div>
                  <div class="text-wrapper-27">C. PROVINCIAL MEET</div>
                  <div class="text-wrapper-28">D. REGIONAL MEET</div>
                  <div class="group">
                    <div class="text-wrapper-29">1.</div>
                    <div class="rectangle-17"></div>
                    <div class="text-wrapper-30">2.</div>
                    <div class="rectangle-18"></div>
                    <div class="text-wrapper-31">3.</div>
                    <div class="rectangle-19"></div>
                  </div>
                  <div class="text-wrapper-32">AWARDS RECEIVED</div>
                  <div class="group-2">
                    <div class="text-wrapper-29">1.</div>
                    <div class="rectangle-17"></div>
                    <div class="text-wrapper-30">2.</div>
                    <div class="rectangle-18"></div>
                    <div class="text-wrapper-31">3.</div>
                    <div class="rectangle-19"></div>
                  </div>
                  <div class="text-wrapper-33">AWARDS RECEIVED</div>
                  <div class="group-3">
                    <div class="text-wrapper-29">1.</div>
                    <div class="rectangle-17"></div>
                    <div class="text-wrapper-30">2.</div>
                    <div class="rectangle-18"></div>
                    <div class="text-wrapper-31">3.</div>
                    <div class="rectangle-19"></div>
                  </div>
                  <div class="text-wrapper-34">AWARDS RECEIVED</div>
                  <div class="group-4">
                    <div class="text-wrapper-29">1.</div>
                    <div class="rectangle-17"></div>
                    <div class="text-wrapper-30">2.</div>
                    <div class="rectangle-18"></div>
                    <div class="text-wrapper-31">3.</div>
                    <div class="rectangle-19"></div>
                  </div>
                  <div class="text-wrapper-35">AWARDS RECEIVED</div>
                  <div class="group-5">
                    <div class="text-wrapper-29">1.</div>
                    <div class="rectangle-17"></div>
                    <div class="text-wrapper-30">2.</div>
                    <div class="rectangle-18"></div>
                    <div class="text-wrapper-31">3.</div>
                    <div class="rectangle-19"></div>
                  </div>
                  <div class="text-wrapper-36">AWARDS RECEIVED</div>
                  <div class="group-6">
                    <div class="text-wrapper-29">1.</div>
                    <div class="rectangle-17"></div>
                    <div class="text-wrapper-30">2.</div>
                    <div class="rectangle-18"></div>
                    <div class="text-wrapper-31">3.</div>
                    <div class="rectangle-19"></div>
                  </div>
                  <div class="group-7">
                    <div class="text-wrapper-29">1.</div>
                    <div class="rectangle-17"></div>
                    <div class="text-wrapper-30">2.</div>
                    <div class="rectangle-18"></div>
                    <div class="text-wrapper-31">3.</div>
                    <div class="rectangle-19"></div>
                  </div>
                  <div class="group-8">
                    <div class="text-wrapper-29">1.</div>
                    <div class="rectangle-17"></div>
                    <div class="text-wrapper-30">2.</div>
                    <div class="rectangle-18"></div>
                    <div class="text-wrapper-31">3.</div>
                    <div class="rectangle-19"></div>
                  </div>
                  <div class="group-9">
                    <div class="text-wrapper-29">1.</div>
                    <div class="rectangle-17"></div>
                    <div class="text-wrapper-30">2.</div>
                    <div class="rectangle-18"></div>
                    <div class="text-wrapper-31">3.</div>
                    <div class="rectangle-19"></div>
                  </div>
                  <div class="text-wrapper-37">E. NATIONAL MEET</div>
                  <div class="group-10">
                    <div class="text-wrapper-29">1.</div>
                    <div class="rectangle-17"></div>
                    <div class="text-wrapper-30">2.</div>
                    <div class="rectangle-18"></div>
                    <div class="text-wrapper-31">3.</div>
                    <div class="rectangle-19"></div>
                  </div>
                </div>
                <div class="lll-medical">
                  <div class="text-wrapper-19">lll. MEDICAL INFORMATION</div>
                  <p class="please-list-any">
                    Please list any medical problems, including any requiring maintenance medica-<br />tion (i.e., Diabetic,
                    Asthma, Seizures).
                  </p>
                  <div class="group-11">
                    <div class="text-wrapper-38">1.</div>
                    <div class="rectangle-20"></div>
                    <div class="text-wrapper-39">2.</div>
                    <div class="rectangle-21"></div>
                    <div class="text-wrapper-40">3.</div>
                    <div class="rectangle-22"></div>
                  </div>
                  <div class="i-hereby-certify-wrapper">
                    <p class="i-hereby-certify">
                      <span class="text-wrapper-41"
                        >I hereby certify that all the written information above is true and correct.<br /> <br /> <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        _________________________________________<br />        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      </span>
                      <span class="text-wrapper-42">Signature over Printed Name of Athlete</span>
                      <span class="text-wrapper-43">      </span>
                    </p>
                  </div>
                </div>
              </div>
        </main>
    </body>
</html>