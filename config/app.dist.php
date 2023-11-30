<?php

/**
 * Application configuration
 */

return [
    'log_dir' => __DIR__ . '/../var/',
    'log_file' => 'log.txt',
    'upload_dir' => __DIR__ . '/../var/files/',
    'url' => 'https://example.com/',
    'max_file_size' => 10 * 1024 * 1024,
    'max_total_size' => 100 * 1024 * 1024,
];