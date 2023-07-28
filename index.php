
<!DOCTYPE html>
<html>
<head>
    <title>Web App Demo</title>
    <style>
        body {
            background: linear-gradient(135deg, #2E3192, #1BFFFF);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #FFF;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 400px;
            margin-top: 100vh;
            
        }

        .container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #CCC;
        }

        .form-group input[type="radio"] {
            display: inline-block;
            margin-right: 10px;
        }

        .form-group select {
            appearance: none;
            -webkit-appearance: none;
            padding-right: 25px;
            background-image: url('arrow.png');
            background-repeat: no-repeat;
            background-position: right center;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group input[type="submit"] {
        background-color: #1BFFFF;
        color: #FFF;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
        background-color: #0EBFE9;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Demographic Form</h1>
        <form action="process.php" method="POST" onsubmit="return validateEmail();">
            <img src="image.JPG" alt="Passport" width="400" height="200">
            <br><br><br>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>             
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" required>      
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="radio" name="gender" value="male" required> Male
                <input type="radio" name="gender" value="female" required> Female
            </div>
            
            <div class="form-group">
                <label for="language">Language:</label>
                <select name="language" required>
                    <option value="">Select Language</option>
                    
                    <?php
                    // Database connection
                    
                    $conn = mysqli_connect('localhost', 'ora', '9525', 'student_demographic');

                    // Fetch languages from database
                    $query = "SELECT name FROM languages";
                    $result = mysqli_query($conn, $query);

                    // Populate dropdown with languages
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                    }

                    // Close database connection
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <!-- <br><br> -->
            <div class="form-group">
                <label for="zipcode">Zip Code:</label>
                <input type="text" name="zipcode" required>
            </div>
            <div class="form-group">
                <label for="about">About:</label>
                <textarea name="about" required></textarea>
            </div>
                <div class="form-group">
                <input type="submit" value="Submit">
            <div>
        </form>
    </div>
</body>
</div>
<script>
    function validateEmail() {
        var emailInput = document.forms["myForm"]["email"].value;
        var emailRegex = /^\S+@\S+\.\S+$/;

        if (!emailRegex.test(emailInput)) {
            alert("Please enter a valid email address");
            return false;
        }
    }
</script>
</html>
