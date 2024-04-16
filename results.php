<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['department']) || !isset($_GET['subject'])) {
    echo 'Invalid request';
    exit;
}

$department = htmlspecialchars($_GET['department']);
$subject = htmlspecialchars($_GET['subject']);

require_once 'includes/dbh.inc.php';

$query = 'SELECT * FROM website_info WHERE department = ? AND subject = ?';
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $department, $subject);

$stmt->execute();
$results = $stmt->get_result();

echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Search Results</title>';
echo '<link rel="stylesheet" href="style.css">';
echo '</head>';
echo '<body>';

include 'header.php';

echo '<div class="main-section">';
echo '<div class="container">';
echo '<h2>Search Results</h2>';

if ($results->num_rows > 0) {
    echo '<div class="search-results">';
    while ($row = $results->fetch_assoc()) {
        echo '<div class="resource-item">';
        echo '<p><strong>Description:</strong> ' . htmlspecialchars($row['Description']) . '</p>';
        echo '<p><strong>URL:</strong> <a href="'. htmlspecialchars($row['URL']) . '" target="_blank">' . htmlspecialchars($row['URL']) . '</a></p>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<div class="no-results">No results found for the specified department and subject.</div>';
}

echo '</div>';
echo '</div>';

include 'footer.php';

echo '</body>';
echo '</html>';

$stmt->close();
$conn->close();
?>
