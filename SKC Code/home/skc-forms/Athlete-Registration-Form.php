<?php
    session_start();
    if (!isset($_SESSION['Student_id'])) {
      header("Location: login.php"); // Redirect if not logged in
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AthleteRFstyle.css"/>
    <script type="text/javascript" src="skcformscript.js" defer></script>
    <title>SKC Bulan Campus Home Page</title>
  </head>
  <body>
          <nav id="nav-group" class="navcontainer">
            <img class="skc" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/45d23ffca769b2d9430ba3120f1c5cf69dc9b6c4/img/SKC%20LOGO.png?raw=true" />
            <h4 class="Logoname-1">Sorsogon State University</h4>
            <h4 class="Logoname-2">Sports Culture & Arts</h4> 
              <ul>
                <li>
                  <a href=".././homepage.php" class="homepage">Home</a>
                </li>
                <li>
                  <a href="../sports/sports-equipment.php" class="Sports-menu">Sports Equipments</a>
                </li>
                <li>
                  <a href="../athlete/athlete-profile.php" class="athlete-menu">Athelete Profile</a>
                </li>
              </ul>
              <div class="vector-wrapper">
            <img class="search-icon" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/ec6e3c09be58d3e17a5e649e2f78f4f2079dda41/img/search-icon.png?raw=true" />
            </div>
            <img class="notification-icon" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/cdb7af6549cf68baae7687506594b58b49c621d4/img/notification%20icon.png?raw=true" />
            <img class="message-icon" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/ec6e3c09be58d3e17a5e649e2f78f4f2079dda41/img/message%20icon.png?raw=true" />
            <img class="user-login-icon" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/ec6e3c09be58d3e17a5e649e2f78f4f2079dda41/img/user%20login%20icon.png?raw=true" onclick="toggleMenu()" />
            <div class="sub-menu-wrap" id="subMenu">
              <div class="sub-menu">
                <div class="user-info">
                <img class="user-login-inside-icon" src="https://c.animaapp.com/w7WS4Fj2/img/vector-8.svg" />
                <h6 class="userinfo-fullname"><?= $_SESSION['Fullname'] ?></h6>
                <h6 class="userinfo-id"><?= $_SESSION['Student_id'] ?></h6>
                <h6 class="userinfo-type"><?=$_SESSION['Usertype']?></h6>
                </div>
                <hr>
                <a href="#" class="sub-menu-link">
                  <img class="icon-container" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/010a30821019ac5406a8b227c40e2a1e016e6bd2/img/edit%20profile-icon.png?raw=true" alt="">
                  <p>Edit Profile</p>
                  <span>></span>
                </a>
                <a href="#" class="sub-menu-link">
                  <img class="icon-container" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/010a30821019ac5406a8b227c40e2a1e016e6bd2/img/settings-icon.png?raw=true" alt="">
                  <p>Settings</p>
                  <span>></span>
                </a>
                <a href="../../index.php" class="sub-menu-link">
                  <img class="icon-container" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/41b494d794e93a67976f35ad044cd988655f3943/img/Logout-icon.png?raw=true" alt="">
                  <p>Logout</p>
                  <span>></span>
                </a>
                </div> 
                </div>
                </nav>
        <aside id="side-nav-group">
          <ul>
            <li>
              <span class="sidebar-logo">SKC Portal</span>
              <button onclick=toggleSidebar() id="sidetoggle-btn">
              <img class="backside" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/backarrow.svg?raw=true"/>
              </button>
            </li>
            <li class="active">
              <a href="#" class="navigation-menu">
              <img class="navmenu" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/29cdfd3cddfd942bc7a8ec904fcbee8cd156c822/img/schedule-icon.svg?raw=true"/>
              <span class="menu">Schedule</span>
              </a>
            </li>
            <li class="sidenav-li">
              <button onclick=toggleSubMenu(this) class="dropdown-btn">
                <img class= sideicon src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/form%202.png?raw=true" alt="">
                <span>SKC forms</span>
                <img class="form-icon" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/45d23ffca769b2d9430ba3120f1c5cf69dc9b6c4/img/dropdown%20button.png?raw=true" alt="dropdown button">
              </button>
              <ul class="sub-menus">
                <div>
                <li>
                <a href="Personal-Data.php">
                <img class= sideformicon src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/PersonalData.png?raw=true" alt="">
                <span>Personal Data</span>
                </a>
                </li>
                <li>
                <a href="Member's-Profile.php">
                <img class= sideformicon src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/Members%20Profile.png?raw=true" alt="">
                <span>Member's Profile</span>
                </a>
                </li>
                <li>
                <a href="Varsity-Application-Form.php">
                <img class= sideformicon src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/Varsity%20Applicatio.png?raw=true" alt="">
                <span>Varsity Application Form</span>
                </a>
                </li>
                <li>
                <a href="Athlete-Registration-Form.php">
                <img class= sideformicon src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/d7dce5cc62bd30c4d315a4be3af0f2507fd0008b/img/Athlete%20RF.svg?raw=true" alt="">
                <span>Athlete Registration Form</span>
                </a>
                </li>
                <li>
                <a href="#">
                <img class= sideformicon src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/Application%20For%20Sports%20Club.png?raw=true" alt="">
                <span>Application for Sports Club</span>
                </a>
                </li>
                </div>
              </ul>
            </li>
            <li>
              <a href="#" class="navigation-menu">
              <img class="navmenu" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/484f2959095d1bdd6a1cc8568386c1ea2baac58b/img/Reports-icon.svg?raw=true"/>
              <span class="menu">Reports</span>
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