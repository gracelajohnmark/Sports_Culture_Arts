document.addEventListener("DOMContentLoaded", function() {
    const form = document.forms["LoginForm"];
    const usernameInput = form["username"];
    const passwordInput = form["password"];
    const usernameError = document.getElementById("username-error");
    const passwordError = document.getElementById("password-error");
    const showIcon = document.getElementById('show-icon');
    const hideIcon = document.getElementById('hide-icon');

    // Add event listeners to clear error messages when typing
    usernameInput.addEventListener("input", function() {
        usernameError.innerText = "";
    });

    passwordInput.addEventListener("input", function() {
        passwordError.innerText = "";
    });

    form.addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevents form submission if validation fails
        }
    });

function validateForm() {
    const form = document.forms["LoginForm"];
    if (!form) {
        console.error("Form 'LoginForm' not found.");
        return false;
    }

    const username = form["username"].value.trim();
    const password = form["password"].value.trim();
    let isValid = true;

    // Clear previous error messages from PHP
    document.getElementById("username-error").innerText = "";
    document.getElementById("password-error").innerText = "";

    if (username === "") {
        document.getElementById("username-error").innerText = "Please enter a Username/Student ID";
        isValid = false;
    }

    if (password === "") {
        document.getElementById("password-error").innerText = "Please enter a password";
        isValid = false;
    } else if (password.length < 8) {
        document.getElementById("password-error").innerText = "Password must be 8 characters long";
        isValid = false;
    }

    return isValid;
    }

function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const showIcon = document.getElementById('show-icon');
    const hideIcon = document.getElementById('hide-icon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        showIcon.style.display = 'none';
        hideIcon.style.display = 'inline';
    } else {
        passwordInput.type = 'password';
        showIcon.style.display = 'inline';
        hideIcon.style.display = 'none';
    }
}
showIcon.addEventListener('click', togglePasswordVisibility);
hideIcon.addEventListener('click', togglePasswordVisibility);
});
