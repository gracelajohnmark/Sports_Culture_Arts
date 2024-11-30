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