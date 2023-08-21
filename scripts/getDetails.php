<?php

    require("database.php");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve rows from the 'users' table
    $sql = "SELECT title, date, details FROM images";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "Title: " . $row["title"] . " - Date: " . $row["date"] . " - Details: " . $row["details"] . "<br>";
        }
    } else {
        echo "No results found";
    }

    // Close the connection
    $conn->close();
