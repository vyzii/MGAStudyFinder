<footer class="footer">
    <h3>&copy; 2024 MGA Study Resources Repository</h3>
    <?php

    $pagesWithoutLogoutButton = ['signup.php', 'index.php'];

    $currentPage = basename($_SERVER['PHP_SELF']);

    if (!in_array($currentPage, $pagesWithoutLogoutButton)) {
        echo '<a href="index.php?logout=true">Logout</a>';
    }
    ?>
</footer>
