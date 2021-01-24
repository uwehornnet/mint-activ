<?php

/**
 * Template Name: Kontakseite
 */

get_header(); ?>

<div class="contact">
    <div class="contact__container">
        <?php the_content(); ?>
        <div class="contact__columns">
            <div class="contact__column">
                <div class="contact__column--header">
                    <strong>Datum & Uhrzeit</strong>
                </div>
                <div class="datepicker"></div>
            </div>
            <div class="contact__column">
                <div class="contact__column--header">
                    <strong>Persönliche Daten</strong>
                </div>
                <?= do_shortcode('[contact-form-7 id="70" title="Kontaktformular"]'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>