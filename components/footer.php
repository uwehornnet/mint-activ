<footer class="footer">
    <div class="footer__container">
        <div class="footer__column">
            <p>
                Haben Sie weitere Fragen oder Anmerkungen? Schreiben Sie mir gerne eine email an <a href="mailto:mail@uwe-horn.net">mail@uwe-horn.net</a> oder wir vereinbaren einen Termin zum Video-Call
            </p>
            <?php if(!is_page_template('page-templates/contact.php')): ?>
                <a href="/" class="button">Termin vereinbaren</a>
            <?php endif; ?>
        </div>
        <div class="footer__column">
            <?php wp_nav_menu(array('container' => 'ul', 'theme_location' => 'servicemenu', 'menu_class' => 'footer__navigation')) ?>
        </div>
        <div class="footer__column">
            <?php wp_nav_menu(array('container' => 'ul', 'theme_location' => 'footermenu', 'menu_class' => 'footer__navigation')) ?>
        </div>
    </div>
</footer>