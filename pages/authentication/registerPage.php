<?php include '../../config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LusoMarket - Registo</title>
    <link rel="stylesheet" type="text/css" href="<?php echo STYLES_URL; ?>register.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . COMPONENTS_URL . 'topbar.php'; ?>
    <div class="register-container">
        <h2>Registo</h2>
        <form action="<?php echo FUNCTIONS_URL; ?>registerUser.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
                <p style="color: red">
                    <?php echo $_GET['error']; ?>
                </p>
            <?php } ?>
            
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Palavra-passe:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="address-container">
                <div class="form-group">
                    <label for="address">Morada:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="postal_code">Código Postal:</label>
                    <input type="text" id="postal_code" name="postal_code" required>
                </div>
            </div>

            <div class="city-country-container">
                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="country">País:</label>
                    <input type="text" id="country" name="country" required>
                </div>
            </div>

            <div class="form-group">
                <label for="phone_number">Número de Telemóvel:</label>
                <div class="phone-container">
                    <div class="form-group">
                        <input type="text" id="phone_code" name="phone_code" placeholder="+1" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone_number" name="phone_number" placeholder="1234567890" required>
                    </div>
                </div>
            </div>

            <button type="submit">Registar</button>
        </form>
    </div>
</body>
</html>
