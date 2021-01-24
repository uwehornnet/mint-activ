<?php
global  $post;

$downloads = get_field('downloads', $post->ID) ? array_map(function($post) {
    return [
        'title' => $post['download']->post_title,
        'link' => $post['download']->post_excerpt
    ];
}, get_field('downloads', $post->ID)) : null;

get_header(); ?>

<div class="post">
    <div class="post__header">
        <div class="post__header--container">
            <h1><?php the_title(); ?></h1>
            <p><?php the_excerpt(); ?></p>

            <div id="post-player" data-post="<?= $post->ID ?>"></div>
        </div>
    </div>
    <div class="post__container">
        <div class="post__body">
            <div class="post__seperator">
                <h3>Inhalt</h3>
            </div>
            <?php the_content(); ?>
        </div>
        <div class="post__sidebar">
            <?php if($downloads): ?>
                <div class="post__seperator">
                    <h3>Downloads</h3>
                </div>
                <ul>
                    <?php foreach($downloads as $download): ?>
                        <li>
                            <a href="<?= $download['link'] ?>">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m21.25 24h-18.5c-1.517 0-2.75-1.233-2.75-2.75v-5.5c0-.965.785-1.75 1.75-1.75h2.756c.779 0 1.452.501 1.676 1.248l1.073 3.574c.032.106.128.178.239.178h9.012c.111 0 .207-.072.239-.178l1.073-3.575c.224-.746.897-1.247 1.676-1.247h2.756c.965 0 1.75.785 1.75 1.75v5.5c0 1.517-1.233 2.75-2.75 2.75zm-19.5-8.5c-.138 0-.25.112-.25.25v5.5c0 .689.561 1.25 1.25 1.25h18.5c.689 0 1.25-.561 1.25-1.25v-5.5c0-.138-.112-.25-.25-.25h-2.756c-.111 0-.207.072-.239.178l-1.073 3.575c-.224.746-.897 1.247-1.676 1.247h-9.012c-.779 0-1.452-.501-1.676-1.248l-1.073-3.574c-.032-.106-.128-.178-.239-.178z"/><path d="m3.75 12.5c-.414 0-.75-.336-.75-.75v-9c0-1.517 1.233-2.75 2.75-2.75h12.5c1.517 0 2.75 1.233 2.75 2.75v9c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-9c0-.689-.561-1.25-1.25-1.25h-12.5c-.689 0-1.25.561-1.25 1.25v9c0 .414-.336.75-.75.75z"/></svg>
                                <p><?= $download['title'] ?></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php get_template_part('components/profile') ?>
        </div>
    </div>
    
</div>


<?php get_footer(); ?>