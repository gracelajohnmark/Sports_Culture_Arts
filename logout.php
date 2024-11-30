<?php
session_start();

// Define the session timeout duration (in seconds)
define('SESSION_TIMEOUT', 30); // 30 minutes

// Check if the user session is active and not expired
if (isset($_SESSION['Student_id']) && $_SESSION['Student_id'] === true) {
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > SESSION_TIMEOUT) {
        // Session has expired, log the user out
        $_SESSION = [];
        session_destroy();

        // Clear the session cookie if it exists
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Redirect to login page with timeout message
        header("Location: /index.php?message=session_timeout");
        exit;
    } else {
        // Session is active, redirect logged-in user to homepage
        $_SESSION['last_activity'] = time(); // Update last activity timestamp
        header("Location: /home/homepage.php");
        exit;
    }
}

$_SESSION = [];
session_destroy();

// Clear the session cookie if it exists
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Determine the redirect destination
$redirect = "/index.php"; // Default redirect

if (isset($_GET['redirect'])) {
    // Validate the redirect parameter to prevent malicious redirects
    if (preg_match('/^[a-zA-Z0-9\/_.-]+$/', $_GET['redirect'])) {
        $redirect = "/" . ltrim($_GET['redirect'], '/');
    }
} elseif (isset($_SERVER['HTTP_REFERER'])) {
    // Determine redirection based on referrer
    $parsed_url = parse_url($_SERVER['HTTP_REFERER']);
    if (isset($parsed_url['path'])) {
        $path = $parsed_url['path'];

        if (strpos($path, 'sports') !== false) {
            $redirect = "/home/sports/sports-equipment.php";
        } elseif (strpos($path, 'athlete') !== false) {
            $redirect = "/home/athlete/athlete-profile.php";
        } elseif (strpos($path, 'skc-forms') !== false) {
            if (strpos($path, "Member's-Profile") !== false) {
                $redirect = "/home/skc-forms/Member's-Profile.php";
        } elseif (strpos($path, 'Varsity-Application-Form') !== false) {
                $redirect = "/home/skc-forms/Varsity-Application-Form.php";
        } elseif (strpos($path, 'Athlete-Registration-Form') !== false) {
                $redirect = "/home/skc-forms/Athlete-Registration-Form.php";
        }else{
            $redirect = "/home/skc-forms/Personal-Data.php";
            }
        } elseif (strpos($path, 'homepage.php') !== false) {
            $redirect = "/home/homepage.php";
        }
    }
}

// Perform the redirect
header("Location: $redirect");
exit;
?>
