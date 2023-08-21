    // Get src of clicked image, and reference to the div where you'll insert the new image
    var imagePath = localStorage.getItem("imageSrc");
    var divReference = document.getElementById("active-image");
    
    var binderElement = document.getElementById("binder");
    var infoElement = document.getElementById("info");
    var artworkNameElement = document.getElementById("artwork-name");
    var artworkDateElement = document.getElementById("date");
    var detailsElement = document.getElementById("details");

    // Create an AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../scripts/getColors.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Define the data to send
    var data = "imageUrl=" + encodeURIComponent(imagePath);

    // Define a callback function to handle the response
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Parse the JSON response
                var colorData = JSON.parse(xhr.responseText);

                // Apply the extracted colors as background styles
                var primaryColor = colorData.combinedData.colorData.primaryColor;
                var secondaryColor = colorData.combinedData.colorData.secondaryColor;
                var fontColor = colorData.combinedData.colorData.luminance > 0.5 ? "black" : "white";

                artworkNameElement.textContent = colorData.combinedData.imageDetails.title;
                artworkDateElement.textContent = colorData.combinedData.imageDetails.date;
                detailsElement.textContent = colorData.combinedData.imageDetails.details;

                binderElement.style.backgroundColor = primaryColor;
                infoElement.style.backgroundColor = secondaryColor;
                infoElement.style.color = fontColor;

                // Now that the colors are set, create the image element
                var image = document.createElement("img");

                // Set src and id for the new image
                image.src = imagePath;
                image.id = "clickedImage";
                image.loading = "eager";

                divReference.appendChild(image);
            } else {
                alert('AJAX request failed.');
            }
        }
    };

    // Send the request
    xhr.send(data);