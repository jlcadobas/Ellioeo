    var imagePath = localStorage.getItem("imageSrc");
    var loadingOverlay = document.getElementById("loading-overlay");

    // Attach an event listener to both buttons, run the function when it is clicked.
    document.getElementById("previous").addEventListener("click", function() {
        loadingOverlay.style.display = "flex";
        runQuery('previous', imagePath);
    });

    document.getElementById("next").addEventListener("click", function() {
        loadingOverlay.style.display = "flex";
        runQuery('next', imagePath);
    });

    // Pass a parameter to the functions, indication whether to run previous or next button.
    // Also add the imagePath as a parameter
    function runQuery(direction, imagePath) {

        // Make an AJAX Request
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../scripts/button.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Send data with the imageUrl and the direction
        var data = "imageUrl=" + encodeURIComponent(imagePath) + "&direction=" + direction;
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {

                // Update the imageUrl based on the echoed previous or next row from button.php
                // Reload the page with the new imageUrl.
                localStorage.setItem("imageSrc", xhr.responseText);
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }
        };
        
        xhr.send(data);
    }