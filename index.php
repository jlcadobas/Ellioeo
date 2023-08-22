<?php
    // Updates the image contents.
    require 'scripts/getImages.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> ellioeo </title>
        <link rel="stylesheet" type="text/css" href="./styles/main.css" />
    </head>

    <body>
        <!-- List all the images inside this div. -->
        <div id="image-track" data-mouse-down-at="0" data-prev-percentage="0">
        <?php
            // Retrieve the image URLs from the database
            require 'scripts/database.php';
            $tableName = 'images';

            $sql = "SELECT url FROM {$tableName}";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output the image HTML markup
                while ($row = $result->fetch_assoc()) {
                    $imageUrl = $row['url'];
                    echo '<img class="image" src="' . $imageUrl . '" draggable="false" loading="eager"/>';
                }
            } else {
                echo 'No images found.';
            }

            $conn->close();
        ?>
        </div>

        <!-- Additional information on the top left part of the screen. -->
        <header>
            <blockquote> Ellioeo </blockquote>
            <div class="socials">
                <a href="https://www.instagram.com/eell63909" target="_blank">
                    <img src="./images/insta.png"/>
                </a>
                <a href="https://www.twitter.com/theeitheror" target="_blank">
                    <img src="./images/twitter.png"/>
                </a>
                <a href="mailto:eell63909@gmail.com">
                    <img src="./images/linked.png" target="_blank"/>
                </a>
            </div>
        </header>
    </body>

    <!-- Add the slider functionality, and go artworks.html page on image click. -->
    <script src="./scripts/slide.js"> </script>
    <script src="./scripts/changePage.js"> </script>
</html>