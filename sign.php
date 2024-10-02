<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate the input (you can add more validation rules as needed)
    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
        // You might want to redirect the user back to the signup page with an error message
        exit;
    }

    // Hash and salt the password (use a strong hashing algorithm)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Store the user information in the database (replace with your database logic)
    $servername = "localhost";
    $dbusername = "";
    $dbpassword = "";
    $dbname = "craft";

    $conn = new mysqli('localhost', $dbusername, $dbpassword, 'craft');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data into the database (replace with your actual database table and column names)
    $sql = "INSERT INTO signin (name, email,password) VALUES ('$name','$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        // Redirect to a login page or perform additional actions
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>






   