<?php
// run_sql_script.php
// Usage: php run_sql_script.php <script_name>

if (php_sapi_name() !== 'cli') {
    exit("This script must be run from the command line.\n");
}

if ($argc < 2) {
    exit("Usage: php run_sql_script.php <script_name>\n");
}

$scriptName = $argv[1];
$scriptFile = __DIR__ . '/database/' . $scriptName . '.sql';
if (!file_exists($scriptFile)) {
    exit("SQL script file not found: $scriptFile\n");
}

require __DIR__ . '/public/php/db.php'; // Uses $conn (PDO)

try {
    $sql = file_get_contents($scriptFile);
    $conn->exec($sql);
    echo "SQL script executed successfully.\n";
} catch (PDOException $e) {
    echo "Error executing SQL script: " . $e->getMessage() . "\n";
}
