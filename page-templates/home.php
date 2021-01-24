<?php

/**
 * Template Name: Startseite
 */

$featured = get_posts([
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => -1,
    'category_name' => 'featured'
]);

get_header(); ?>

<main class="home">
    <?php if($featured): ?>
        <section class="hero">
            <div class="hero__slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach($featured as $post): ?>
                            <div class="swiper-slide hero__slider--slide" style="background-image: url(<?= get_the_post_thumbnail_url($post->ID) ?>)">
                                <div class="hero__container">
                                    <div class="hero__slider--content">
                                        <h2><?= $post->post_title ?></h2>
                                        <p><?= $post->post_excerpt ?></p>
                                        <a href="<?= get_permalink($post->ID) ?>">
                                            <?= $post->post_title ?> ansehen
                                            <svg viewBox="0 0 15 12" xmlns="http://www.w3.org/2000/svg"><path d="m14.7602 5.43957-5.41699-5.209252c-.15463-.1486981-.36072-.230318-.58048-.230318-.22 0-.42597.0817371-.5806.230318l-.49183.473067c-.15451.148464-.23963.346765-.23963.558205 0 .21132.08512.41631.23963.56477l3.1602 3.04562h-10.040141c-.452679 0-.810359.34079-.810359.77621v.66879c0 .43542.35768.81057.810359.81057h10.076041l-3.19598 3.06265c-.15451.1487-.23963.3416-.23963.553 0 .2112.08512.4069.23963.5555l.49183.4716c.15463.1487.36061.2297.5806.2297.21976 0 .42585-.0821.58049-.2308l5.41706-5.20912c.155-.14917.2402-.34829.2396-.55996.0005-.21238-.0846-.41162-.2398-.56055z"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <div class="home__container">
        <section class="grid">
            <div class="grid__column">
                <div class="grid__box">
                    <div class="grid__box--header">
                        <h3>Über mich</h3>
                        <a href="/ueber-mich">
                            zur Präsentation
                            <svg viewBox="0 0 15 12" xmlns="http://www.w3.org/2000/svg"><path d="m14.7602 5.43957-5.41699-5.209252c-.15463-.1486981-.36072-.230318-.58048-.230318-.22 0-.42597.0817371-.5806.230318l-.49183.473067c-.15451.148464-.23963.346765-.23963.558205 0 .21132.08512.41631.23963.56477l3.1602 3.04562h-10.040141c-.452679 0-.810359.34079-.810359.77621v.66879c0 .43542.35768.81057.810359.81057h10.076041l-3.19598 3.06265c-.15451.1487-.23963.3416-.23963.553 0 .2112.08512.4069.23963.5555l.49183.4716c.15463.1487.36061.2297.5806.2297.21976 0 .42585-.0821.58049-.2308l5.41706-5.20912c.155-.14917.2402-.34829.2396-.55996.0005-.21238-.0846-.41162-.2398-.56055z"/></svg>
                        </a>
                    </div>
                    <div class="grid__box--body flex">
                        <img src="<?php bloginfo('template_url') ?>/assets/img/avatar.png">
                        <p>Hallo, mein Name ist Uwe Horn. Ich erstelle Webseiten, optimiere Onlineshops und Landingpages und entwickle Apps für Android und iOS. Anders ausgedrückt, ich erstelle, ramponiere und repariere Dinge, ringe mit Code und entwerfe Sachen. </p>
                    </div>
                </div>
                <div class="grid__box">
                    <div class="grid__box--header">
                        <h3>Kontakt</h3>
                    </div>
                    <div class="grid__box--body">
                        <div class="address">
                            <p>Wasserwerk Försterei 7a<br/>18586 Ostseebad Göhren</p>
                            <p>0163 - 4707134</p>
                            <p>mail@uwe-horn.net</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid__column">
                <div class="grid__box">
                    <div class="grid__box--header">
                        <h3>Referenzen</h3>
                        <a href="/referenzen">
                            zur Präsentation
                            <svg viewBox="0 0 15 12" xmlns="http://www.w3.org/2000/svg"><path d="m14.7602 5.43957-5.41699-5.209252c-.15463-.1486981-.36072-.230318-.58048-.230318-.22 0-.42597.0817371-.5806.230318l-.49183.473067c-.15451.148464-.23963.346765-.23963.558205 0 .21132.08512.41631.23963.56477l3.1602 3.04562h-10.040141c-.452679 0-.810359.34079-.810359.77621v.66879c0 .43542.35768.81057.810359.81057h10.076041l-3.19598 3.06265c-.15451.1487-.23963.3416-.23963.553 0 .2112.08512.4069.23963.5555l.49183.4716c.15463.1487.36061.2297.5806.2297.21976 0 .42585-.0821.58049-.2308l5.41706-5.20912c.155-.14917.2402-.34829.2396-.55996.0005-.21238-.0846-.41162-.2398-.56055z"/></svg>
                        </a>
                    </div>
                    <div class="grid__box--body">
                        <?php foreach(get_posts(['post_type' => 'references', 'post_status' => 'publish']) as $post): ?>
                            <div class="reference">
                                <div class="reference__thumbnail" style="background-image: url(<?= get_the_post_thumbnail_url($post->ID) ?>)"></div>
                                <div class="reference__body">
                                    <strong><?= $post->post_title ?></strong>
                                    <p><?= $post->post_excerpt ?></p>
                                    <a href="/">
                                        zur Referenz
                                        <svg viewBox="0 0 15 12" xmlns="http://www.w3.org/2000/svg"><path d="m14.7602 5.43957-5.41699-5.209252c-.15463-.1486981-.36072-.230318-.58048-.230318-.22 0-.42597.0817371-.5806.230318l-.49183.473067c-.15451.148464-.23963.346765-.23963.558205 0 .21132.08512.41631.23963.56477l3.1602 3.04562h-10.040141c-.452679 0-.810359.34079-.810359.77621v.66879c0 .43542.35768.81057.810359.81057h10.076041l-3.19598 3.06265c-.15451.1487-.23963.3416-.23963.553 0 .2112.08512.4069.23963.5555l.49183.4716c.15463.1487.36061.2297.5806.2297.21976 0 .42585-.0821.58049-.2308l5.41706-5.20912c.155-.14917.2402-.34829.2396-.55996.0005-.21238-.0846-.41162-.2398-.56055z"/></svg>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="home__container">
        <div class="downloads">
            <div class="downloads__header">
                <h3>Downloads</h3>
            </div>
            <?php foreach(get_posts(['post_type' => 'downloads', 'post_status' => 'publish']) as $download): ?>
                <div class="downloads__item">
                    <div class="downloads__item--inner">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m21.25 24h-18.5c-1.517 0-2.75-1.233-2.75-2.75v-5.5c0-.965.785-1.75 1.75-1.75h2.756c.779 0 1.452.501 1.676 1.248l1.073 3.574c.032.106.128.178.239.178h9.012c.111 0 .207-.072.239-.178l1.073-3.575c.224-.746.897-1.247 1.676-1.247h2.756c.965 0 1.75.785 1.75 1.75v5.5c0 1.517-1.233 2.75-2.75 2.75zm-19.5-8.5c-.138 0-.25.112-.25.25v5.5c0 .689.561 1.25 1.25 1.25h18.5c.689 0 1.25-.561 1.25-1.25v-5.5c0-.138-.112-.25-.25-.25h-2.756c-.111 0-.207.072-.239.178l-1.073 3.575c-.224.746-.897 1.247-1.676 1.247h-9.012c-.779 0-1.452-.501-1.676-1.248l-1.073-3.574c-.032-.106-.128-.178-.239-.178z"/><path d="m3.75 12.5c-.414 0-.75-.336-.75-.75v-9c0-1.517 1.233-2.75 2.75-2.75h12.5c1.517 0 2.75 1.233 2.75 2.75v9c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-9c0-.689-.561-1.25-1.25-1.25h-12.5c-.689 0-1.25.561-1.25 1.25v9c0 .414-.336.75-.75.75z"/></svg>
                        <p>
                            <a href="/">
                                <?= $download->post_title ?>
                            </a>
                        </p>
                    </div>
                    <a href="/">download</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>