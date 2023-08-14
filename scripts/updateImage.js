
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