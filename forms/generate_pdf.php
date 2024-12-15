<?php
// Enable error reporting (for debugging purposes)
ini_set('display_errors', 0); // Set to 1 to display errors during development
ini_set('log_errors', 1);
error_reporting(E_ALL);

// Log errors to a file
error_log("PDF Generation Request Initiated");

// Set the response content type to JSON
header('Content-Type: application/json');
$data = [];
// Get the raw POST data
// Check if JSON is received properly
// $data = json_decode(file_get_contents("php://input"), true);
$data['family-name'] = $_POST['family-name'];
$data['given-name'] = $_POST['given-name'];
$data['middle-name'] = $_POST['middle-name'];
$data['civil-status'] = $_POST['civil-status'];
$data['sex'] = $_POST['sex'];
$data['religion'] = $_POST['religion'];
$data['birth-date'] = $_POST['birth-date'];
$data['age'] = $_POST['age'];
$data['blood-type'] = $_POST['blood-type'];
$data['home-address'] = $_POST['home-address'];
$data['tel'] = $_POST['tel'];
$data['father-name'] = $_POST['father-name'];
$data['father-occupation'] = $_POST['father-occupation'];
$data['mother-name'] = $_POST['mother-name'];
$data['mother-occupation'] = $_POST['mother-occupation'];
$data['emergency-contact'] = $_POST['emergency-contact'];
$data['relationship'] = $_POST['relationship'];
$data['emergency-cp'] = $_POST['emergency-cp'];
$data['school'] = $_POST['school'];
$data['school-address'] = $_POST['school-address'];
$data['course'] = $_POST['course'];
$data['position'] = $_POST['position'];
$data['organization'] = $_POST['organization'];
$data['position-held'] = $_POST['position-held'];

// Log the incoming data
error_log(print_r($data, true)); // Log the incoming POST data for debugging

// Validate the received data



// PDF.co API key and template ID
$apiKey = 'gojitgelbert@sorsu.edu.ph_q7cQu53KRQ6H3QsgDkyf4awMJ8ji5jT0qoCTvE2uJdsVFR3D8isVvI0pt1gvruV4'; // Replace with your API key
$templateId = '3693'; // Replace with your PDF template ID

// Prepare the 'fields' array dynamically from user input, removing empty fields
$fields = [
    ['Name' => 'family_name', 'value' => $data['family-name'] ?? ''],
    ['Name' => 'given_name', 'value' => $data['given-name'] ?? ''],
    ['Name' => 'middle_name', 'value' => $data['middle-name'] ?? ''],
    ['Name' => 'civil_status', 'value' => $data['civil-status'] ?? ''],
    ['Name' => 'sex', 'value' => $data['sex'] ?? ''],
    ['Name' => 'religion', 'value' => $data['religion'] ?? ''],
    ['Name' => 'birth_date', 'value' => $data['birth-date'] ?? ''],
    ['Name' => 'age', 'value' => $data['age'] ?? ''],
    ['Name' => 'blood_type', 'value' => $data['blood-type'] ?? ''],
    ['Name' => 'home_address', 'value' => $data['home-address'] ?? ''],
    ['Name' => 'tel', 'value' => $data['tel'] ?? ''],
    ['Name' => 'father_name', 'value' => $data['father-name'] ?? ''],
    ['Name' => 'father_occupation', 'value' => $data['father-occupation'] ?? ''],
    ['Name' => 'mother_name', 'value' => $data['mother-name'] ?? ''],
    ['Name' => 'mother_occupation', 'value' => $data['mother-occupation'] ?? ''],
    ['Name' => 'emergency_contact', 'value' => $data['emergency-contact'] ?? ''],
    ['Name' => 'relationship', 'value' => $data['relationship'] ?? ''],
    ['Name' => 'emergency_cp', 'value' => $data['emergency-cp'] ?? ''],
    ['Name' => 'school', 'value' => $data['school'] ?? ''],
    ['Name' => 'school_address', 'value' => $data['school-address'] ?? ''],
    ['Name' => 'course', 'value' => $data['course'] ?? ''],
    ['Name' => 'position', 'value' => $data['position'] ?? ''],
    ['Name' => 'organization', 'value' => $data['organization'] ?? ''],
    ['Name' => 'position_held', 'value' => $data['position-held'] ?? '']
];

// Filter out fields with empty values
// $fields = array_filter($fields, function ($field) {
//     return !empty(trim($field['value']));
// });

// if (!$data || !isset($data['fields']) || empty($data['fields'])) {
//     echo json_encode(['success' => false, 'message' => 'All fields are empty. Please fill in at least one field.']);
//     exit();
// }

// Log fields for debugging
error_log("Filtered Fields: " . print_r($fields, true));

// If no valid fields are found, return an error
// if (empty($fields)) {
//     echo json_encode(['success' => false, 'message' => 'All fields are empty. Please fill in at least one field.']);
//     exit();
// }

// Construct the POST payload
$postData = [
    'templateId' => $templateId,
    'fields' => $fields
];

// Set up the request to fill the template
$url = 'https://api.pdf.co/v1/pdf/edit/add'; // Endpoint to edit and fill the template
$headers = [
    'Content-Type: application/json',
    'x-api-key: ' . $apiKey
];

// Use cURL to send the data
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

// Check for cURL errors
if ($error) {
    error_log("cURL Error: " . $error);
    echo json_encode(['success' => false, 'message' => 'Error occurred while connecting to the API.']);
    exit();
}

// Decode the API response
$responseData = json_decode($response, true);

// Debugging: Log the raw API response
error_log("Raw API Response: " . $response);

// Validate the API response
if ($responseData && isset($responseData['success']) && $responseData['success']) {
    // PDF generated successfully
    $pdfDownloadUrl = $responseData['url']; // Correct key for the download URL
    echo json_encode(['success' => true, 'fileName' => $pdfDownloadUrl]);
} else {
    error_log("API Response Error: " . print_r($responseData, true));
    echo json_encode(['success' => false, 'message' => $responseData['message'] ?? 'Unknown error occurred']);
}
?>