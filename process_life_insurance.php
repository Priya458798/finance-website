<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection variables
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";  // Default password for XAMPP (empty by default)
$dbname = "life_insurance";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $permanentAddress = $_POST['permanentAddress'];
    $city = $_POST['city'];
    $birthDate = $_POST['birthDate'];
    $zipCode = $_POST['zipCode'];
    $country = $_POST['country'];

    // Insert data into database
    $sql = "INSERT INTO insurance_data (firstName, lastName, permanentAddress, city, birthDate, zipCode, country) 
            VALUES ('$firstName', '$lastName', '$permanentAddress', '$city', '$birthDate', '$zipCode', '$country')";

    if ($conn->query($sql) === TRUE) {
        // Record inserted successfully
        echo "Record submitted successfully.";
    } else {
        // Error inserting record
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
