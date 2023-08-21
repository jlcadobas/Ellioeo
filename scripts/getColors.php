<?php

define('API_KEY', 'acc_897552c873c693d');
define('API_SECRET', 'f0adb6c1b9e94a4ab5a12b9635c7e19b');

$apiEndpoint = "https://api.imagga.com/v2/colors";

if (!isset($_POST['imageUrl'])) {
    echo "Image URL not provided.\n";
    exit;
}

$imageUrl = $_POST['imageUrl'];

$requestData = array(
    "image_url" => $imageUrl,
    "extract_overall_colors" => "1",
    "num_colors" => "2"
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiEndpoint . '?' . http_build_query($requestData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Basic " . base64_encode(API_KEY . ':' . API_SECRET)
));

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

if (!isset($data['result']['colors']['image_colors']) || count($data['result']['colors']['image_colors']) < 2) {
    echo "Image colors data not found or not enough colors.\n";
    exit;
}

$imageColors = $data['result']['colors']['image_colors'];
$primaryImageColor = $imageColors[0]['html_code'];
$secondaryImageColor = $imageColors[1]['html_code'];
$luminance = calculateLuminance($primaryImageColor);

$colorData = array(
    "primaryColor" => $primaryImageColor,
    "secondaryColor" => $secondaryImageColor,
    "luminance" => $luminance
);

// New code to retrieve and display rows from the 'images' table
require("database.php");

$sql = "SELECT title, date, details FROM images WHERE url = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $imageUrl);
$stmt->execute();
$result = $stmt->get_result();

$response = array();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['title'] = $row["title"];
    $response['date'] = $row["date"];
    $response['details'] = $row["details"];
} else {
    $response['title'] = "Title not found";
    $response['date'] = "Date not found";
    $response['details'] = "Details not found";
}

$stmt->close();

// Combine color data and image details into a single response
// Combine color data and image details into a single response
$response['combinedData'] = array(
    "colorData" => $colorData,
    "imageDetails" => array(
        "title" => $response['title'],
        "date" => $response['date'],
        "details" => $response['details']
    )
);

header('Content-Type: application/json');
echo json_encode($response);

function calculateLuminance($color)
{
    list($r, $g, $b) = array_map('hexdec', str_split(substr($color, 1), 2));
    return 0.2126 * ($r / 255) + 0.7152 * ($g / 255) + 0.0722 * ($b / 255);
}
