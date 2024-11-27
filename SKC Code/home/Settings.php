<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['Student_id'])) {
    header("Location: ../../index.php");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();
    session_destroy();
    header("Location: ../../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="setting.css" />
    <script type="text/javascript" src="homepagescript.js" defer></script>
    <title>SKC Bulan Campus Home Page</title>
</head>

<body>
    <nav id="nav-group" class="navcontainer">
        <img class="skc"
            src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/45d23ffca769b2d9430ba3120f1c5cf69dc9b6c4/img/SKC%20LOGO.png?raw=true" />
        <h4 class="Logoname-1">Sorsogon State University</h4>
        <h4 class="Logoname-2">Sports Culture & Arts</h4>
        <ul>
            <li>
                <a href="homepage.php" class="homepage">Home</a>
            </li>
            <li>
                <a href="sports/sports-equipment.php" class="Sports-menu">Sports Equipments</a>
            </li>
            <li>
                <a href="athlete/athlete-profile.php" class="athlete-menu">Athelete Profile</a>
            </li>
        </ul>
        <img class="notification-icon"
            src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/cdb7af6549cf68baae7687506594b58b49c621d4/img/notification%20icon.png?raw=true" />
        <img class="message-icon"
            src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/ec6e3c09be58d3e17a5e649e2f78f4f2079dda41/img/message%20icon.png?raw=true" />
        <img class="user-login-icon"
            src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/ec6e3c09be58d3e17a5e649e2f78f4f2079dda41/img/user%20login%20icon.png?raw=true"
            onclick="toggleMenu()" />
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img class="user-login-inside-icon" src="https://c.animaapp.com/w7WS4Fj2/img/vector-8.svg" />
                    <h6 class="userinfo-fullname"><?= $_SESSION['Fullname'] ?></h6>
                    <h6 class="userinfo-id"><?= $_SESSION['Student_id'] ?></h6>
                    <h6 class="userinfo-type"><?= $_SESSION['Usertype'] ?></h6>
                </div>
                <hr>
                <a href="#" class="sub-menu-link">
                    <img class="icon-container"
                        src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/010a30821019ac5406a8b227c40e2a1e016e6bd2/img/edit%20profile-icon.png?raw=true"
                        alt="">
                    <p>Edit Profile</p>
                    <span>></span>
                </a>
                <?php if ($_SESSION['Usertype'] == 'admin'): ?>
                    <a href="Settings.php" class="sub-menu-link">
                        <img class="icon-container"
                            src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/010a30821019ac5406a8b227c40e2a1e016e6bd2/img/settings-icon.png?raw=true"
                            alt="">
                        <p>Settings</p>
                        <span>></span>
                    </a>
                <?php endif; ?>
                <a href="../index.php?action=logout" name="action" value="logout" onclick="preventBack();"
                    class="sub-menu-link">
                    <img class="icon-container"
                        src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/41b494d794e93a67976f35ad044cd988655f3943/img/Logout-icon.png?raw=true"
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
                        src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/18d8e4f67ccff86ebe193e27028735e37781c370/img/Navigation%20Menu.png?raw=true" />
                    <img class="backside"
                        src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/backarrow.svg?raw=true">
                </button>
            </li>
            <li class="menu-schedule-container">
                <a href="#">
                    <img class="menu-schedule"
                        src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/29cdfd3cddfd942bc7a8ec904fcbee8cd156c822/img/schedule-icon.svg?raw=true" />
                    <span class="notogglemenu">Schedule</span>
                </a>
            </li>
            <li class="sidenav-li">
                <button onclick=toggleSubMenu(this) class="dropdown-btn">
                    <img class="menu-skcform"
                        src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/form%202.png?raw=true"
                        alt="">
                    <span class="Skcforms">SKC forms</span>
                    <img class="skcform-dropdown"
                        src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/45d23ffca769b2d9430ba3120f1c5cf69dc9b6c4/img/dropdown%20button.png?raw=true"
                        alt="dropdown button">
                </button>
                <ul class="sub-menus">
                    <div>
                        <li class="personal-datamenu">
                            <a href="skc-forms/Personal-Data.php">
                                <img class="menu-personal"
                                    src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/PersonalData.png?raw=true"
                                    alt="">
                                <span class="personal-span">Personal Data</span>
                            </a>
                        </li>
                        <li class="member-datamenu">
                            <a href="skc-forms/Member's-Profile.php">
                                <img class="menu-members"
                                    src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/Members%20Profile.png?raw=true"
                                    alt="">
                                <span class="member-span">Member's Profile</span>
                            </a>
                        </li>
                        <li class="varsity-datamenu">
                            <a href="skc-forms/Varsity-Application-Form.php">
                                <img class="menu-varsity"
                                    src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/Varsity%20Applicatio.png?raw=true"
                                    alt="">
                                <span class="varsity-span">Varsity Application Form</span>
                            </a>
                        </li>
                        <li class="athlete-datamenu">
                            <a href="skc-forms/Athlete-Registration-Form.php">
                                <img class="menu-athlete"
                                    src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/d7dce5cc62bd30c4d315a4be3af0f2507fd0008b/img/Athlete%20RF.svg?raw=true"
                                    alt="">
                                <span class="athlete-span">Athlete Registration Form</span>
                            </a>
                        </li>
                        <li class="application-datamenu">
                            <a href="#">
                                <img class="menu-application"
                                    src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/b187eac418b1f76e51dc7961e473f953cacd8ce2/img/Application%20For%20Sports%20Club.png?raw=true"
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
                        src="https://github.com/gracelajohnmark/Sports_Culture_Arts/blob/484f2959095d1bdd6a1cc8568386c1ea2baac58b/img/Reports-icon.svg?raw=true" />
                    <span class="notogglemenu1">Reports</span>
                </a>
            </li>
        </ul>
    </aside>
    <main>
        <div class="settings-container">
            <div class="user-profile-info">
                <img class="user-profile-icon" src="https://c.animaapp.com/w7WS4Fj2/img/vector-8.svg" />
                <h6 class="user-fullname"><?= $_SESSION['Fullname'] ?></h6>
                <h6 class="user-usertype"><?= $_SESSION['Usertype'] ?></h6>
            </div>
            <div class="container-create">
                <h1 class="h1-container">Settings</h1>
                <ul>
                    <li>
                        <a href="">Create a new account
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</body>

</html>