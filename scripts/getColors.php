<?php  
    // Imagga API endpoint
    $apiEndpoint = "https://api.imagga.com/v2/colors";
    
    // Imagga API key and secret
    $apiKey = "acc_897552c873c693d";
    $apiSecret = "f0adb6c1b9e94a4ab5a12b9635c7e19b";
    
    // Image URL to analyze
    // if (isset($_POST['imageUrl'])) {
    //     $imageUrl = $_POST['imageUrl'];
    // }

    // else {

    //     $imageUrl = $_POST['imageUrl'];
    // }

    $imageUrl = $_POST['imageUrl'];

    echo $imageUrl;
    var_dump($_POST);

    // It only works for now, when the imageURL is hardcoded.
    // Try to send the image src via AJAX and access it using $POST[imageURL];

    // Request parameters
    $requestData = array(
        "image_url" => $imageUrl,
        "extract_overall_colors" => "1",
        "num_colors" => "2"
    );
    
    // Set up cURL for the API request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiEndpoint . '?' . http_build_query($requestData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Basic " . base64_encode("$apiKey:$apiSecret")
    ));

    // Execute cURL request
    $response = curl_exec($ch);

    // Close cURL
    curl_close($ch);

    // Parse the JSON response
    $data = json_decode($response, true);

    if (isset($data['result']['colors']['image_colors']) && count($data['result']['colors']['image_colors']) >= 2) {
        $imageColors = $data['result']['colors']['image_colors'];
    
        // Extract html_code values of the first and second elements
        $primaryImageColor = $imageColors[1]['html_code'];
        $secondaryImageColor = $imageColors[0]['html_code'];
    
        // // Print the extracted colors
        // echo "Primary Image Color: " . $primaryImageColor . "\n";
        // echo "Secondary Image Color: " . $secondaryImageColor . "\n";
    } 
    
        else { 
            
            // echo "Image colors data not found or not enough colors.\n"; 
            $primaryImageColor = "black";
            $secondaryImageColor = "black";
        }
    
        error_reporting(E_ALL);
ini_set('display_errors', 1);

?>