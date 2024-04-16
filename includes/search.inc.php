<?php

require_once 'dbh.inc.php'; 

$department = isset($_GET['department']) ? $_GET['department'] : '';
$subject = isset($_GET['subject']) ? $_GET['subject'] : '';

if (empty($department) || empty($subject)) {
    echo 'Please provide both department and subject to search.';
    exit;
}

$query = 'SELECT * FROM website_info WHERE department = ? AND subject = ?';
$stmt = $conn->prepare($query);

$stmt->bind_param('ss', $department, $subject);

$stmt->execute();

$results = $stmt->get_result();

echo '<h2>Search Results</h2>';

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        echo '<div class="resource">';
        echo '<p>' . htmlspecialchars($row['Description']) . '</p>';
        echo '<a href="' . htmlspecialchars($row['URL']) . '" target="_blank">View Website</a>';
        echo '</div>';
    }
} else {
    echo 'No results found for the specified department and subject.';
}

$stmt->close();

$conn->close();

?>

<?php include '../footer.php'; ?>
