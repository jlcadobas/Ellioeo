<?php
define('CLOUD_NAME', 'dysyk3hmj');
define('API_KEY', '131454435617232');
define('API_SECRET', 'pNls2heSNaPKDDamLkqowc83pVQ');
define('FOLDER', 'ellioeo');

$apiEndpoint = "https://api.cloudinary.com/v1_1/" . CLOUD_NAME . "/resources/image";
$params = [
    'type' => 'upload',
    'prefix' => FOLDER . '/',
    'max_results' => 500 // Adjust as per your requirement
];
$queryString = http_build_query($params);
$url = "{$apiEndpoint}?{$queryString}";

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Basic ' . base64_encode(API_KEY . ':' . API_SECRET)
    ]
]);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
    curl_close($ch);
    exit;
}

curl_close($ch);
$data = json_decode($response, true);

if (isset($data['resources'])) {
    $imageURLs = array_column($data['resources'], 'secure_url');

    require 'database.php';
    $tableName = 'images';

    foreach ($imageURLs as $imageUrl) {
        $selectStmt = $conn->prepare('SELECT COUNT(*) FROM `' . $tableName . '` WHERE url = ?');
        $selectStmt->bind_param('s', $imageUrl);
        $selectStmt->execute();
        $selectStmt->bind_result($count);
        $selectStmt->fetch();
        $selectStmt->close();

        if ($count > 0) {
            continue; // Skip duplicate URL
        }

        $insertStmt = $conn->prepare('INSERT INTO `' . $tableName . '` (url) VALUES (?)');
        $insertStmt->bind_param('s', $imageUrl);

        if ($insertStmt->execute()) {
            // Image URL stored
        } else {
            // Error storing image URL
        }

        $insertStmt->close();
    }

    $conn->close();
} else {
    echo 'Error: Failed to retrieve images.';
}
