<?php
// Script to create all dashboard views
$conn = new mysqli('127.0.0.1', 'rootplt', 'PLT,./7788()__db', 'MYHR');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "=== Creating Dashboard Views ===\n\n";

// Read SQL file
$sql = file_get_contents(__DIR__ . '/db/05_create_dashboard_views.sql');

// Split by CREATE statement
$statements = preg_split('/(?=CREATE OR REPLACE VIEW)/', $sql, -1, PREG_SPLIT_NO_EMPTY);

$success = 0;
$errors = 0;

foreach ($statements as $statement) {
    $statement = trim($statement);
    if (empty($statement) || strpos($statement, '--') === 0) {
        continue;
    }
    
    // Extract view name for display
    if (preg_match('/CREATE OR REPLACE VIEW\s+(\w+)/i', $statement, $matches)) {
        $viewName = $matches[1];
        echo "Creating view: $viewName... ";
        
        if ($conn->query($statement)) {
            echo "✓\n";
            $success++;
        } else {
            echo "✗\n";
            echo "  Error: " . $conn->error . "\n";
            $errors++;
        }
    }
}

echo "\n=============================\n";
echo "✓ Successfully created: $success views\n";
if ($errors > 0) {
    echo "✗ Errors: $errors\n";
}

// List all views
echo "\n=== All Views in Database ===\n";
$result = $conn->query("SHOW FULL TABLES WHERE Table_type = 'VIEW'");
while ($row = $result->fetch_array()) {
    echo "  - {$row[0]}\n";
}

$conn->close();
echo "\nDone!\n";
