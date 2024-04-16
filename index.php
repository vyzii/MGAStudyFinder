<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <?php
    session_start();
    if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }
    ?>

    <div class="main-section">
        <div class="container">
            <h2>Login</h2>
            <?php
            if (isset($_GET['error'])) {
                echo '<p class="error">' . $_GET['error'] . '</p>';
            }
            ?>
            <form action="includes/login.inc.php" method="post" id="loginForm">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>

        <div class="content-section">
            <p>Welcome to the MGA Study Resources Repository, where students can find and share valuable resources for
                different classes. Explore and enhance your learning experience!</p>

            <div class="macon-pic">
                <img src="images/macon.jpg" alt="Macon Campus">
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
