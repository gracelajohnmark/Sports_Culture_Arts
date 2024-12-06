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

if (isset($_GET['error'])) {
    $error_message = '';
    if ($_GET['error'] === 'duplicate_id') {
        $error_message = "The Student ID already exists.";
    } elseif ($_GET['error'] === 'general_error') {
        $error_message = "An unexpected error occurred. Please try again.";
    }
}

$success_message = '';
if (isset($_GET['success']) && $_GET['success'] === 'record_added') {
    $success_message = "Record added successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | SKC Bulan Portal </title>
    <script type="text/javascript" src="create_user.js" defer></script>
    <link rel="stylesheet" href="create_user.css" />
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
                    <h6 class="username">
                        <?= htmlspecialchars($firstLetterFirstname) . htmlspecialchars($firstLetterLastname) ?>
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
                    <a href="Settings.php" class="sub-menu-link">
                        <img class="icon-container" src="../../img/settings-icon.svg" alt="">
                        <p>Settings</p>
                        <span>></span>
                    </a>
                <?php endif; ?>
                <a href="../../logout.php?redirect=home/settings/Create_Account.php" name="action" value="logout"
                    onclick="preventBack();" class="sub-menu-link">
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
                            <a href="../skc-forms/Personal-Data.php">
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
        <div class="create_container">
            <header class="Skc_create">
                <h2>SKC Create Account</h2>
            </header>
            <form action="process_create.php" method="POST">
                <header class="Skc_signup">
                    <h2>Sign up</h2>
                </header>
                <label for="student_id" class="label_student_id">Student ID:</label><br>
                <input type="text" id="student_id" name="student_id" required><br><br>

                <label for="lastname" class="label_lastname">Last Name:</label><br>
                <input type="text" id="lastname" name="lastname" required><br><br>

                <label for="firstname" class="label_firstname">First Name:</label><br>
                <input type="text" id="firstname" name="firstname" required><br><br>

                <label for="address" class="label_address">Address:</label><br>
                <span class="info-tooltip-address"
                    data-tooltip="Note: if user dont have address, the default input will be N/A.">?</span><br>
                <input type="text" id="address" name="address" value="N/A"><br><br>

                <label for="fullname" class="label_fullname">Full Name:</label><br>
                <span class="info-tooltip-fullname"
                    data-tooltip="Note: Fullname will reflect to the input of lastname and firstname. it will generate automatically the lastname and firstname as fullname">?</span><br>
                <input type="text" id="fullname" name="fullname" readonly><br><br>

                <label for="pass" class="label_password">Password:</label><br>
                <input type="password" id="pass" name="pass" required><br><br>
                <img id="show-icon" src="../../img/login/open-eye-show.svg" alt="Show Password">
                <img id="hide-icon" src="../../img/login/CloseEyeHIDE.svg" alt="Hide Password" style="display: none;">

                <label for="email_address" class="label_email_address">Email Address:</label><br>
                <span class="info-tooltip-email"
                    data-tooltip="Note: if user dont have email address, the default input will be @gmail.com.">?</span><br>
                <input type="email" id="email_address" name="email_address" value="n/a@gmail.com"><br><br>

                <label for="mobile_number" class="label_mobile_number">Mobile Number:</label><br>
                <span class="info-tooltip-number"
                    data-tooltip="Note: if user dont have mobile number, the default input will be +639.">?</span><br>
                <input type="text" id="mobile_number" name="mobile_number" value="+639"><br><br>

                <label for="usertype" class="label_usertype">User Type:</label><br>
                <select id="usertype" name="usertype" required>
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                    <option value="officer">Officer</option>
                    <option value="adviser">Adviser</option>
                </select><br><br>

                <button class="buttonsubmit" type="submit">Submit</button>

                <div id="error-modal" class="modal"
                    style="<?= isset($error_message) ? 'display: flex;' : 'display: none;' ?>">
                    <div class="modal-content">
                        <h2>Error</h2>
                        <p id="modal-message"><?= $error_message ?? '' ?></p>
                        <button onclick="closeModal()">OK</button>
                    </div>
                </div>

                <div id="success-modal" class="modal"
                    style="<?= !empty($success_message) ? 'display: flex;' : 'display: none;' ?>">
                    <div class="modal-content">
                        <h2 class="success">Success</h2>
                        <p id="success-message"><?= $success_message ?></p>
                        <button class="oksuccess" onclick="closeSuccessModal()">OK</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>