<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Websites</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <div class="content-section">
            <p>Search for websites based on the department and subject to find resources that suit your needs.</p>
        </div>

        <div class="form-section">
            <h2>Search Websites</h2>
            <form action="results.php" method="get">
                <div class="form-group">
                    <label for="department">Department:</label>
                    <select id="department" name="department" required>
                    <option value="" disabled selected>Select department</option>
                        <option value="Computing">School of Computing</option>
                        <option value="Information Technology">Department of Information Technology</option>
                        <option value="Management and Marketing Resources">Department of Management and Marketing Resources</option>
                        <option value="Department of Mathematics and Statistics">Department of Mathematics and Statistics</option>
                        <option value="School of Education and Behavioral Sciences">School of Education and Behavioral Sciences</option>
                        <option value="Department of English">Department of English</option>
                        <option value="School of Health and Natural Sciences">School of Health and Natural Sciences</option>
                        <option value="Department of History">Department of History</option>
                        <option value="Department of Natural Sciences">Department of Natural Sciences</option>
                        <option value="Department of Nursing">Department of Nursing</option>
                        <option value="Department of Polical Science">Department of Polical Science</option>
                        <option value="Department of Psychology and Criminal Justice">Department of Psychology and Criminal Justice</option>
                        <option value="Department of Rehabilitation Science">Department of Rehabilitation Science</option>
                        <option value="Department of Respiratory Therapy">Department of Respiratory Therapy</option>
                        <option value="Department of Teacher Education and Social Work">Department of Teacher Education and Social Work</option>
                        <option value="School of Arts and Letters">School of Arts and Letters</option>
                        <option value="Department of Media, Culture, and the Arts">Department of Media, Culture, and the Arts</option>
                        <option value="School of Aviation">School of Aviation</option>
                        <option value="Department of Aviation Maintenance and Structural Technology">Department of Aviation Maintenance and Structural Technology</option>
                        <option value="Department of Aviation Science and Management">Department of Aviation Science and Management</option>
                        <option value="School of Business">School of Business</option>
                        <option value="Department of Accounting and Finance Resources">Department of Accounting and Finance Resources</option>
                        <option value="Department of Health Services Administration Resources">Department of Health Services Administration Resources</option>
                        <option value="education">School of Education and Behavioral Sciences</option>
                        <option value="health">School of Health and Natural Sciences</option>
                        <option value="arts">School of Arts and Letters</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <select id="subject" name="subject" required>
                        <option value="" disabled selected>Select subject</option>
                        <option value="math">Math</option>
                        <option value="science">Science</option>
                        <option value="social_studies">Social Studies</option>
                        <option value="english">English</option>
                    </select>
                </div>
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>
