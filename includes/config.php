<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 
?>
<?php
// Database configuration
$host = "localhost";
$user = "root" ;
$password = 'openMySQLPrince2007@';
$dbname = "blog_benin";

// Create database connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>