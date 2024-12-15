let subMenu = document.getElementById("subMenu");

// Toggle user menu visibility
function toggleMenu() {
    subMenu.classList.toggle("openuser-menu");
}

const toggleButton = document.getElementById('sidetoggle-btn');
const sidebar = document.getElementById('side-nav-group');

// Toggle sidebar visibility
function toggleSidebar() {
    sidebar.classList.toggle('open');
}

// Toggle visibility of submenus and apply rotation to the button
function toggleSubMenu(button) {
    button.nextElementSibling.classList.toggle('show');
    button.classList.toggle('rotate');
}

// Function to collect form data and send it to the server to generate PDF
function displayResult() {
  const fields = [
      'family-name', 'given-name', 'middle-name', 'civil-status', 'sex', 'religion', 'birth-date',
      'age', 'blood-type', 'home-address', 'tel', 'father-name', 'father-occupation', 'mother-name',
      'mother-occupation', 'emergency-contact', 'relationship', 'emergency-cp', 'school',
      'school-address', 'course', 'position', 'organization', 'position-held'
  ];

  // Collect data from the form inputs dynamically
  const data = fields.reduce((acc, id) => {
      const input = document.getElementById(id);
      if (input && input.value) {  // Only add fields with valid user input
          acc.push({
              name: id.replace('-', '_'),  // Replace hyphens with underscores for API compatibility
              value: input.value          // User's input value
          });
      }
      return acc;
  }, []);

  // Log the data being sent
  console.log("Sending data:", data);

  // If no data was entered, alert the user
  if (data.length === 0) {
      alert("Please fill in the form before submitting.");
      return;
  }

  // Send the data to the server to generate the PDF
//   fetch('generate_pdf.php', {
//       method: 'POST',
//       headers: {
//           'Content-Type': 'application/json',
//           'x-api-key': 'q7cQu53KRQ6H3QsgDkyf4awMJ8ji5jT0qoCTvE2uJdsVFR3D8isVvI0pt1gvruV4' // Replace with your actual API key
//       },
//       body: JSON.stringify({
//           fields: data
//       })
//   })
//   .then(response => response.text())  // Get the raw response as text
//   .then(data => {
//       console.log('Raw Response Text:', data);  // Log the raw response
//       try {
//           const jsonData = JSON.parse(data);  // Parse response if it’s valid JSON
//           if (jsonData.success) {
//               alert("PDF successfully generated!");
//               console.log("PDF Download URL:", jsonData.fileName);
//               // Optionally redirect to or open the PDF file
//               window.open(jsonData.fileName, '_blank');
//           } else {
//               alert("Failed to generate PDF: " + jsonData.message);
//           }
//       } catch (e) {
//           console.error("Error parsing JSON:", e);
//           alert("Received invalid response from the server.");
//       }
//   })
//   .catch(error => {
//       console.log("Fetch error:", error);
//       alert("Failed to generate PDF. Please try again.");
//   });
}
