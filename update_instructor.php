<!DOCTYPE html>
<html>

<head>
    <title>Update Instructor Information</title>
    <style>
        /* Style for the form */
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
            text-align: center;
        }

        /* Style for the headings */
        h2 {
            text-align: center;
            color: #333;
        }

        /* Style for the labels */
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        /* Style for the input fields */
        input[type="text"],
        input[type="number"] {
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        /* Style for the submit button */
        .button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }

        /* Style for the container */
        .container {
            margin-top: 50px;
        }

        /* Style for the buttons */
        .button-wrapper {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* Style for the form elements */
        form label,
        form input[type="text"],
        form input[type="number"] {
            text-align: left;
            display: block;
            width: 100%;
        }

        /* Style for error messages */
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php
    // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "university";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $sql = "SELECT * FROM instructor WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);
    }
    ?>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Update Instructor Information</h2>
            <label for="id">Instructor ID:</label>
            <input type="text" name="id" value="<?php if (isset($id)) {
                echo $id;
            } ?>">

            <input class="button" type="submit" name="submit" value="Submit">
            <br><br>

            <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $sql = "SELECT * FROM instructor WHERE ID = '$id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $name = $row['name'];
                    $dept_name = $row['dept_name'];
                    $salary = $row['salary'];
                } else {
                    echo '<br>';
                    echo "No instructor found with ID: $id";
                }
            }

            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $dept_name = $_POST['dept_name'];
                $salary = $_POST['salary'];
                $sql = "UPDATE instructor SET name='$name', dept_name='$dept_name', salary=$salary WHERE ID='$id'";
                if (mysqli_query($conn, $sql)) {
                    echo "Instructor information updated successfully";
                } else {
                    echo "Error updating instructor information: " . mysqli_error($conn);
                }
            }

            mysqli_close($conn);
            ?>

            <?php if (isset($name)) { ?>
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
            <?php } ?>

            <?php if (isset($dept_name)) { ?>
                <label for="dept_name">Department Name:</label>
                <input type="text" name="dept_name" value="<?php echo $dept_name; ?>">
            <?php } ?>

            <?php if (isset($salary)) { ?>
                <label for="salary">Salary:</label>
                <input type="text" name="salary" value="<?php echo $salary; ?>">
            <?php } ?>

            <?php if (isset($name) && isset($dept_name) && isset($salary)) { ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="button-wrapper">
                    <input class="button" type="submit" name="update" value="Update Instructor Information">
                    <button class="button" onclick="location.reload()">Refresh</button>
                </div>
            <?php } ?>
        </form>
    </div>
</body>

</html>