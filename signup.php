<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateEmail() {
            var emailInput = document.getElementById("email");
            var email = emailInput.value.trim();
            if (!email.endsWith("@mga.edu")) {
                alert("Please sign up using an email address ending with @mga.edu.");
                return false;
            }
            return true;
        }

        function registerUser() {
            var usernameInput = document.getElementById("username");
            var emailInput = document.getElementById("email");
            var passwordInput = document.getElementById("password");
            var username = usernameInput.value.trim();
            var email = emailInput.value.trim();
            var password = passwordInput.value.trim();

            fetch('/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    username: username,
                    email: email,
                    password: password
                })
            })
            .then(response => response.text())
            .then(message => alert(message));
        }

        function loginUser() {
            var emailInput = document.getElementById("email_login");
            var passwordInput = document.getElementById("password_login");
            var email = emailInput.value.trim();
            var password = passwordInput.value.trim();

            fetch('/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            })
            .then(response => response.text())
            .then(message => alert(message));
        }
    </script>
</head>

<body>
    <?php include 'header.php'?>

    <div class="main-section">
        <div class="container">
            <h2>Sign Up</h2>
            <?php
            if (isset($_GET['error'])) {
                echo '<p class="error">' . $_GET['error'] . '</p>';
            }
            ?>

            <form action="includes/creation.inc.php" method="post" id="signupForm" onsubmit="return validateEmail()">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
    <?php include 'footer.php'?>
</body>

</html>
