<?php
// server.php
// This script starts the PHP built-in development server for the 'public' directory.

$host = 'localhost';
$port = '8000';
$publicDir = __DIR__ . '/public';

// Check if the script is run from CLI
if (php_sapi_name() === 'cli') {
    echo "Starting PHP development server at http://$host:$port\n";
    echo "Serving directory: $publicDir\n";
    passthru("php -S $host:$port -t $publicDir");
} else {
    echo "This script must be run from the command line.";
}
