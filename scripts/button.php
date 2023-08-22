<?php
    // Include database details
    require("database.php");

    // If the POST variables are not set, then exit the function. 
    if (!isset($_POST['imageUrl']) || !isset($_POST['direction'])) {
        echo "Parameters not provided.\n";
        exit;
    }

    // Set the url and direction, which is based on the parameters of the previous and next button.
    $imageUrl = $_POST['imageUrl'];
    $direction = $_POST['direction'];

    // Run the query depending on which button was clicked.
    if ($direction === 'previous') {
        $query = "SELECT * FROM images WHERE id < (SELECT id FROM images WHERE url = '$imageUrl') ORDER BY id DESC LIMIT 1";
    } elseif ($direction === 'next') {
        $query = "SELECT * FROM images WHERE id > (SELECT id FROM images WHERE url = '$imageUrl') ORDER BY id ASC LIMIT 1";
    } else {
        echo "Invalid direction.\n";
        exit;
    }

    $result = $conn->query($query);

    if ($result === false) {
        echo "Query error: " . $conn->error;
        exit;
    }

    // Return the url
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['url'];
    }
        
        // If the user is already on the first or last row, loop back to the first or last row. 
        else {
            
            // If no rows are returned, loop back to the first or last row
            if ($direction === 'previous') {
                $query = "SELECT * FROM images ORDER BY id DESC LIMIT 1";
            } elseif ($direction === 'next') {
                $query = "SELECT * FROM images ORDER BY id ASC LIMIT 1";
            }

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo $row['url'];
            }
        }
    
    // Close the database connection.
    $conn->close();