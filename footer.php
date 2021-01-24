<?php get_template_part('components/footer'); ?>

<script src="<?php bloginfo('template_url')?>/assets/js/build.js"></script>
<?php if(is_singular()): ?>
    <script src="<?php bloginfo('template_url')?>/assets/js/postplayer.js"></script>
<?php endif; ?>
</body>
</html>