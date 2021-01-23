<?php

add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * Custom helper functions
 */
include 'utils/functions/helpers/index.php';

/**
 * Wordpress basic themes support
 */
include 'vendor/functions/theme-support/index.php';

