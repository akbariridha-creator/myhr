<?php
/**
 * Front Controller
 * 
 * This file redirects all requests to public/index.php
 */

// Change working directory to public folder
chdir(__DIR__ . '/public');

// Require the main index file in public folder
require __DIR__ . '/public/index.php';
