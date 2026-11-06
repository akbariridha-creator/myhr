<?php
// Quick script to check menu table and create view
$conn = new mysqli('127.0.0.1', 'rootplt', 'PLT,./7788()__db', 'MYHR');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "=== Checking menu table ===\n\n";

// Check if table exists
$result = $conn->query("SHOW TABLES LIKE 'menu'");
if ($result->num_rows > 0) {
    echo "✓ Table 'menu' exists\n\n";
    
    // Check data
    echo "=== Sample menu data ===\n";
    $result = $conn->query("SELECT * FROM menu LIMIT 5");
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            print_r($row);
        }
    } else {
        echo "No data found in menu table\n";
    }
} else {
    echo "✗ Table 'menu' does NOT exist\n";
}

echo "\n=== Checking v_menu_primary view ===\n";
$result = $conn->query("SHOW TABLES LIKE 'v_menu_primary'");
if ($result->num_rows > 0) {
    echo "✓ View 'v_menu_primary' exists\n";
} else {
    echo "✗ View 'v_menu_primary' does NOT exist\n";
    
    echo "\n=== Creating v_menu_primary view ===\n";
    $sql = "CREATE OR REPLACE VIEW v_menu_primary AS 
            SELECT * FROM menu 
            WHERE deleted_at IS NULL 
            AND type = 'parent' 
            ORDER BY `order` ASC";
    
    if ($conn->query($sql)) {
        echo "✓ View created successfully!\n";
    } else {
        echo "✗ Error creating view: " . $conn->error . "\n";
    }
}

$conn->close();
echo "\nDone!\n";
