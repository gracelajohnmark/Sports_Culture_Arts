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

  function showContent(tab) {
    const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.content');
    
    tabs.forEach(t => t.classList.remove('active'));
    contents.forEach(c => c.classList.remove('active'));

    document.querySelector(`.tab[onclick="showContent('${tab}')"]`).classList.add('active');
    document.getElementById(tab).classList.add('active');
  }

  function toggleEdit() {
      const title = document.getElementById("title");
      const inputs = document.querySelectorAll(".stats input");
      const isEditable = title.isContentEditable;

      // Toggle contenteditable and input fields
      title.contentEditable = !isEditable;
      inputs.forEach(input => input.disabled = isEditable);

      // Change button text
      const button = document.querySelector(".header button");
      button.textContent = isEditable ? "Edit" : "Save";
    }

    function filterSports(category) {
      // Remove active class from buttons
      document.querySelectorAll('.filter-buttons button').forEach(button => {
        button.classList.remove('active');
      });

      // Add active class to the clicked button
      document.querySelector(`.filter-buttons button[onclick="filterSports('${category}')"]`).classList.add('active');

      // Show/hide sports based on category
      document.querySelectorAll('.icons-container .icon').forEach(icon => {
        if (icon.classList.contains(category) || category === 'all') {
          icon.classList.remove('hidden');
        } else {
          icon.classList.add('hidden');
        }
      });
    }