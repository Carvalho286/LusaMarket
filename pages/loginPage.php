<?php include '../config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LusoMarket - Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo STYLES_URL; ?>login.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . COMPONENTS_URL . 'topbar.php'; ?>
    <div class="login-container">
        <h2>Início de Sessão</h2>
        <form action="<?php echo FUNCTIONS_URL; ?>authenticateUser.php" method="POST">
            <?php if (isset($_GET['success'])) { ?>
                <p style="color: lawngreen">
                    <?php echo $_GET['success']; ?>
                </p>
            <?php } ?>
            <?php if (isset($_GET['error'])) { ?>
                <p style="color: red">
                    <?php echo $_GET['error']; ?>
                </p>
            <?php } ?>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Palavra-passe:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
