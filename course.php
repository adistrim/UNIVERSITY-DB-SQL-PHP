<!DOCTYPE html>
<html>

<head>
    <title>Add Course</title>
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
        h1 {
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
        .submit-button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-button:hover{
            background-color: #45a049;
        }

        /* Style for the container */
        .container {
            margin-top: 50px;
        }

        /* Style for the buttons */
        .button-wrapper {
            align-items: center;
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
    </style>
</head>

<body>
    <div class="container">
        <form method="POST" action="add_course.php" class="form">
            <h1>Add Course</h1>
            <label for="course_id">Course ID:</label>
            <input type="text" name="course_id" required>

            <label for="title">Title:</label>
            <input type="text" name="title" required>

            <label for="dept_name">Department Name:</label>
            <input type="text" name="dept_name" required>

            <label for="credits">Credits:</label>
            <input type="number" name="credits" min="1" max="99" required>

            <div class="button-wrapper">
                <input type="submit" value="Submit" class="submit-button">
            </div>
        </form>
    </div>
</body>

</html>

