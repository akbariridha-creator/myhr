<?php
// Script to insert sample menu data
$conn = new mysqli('127.0.0.1', 'rootplt', 'PLT,./7788()__db', 'MYHR');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "=== Inserting sample menu data ===\n\n";

// Truncate existing data
echo "Clearing existing menu data...\n";
$conn->query("TRUNCATE TABLE menu");

// Insert parent menus
echo "Inserting parent menus...\n";
$parentMenus = [
    [1, 'mdi mdi-view-dashboard', 'Dashboard', 'dashboard', 'parent', 'user', NULL, 1],
    [2, 'mdi mdi-account-multiple', 'Data Karyawan', '#', 'parent', 'user', NULL, 2],
    [3, 'mdi mdi-chart-line', 'Laporan', '#', 'parent', 'user', NULL, 3],
    [4, 'mdi mdi-cog', 'Pengaturan', '#', 'parent', 'admin', NULL, 4],
];

foreach ($parentMenus as $menu) {
    $sql = "INSERT INTO menu (id, created_at, updated_at, deleted_at, icon, title, url, type, role, ref_id, `order`) 
            VALUES (?, NOW(), NOW(), NULL, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssii", $menu[0], $menu[1], $menu[2], $menu[3], $menu[4], $menu[5], $menu[6], $menu[7]);
    if ($stmt->execute()) {
        echo "  ✓ {$menu[2]}\n";
    } else {
        echo "  ✗ Error: " . $stmt->error . "\n";
    }
}

// Insert children menus
echo "\nInserting children menus...\n";
$childrenMenus = [
    // Data Karyawan children
    [10, 'mdi mdi-account-circle', 'Daftar Karyawan', 'workers', 'children', 'user', 2, 1],
    [11, 'mdi mdi-account-plus', 'Tambah Karyawan', 'workers/create', 'children', 'admin', 2, 2],
    [12, 'mdi mdi-account-group', 'Keluarga', 'workers/family', 'children', 'user', 2, 3],
    // Laporan children
    [20, 'mdi mdi-file-chart', 'Laporan Karyawan', 'reports/workers', 'children', 'user', 3, 1],
    [21, 'mdi mdi-file-excel', 'Export Data', 'exports', 'children', 'user', 3, 2],
    // Pengaturan children
    [30, 'mdi mdi-account-key', 'Manajemen User', 'user', 'children', 'admin', 4, 1],
    [31, 'mdi mdi-shield-account', 'Hak Akses', 'privilege', 'children', 'admin', 4, 2],
    [32, 'mdi mdi-menu', 'Menu', 'management/menu', 'children', 'admin', 4, 3],
];

foreach ($childrenMenus as $menu) {
    $sql = "INSERT INTO menu (id, created_at, updated_at, deleted_at, icon, title, url, type, role, ref_id, `order`) 
            VALUES (?, NOW(), NOW(), NULL, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssii", $menu[0], $menu[1], $menu[2], $menu[3], $menu[4], $menu[5], $menu[6], $menu[7]);
    if ($stmt->execute()) {
        echo "  ✓ {$menu[2]}\n";
    } else {
        echo "  ✗ Error: " . $stmt->error . "\n";
    }
}

// Check result
echo "\n=== Checking menu data ===\n";
$result = $conn->query("SELECT COUNT(*) as total FROM menu");
$row = $result->fetch_assoc();
echo "Total menu items: " . $row['total'] . "\n\n";

$result = $conn->query("SELECT * FROM v_menu_primary ORDER BY `order` ASC");
echo "Parent menus (v_menu_primary):\n";
while ($row = $result->fetch_assoc()) {
    echo "  - ID: {$row['id']}, Title: {$row['title']}, Order: {$row['order']}\n";
}

$conn->close();
echo "\n\nDone! You can now refresh the dashboard.\n";
