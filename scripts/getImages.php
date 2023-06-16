<?php
    // Set your Cloudinary credentials and folder name

    $cloudName = 'dysyk3hmj';
    $apiKey = '131454435617232';
    $apiSecret = 'pNls2heSNaPKDDamLkqowc83pVQ';
    $folder = 'ellioeo';

    // Set the API endpoint and parameters

    $apiEndpoint = "https://api.cloudinary.com/v1_1/{$cloudName}/resources/image";
    $params = [
        'type' => 'upload',
        'prefix' => $folder . '/',
        'max_results' => 500 // Adjust as per your requirement
    ];
    $queryString = http_build_query($params);
    $url = "{$apiEndpoint}?{$queryString}";

    // Set the cURL options

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Basic ' . base64_encode("{$apiKey}:{$apiSecret}")
    ]);

    // Execute the cURL request

    $response = curl_exec($ch);

    // Check for errors

    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
        curl_close($ch);
        exit;
    }

    // Close cURL and decode the response

    curl_close($ch);
    $data = json_decode($response, true);

    // Process the response and store image URLs in the database

    if (isset($data['resources'])) {

        $imageURLs = [];
        foreach ($data['resources'] as $resource) {
            $imageURLs[] = $resource['secure_url'];
        }

        // Store the image URLs in the database

        require 'database.php';

        $tableName = 'images';
        foreach ($imageURLs as $imageUrl) {
            
            // Check if the URL already exists in the database

            $selectStmt = $conn->prepare('SELECT COUNT(*) FROM `' . $tableName . '` WHERE url = ?');
            $selectStmt->bind_param('s', $imageUrl);
            $selectStmt->execute();
            $selectStmt->bind_result($count);
            $selectStmt->fetch();
            $selectStmt->close();

            // Debug: Display the duplicate URLs

            if ($count > 0) {
                // echo 'Skipping duplicate image URL: ' . $imageUrl . '<br>';
                continue;
            }

            // Insert the URL into the database

            $insertStmt = $conn->prepare('INSERT INTO `' . $tableName . '` (url) VALUES (?)');
            $insertStmt->bind_param('s', $imageUrl);

            // Debug: Display which URLs are new
            if ($insertStmt->execute()) {

                //echo 'Image URL stored: ' . $imageUrl . '<br>';
            }
            
                else {

                    // echo 'Error storing image URL: ' . $insertStmt->error . '<br>';
                }

            $insertStmt->close();
        }

        $conn->close();
    } 
    
        else {
            echo 'Error: Failed to retrieve images.';
        }
?>
