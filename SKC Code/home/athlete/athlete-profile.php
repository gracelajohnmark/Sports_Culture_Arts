<?php
    session_start();
    if (!isset($_SESSION['Student_id'])) {
      header("Location: ../../index.php"); // Redirect if not logged in
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="athletestyle.css"/>
    <script type="text/javascript" src="athletescript.js" defer></script>
    <title>SKC Bulan Campus Home Page</title>
  </head>
  <body>
          <nav id="nav-group" class="navcontainer">
            <img class="skc" src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/45d23ffca769b2d9430ba3120f1c5cf69dc9b6c4/img/SKC%20LOGO.png?raw=true" />
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
                  <a href="athlete-profile.php" class="athlete-menu">Athelete Profile</a>
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
                <a href="#">
                <img class= sideformicon src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/PersonalData.png?raw=true" alt="">
                <span>Personal Data</span>
                </a>
                </li>
                <li>
                <a href="#">
                <img class= sideformicon src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/Members%20Profile.png?raw=true" alt="">
                <span>Member's Profile</span>
                </a>
                </li>
                <li>
                <a href="#">
                <img class= sideformicon src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/Varsity%20Applicatio.png?raw=true" alt="">
                <span>Varsity Application Form</span>
                </a>
                </li>
                <li>
                <a href="#">
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
                      <img class="arnistick" src="img/arnistick-3.png" />
                    </div>
                    <div class="overlap-3">
                      <div class="text-wrapper-5">Athletics</div>
                      <div class="overlap-4">
                        <img class="discus-disc" src="img/discus-disc-4.png" />
                        <img class="javelin-stick" src="img/javelin-stick-4.png" />
                        <img class="shotput-ball" src="img/shotput-ball-4.png" />
                      </div>
                    </div>
                    <div class="overlap-5">
                      <div class="text-wrapper-6">Badminton</div>
                      <img class="shuttlecock" src="img/shuttlecock-3.png" />
                    </div>
                    <div class="overlap-6">
                      <div class="text-wrapper-7">Baseball/Softball</div>
                      <img class="basketball-ball" src="img/basketball-ball-4.png" />
                    </div>
                    <div class="overlap-7">
                      <div class="text-wrapper-8">Basketball</div>
                      <img class="baseball-ball" src="img/baseball-ball-2-4.png" />
                    </div>
                    <div class="overlap-8">
                      <div class="text-wrapper-9">Chess</div>
                      <img class="chess" src="img/chess-3.png" />
                    </div>
                    <div class="overlap-9">
                      <div class="text-wrapper-10">Sepak Takraw</div>
                      <img class="takraw-ball" src="img/takraw-ball-5.png" />
                    </div>
                    <div class="overlap-10">
                      <div class="text-wrapper-11">Takewondo</div>
                      <img class="takewondo" src="img/takewondo-3.png" />
                    </div>
                    <div class="overlap-11">
                      <div class="text-wrapper-12">Soccer</div>
                      <img class="soccerball" src="img/soccerball-2.png" />
                    </div>
                    <div class="overlap-12">
                      <div class="text-wrapper-13">Volleyball</div>
                      <img class="volleyballball" src="img/volleyballball-3.png" />
                    </div>
                    <div class="overlap-13">
                      <div class="text-wrapper-14">Table Tennis</div>
                      <img class="table-tennes" src="img/table-tennes-5.png" />
                    </div>
                    <div class="div-wrapper"><div class="text-wrapper-15">Search...</div></div>
                    <div class="overlap-group-2"><div class="text-wrapper-16">ALL</div></div>
                    <div class="overlap-14"><div class="text-wrapper-17">INDIVIDUAL</div></div>
                    <div class="overlap-15"><div class="text-wrapper-17">TEAM</div></div>
                    <div class="overlap-16"><div class="text-wrapper-17">DUAL</div></div>
                    <img class="img" src="img/discus-disc.png" />
                    <img class="javelin-stick-2" src="img/javelin-stick.png" />
              </div>
          </div>
      </main>
  </body>
</html>