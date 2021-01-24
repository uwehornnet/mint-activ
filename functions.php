<?php

add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * Custom helper functions
 */
include 'utils/helpers/index.php';

/**
 * Wordpress basic themes support
 */
include 'utils/theme-support/index.php';

/**
 * API
 */
include 'utils/api/index.php';

