
    // Get src of clicked image, and reference to the div where you'll insert the new image
    var imagePath = localStorage.getItem("imageSrc");
    var divReference = document.getElementById("active-image");

    // Create a new image element
    var image = document.createElement("img");

    // Set src and id for the new image
    image.src = imagePath;
    image.id = "clickedImage";
    image.loading = "eager";

    divReference.appendChild(image);

    // Create an AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "getColors.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Define the data to send
    var data = "imageUrl=" + encodeURIComponent(imagePath);

    // Define a callback function to handle the response
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Display the response from the server
                alert(xhr.responseText);
            } else {
                alert('AJAX request failed.');
            }
        }
    };

    // Send the request
    xhr.send(data);