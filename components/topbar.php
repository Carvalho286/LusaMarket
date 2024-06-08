<div class="topbar">
    <div class="logo">
        <a href="<?php echo PAGES_URL; ?>landingPage.php" class="logo-link">
            <div class="logo">
                <img src="<?php echo ASSETS_URL; ?>logo.jpg" alt="Logo">
                <h1>LusaMarket</h1>
            </div>
        </a>
    </div>
    <div class="nav-buttons">
        <?php if (basename($_SERVER['PHP_SELF']) != 'loginPage.php') : ?>
            <a href="<?php echo PAGES_URL; ?>authentication/loginPage.php">Iniciar Sessão</a>
        <?php endif; ?>
        <?php if (basename($_SERVER['PHP_SELF']) != 'registerPage.php') : ?>
            <a href="<?php echo PAGES_URL; ?>authentication/registerPage.php">Registo</a>
        <?php endif; ?>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo STYLES_URL; ?>topbar.css">
