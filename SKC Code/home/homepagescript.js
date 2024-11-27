let subMenu = document.getElementById("subMenu");
        function toggleMenu(){
          subMenu.classList.toggle("openuser-menu");
        }

const toggleButton = document.getElementById('sidetoggle-btn')
const sidebar = document.getElementById('side-nav-group')

function toggleSidebar(){
  if (sidebar.classList.contains('open')) {
    sidebar.classList.remove('open');
    sidebar.classList.add('close');
} else {
    sidebar.classList.remove('close');
    sidebar.classList.add('open');
}
}

function toggleSubMenu(button){
    button.nextElementSibling.classList.toggle('show')
    button.classList.toggle('rotate')
}

document.addEventListener('DOMContentLoaded', function() {
  const logoutLink = document.querySelector('a[name="action"][value="logout"]');
  if (logoutLink) {
      logoutLink.addEventListener('click', function(event) {
          event.preventDefault(); // Prevent the default link action
          // Redirect to logout action
          window.location.href = '../index.php?action=logout';
      });
  }
});

function preventBack() {
  window.history.forward();
}

// Call the preventBack function immediately when the page loads
setTimeout(preventBack, 0);

// Prevent back navigation when the page is unloaded
window.onunload = function() { null; }