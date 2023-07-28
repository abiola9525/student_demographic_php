
<?php
// Database connection
$conn = mysqli_connect('localhost', 'ora', '9525', 'student_demographic');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $language = $_POST['language'];
    $zipcode = $_POST['zipcode'];
    $about = $_POST['about'];

    // Insert data into the database
    $query = "INSERT INTO users (name, email, password, phone, gender, language, zipcode, about) 
              VALUES ('$name', '$email', '$password', '$phone', '$gender', '$language', '$zipcode', '$about')";
    $result = mysqli_query($conn, $query);

    // Check if insertion was successful
    if ($result) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
