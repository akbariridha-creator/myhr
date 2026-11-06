<?php
// Update menu_privilege to include all menu IDs
$conn = new mysqli('127.0.0.1', 'rootplt', 'PLT,./7788()__db', 'MYHR');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "=== Updating menu_privilege ===\n\n";

// Get all menu IDs
$result = $conn->query("SELECT GROUP_CONCAT(id ORDER BY id) as all_ids FROM menu");
$row = $result->fetch_assoc();
$allMenuIds = $row['all_ids'];

echo "All menu IDs: $allMenuIds\n\n";

// Update menu_privilege for admin (id=1)
$sql = "UPDATE menu_privilege SET menu = ? WHERE id = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $allMenuIds);

if ($stmt->execute()) {
    echo "✓ Updated admin menu_privilege (id=1)\n";
} else {
    echo "✗ Error: " . $stmt->error . "\n";
}

// Check result
echo "\n=== Current menu_privilege data ===\n";
$result = $conn->query("SELECT id, name, menu FROM menu_privilege ORDER BY id");
while ($row = $result->fetch_assoc()) {
    echo "ID: {$row['id']}, Name: {$row['name']}\n";
    echo "  Menu: {$row['menu']}\n\n";
}

$conn->close();
echo "Done! Please logout and login again to refresh session.\n";
