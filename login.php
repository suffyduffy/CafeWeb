<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "inc/head.inc.php";
    ?>
</head>
<body>
    <?php include "inc/nav.inc.php"; ?>

    <main class="container">
        <h1>Member Login</h1>
        <p>
            Existing member log in here. For existing members, please go to 
            <a href="register.php">Member Registration Page</a>.
        </p>
        <form action="process_login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input required type="email" id="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input required type="password" id="password" name="password" class="form-control" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </main>

    <?php include "inc/footer.inc.php"; ?>
</body>
</html>