<header id="menu">
    <div class="header-container">
        <div id="logo">
            <a href="/"><img src="images/logo.svg" alt="Logo Portfolio Liza"></a>
        </div>

        <nav class="main-menu oswald ft-medium">
            <?php include("partials/menu.php"); ?>
        </nav>

        <div class="header-spacer"></div>

        <div id="burger" class="burger">
            <span>&nbsp;</span>
            <span>&nbsp;</span>
            <span>&nbsp;</span>
        </div>

        <div id="menu-mobile" class="menu-mobile">
            <button class="close-menu" aria-label="Fermer le menu">
                <span>&times;</span>
            </button>

            <nav class="oswald ft-medium">
                <?php include("partials/menu.php"); ?>
            </nav>
        </div>
    </div>
</header>   