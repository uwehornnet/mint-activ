<header class="header">
    <div class="header__topbar">
        <div class="header__container">
            <p>Präsentation MINT-AKTIV Homepage</p>
            <p>
                <span style="background-image: url(<?php bloginfo('template_url') ?>/assets/img/avatar.png)"></span>
                <a href="mailto:mail@uwe-horn.net">mail@uwe-horn.net</a>
            </p>
        </div> 
    </div>
    <div class="header__bar">
        <div class="logo">
            <a href="/">
                <img src="<?php bloginfo('template_url') ?>/assets/img/logo.jpg" alt="MINT-AKTIV">
            </a>
        </div>
        <div class="header__navigation">
            <div class="header__navigation--trigger"><span></span></div>
            <?php wp_nav_menu(array('container' => 'ul', 'theme_location' => 'hauptmenu', 'menu_class' => 'header__navigation--list')) ?>
        </div>
    </div>
</header>