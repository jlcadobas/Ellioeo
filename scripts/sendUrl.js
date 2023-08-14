
    function sendAJAXRequest() {

        var imagePath = localStorage.getItem("imageSrc");
     
        // Create an AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../scripts/getColors.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        // Define the data to send
        var data = "imageUrl=" + encodeURIComponent(imagePath);
    
        console.log("Image Path:", imagePath);
        console.log("Data:", data);

        // Send the request
        xhr.send(data);

        console.log("After");

        console.log("Image Path:", imagePath);
        console.log("Data:", data);
    }

    document.addEventListener("DOMContentLoaded", function() {
        sendAJAXRequest();
    });