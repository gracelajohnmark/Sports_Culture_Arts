document.addEventListener("DOMContentLoaded", function() {
  const passwordInput = document.getElementById('pass');
  const showIcon = document.getElementById('show-icon');
  const hideIcon = document.getElementById('hide-icon');

  function togglePasswordVisibility() {
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

let subMenu = document.getElementById("subMenu");
        function toggleMenu(){
          subMenu.classList.toggle("openuser-menu");
        }

const toggleButton = document.getElementById('sidetoggle-btn')
const sidebar = document.getElementById('side-nav-group')

function toggleSidebar(){
    sidebar.classList.toggle('open')
}

function toggleSubMenu(button){
    button.nextElementSibling.classList.toggle('show')
    button.classList.toggle('rotate')
}

const firstnameInput = document.getElementById('firstname');
const lastnameInput = document.getElementById('lastname');
const fullnameInput = document.getElementById('fullname');

function updateFullname() {
    fullnameInput.value = `${firstnameInput.value} ${lastnameInput.value}`;
}

firstnameInput.addEventListener('input', updateFullname);
lastnameInput.addEventListener('input', updateFullname);

function showModal(message) {
  const modal = document.getElementById("error-modal");
  const modalMessage = document.getElementById("modal-message");
  if (modal && modalMessage) {
      modalMessage.textContent = message;
      modal.style.display = "flex"; // Show modal
  }
}

function closeModal() {
  const modal = document.getElementById("error-modal");
  if (modal) {
      modal.style.display = "none"; // Hide modal
  }
}

function closeSuccessModal() {
  const successModal = document.getElementById("success-modal");
  if (successModal) {
      successModal.style.display = "none";
      window.location.href = "Registered_Record.php";
  }
}
