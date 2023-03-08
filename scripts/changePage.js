    
    // Attach events to each image elements, then run the jumpToArtworkPage function.

    var numImage = document.getElementsByClassName("image");

    for (let i = 0; i < numImage.length; i++) {

        // Gets the image path from the clicked image, and use local storage for the variable to be accessed from other page.
        numImage[i].addEventListener("click", function() {

            var image = this.getAttribute("src");

            localStorage.setItem("imageSrc", image);

            // Go to artworks.html
            location.href = "http://127.0.0.1:5500/artworks.html";
        });
    }